<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Invoice;
use App\Http\Controllers\Controller;

class CallbackController extends Controller
{
    // Isi dengan private key anda
    protected $privateKey = 'private_key_anda';

    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid callback event, no action was taken',
            ]);
        }

        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }

        $uniqueRef = $data->merchant_ref;
        $status = strtoupper((string) $data->status);

        /*
        |--------------------------------------------------------------------------
        | Proses callback untuk closed payment
        |--------------------------------------------------------------------------
        */

        if (1 === (int) $data->is_closed_payment) {
            $invoice = Invoice::where('unique_ref', $uniqueRef)
                ->where('status', '!=', 'PAID')
                ->first();

            if (! $invoice) {
                return Response::json([
                    'success' => false,
                    'message' => 'No invoice found or already paid: ' . $uniqueRef,
                ]);
            }

            $invoice->update(['status' => $status]);
            return Response::json(['success' => true]);
        }


        /*
        |--------------------------------------------------------------------------
        | Proses callback untuk open payment
        |--------------------------------------------------------------------------
        */

        $invoice = Invoice::where('unique_ref', $uniqueRef)
            ->where('status', 'UNPAID')
            ->first();

        if (! $invoice) {
            return Response::json([
                'success' => false,
                'message' => 'Invoice not found or current status is not UNPAID',
            ]);
        }

        if ((int) $data->total_amount !== (int) $invoice->total_amount) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid amount. Expected: ' . $invoice->total_amount . ' - Got: ' . $data->total_amount,
            ]);
        }

        switch ($data->status) {
            case 'PAID':
                $invoice->update(['status' => 'PAID']);
                return Response::json(['success' => true]);

            case 'EXPIRED':
                $invoice->update(['status' => 'EXPIRED']);
                return Response::json(['success' => true]);

            case 'FAILED':
                $invoice->update(['status' => 'FAILED']);
                return Response::json(['success' => true]);

            default:
                return Response::json([
                    'success' => false,
                    'message' => 'Unrecognized payment status',
                ]);
        }
    }
}
