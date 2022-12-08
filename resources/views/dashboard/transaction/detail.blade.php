@extends('layouts.dashboard-main')

@push('css-alt')
<link rel="stylesheet" href="{{ asset('book/style2.css') }}">
@endpush

@section('content')



<div class="container">
    <div class="row m-0">
        <div class="col-md-7 col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="row box-right">
                        <div class="col-md-8 ps-0 ">
                            <p class="ps-3 textmuted fw-bold h6 mb-0">TOTAL PAYMENT</p>
                            <p class="h1 fw-bold d-flex"> <span
                                    class=" fas fa-dollar-sign textmuted pe-1 h6 align-text-top mt-1"></span>{{ number_format( $detail->amount ) }}
                            <p class="ms-3 px-2">{{ $detail->status }}</p>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
                <div class="col-12 px-0 mb-4">
                    @foreach ($detail->instructions as $pay )

                    <div class="box-right">
                        <div class="d-flex pb-2">
                            <p class="fw-bold h7"><span class="textmuted">Payment-</span>{{ $pay->title }}</p>
                        </div>

                        @foreach($pay->steps as $step)

                        <div class="bg-blue p-2">
                            <P class="h8 textmuted">{{ $loop->iteration }}. {!! $step !!}</P>
                        </div>

                        @endforeach


                    </div>

                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-5 col-12 ps-md-5 p-0 ">
            <div class="box-left">
                <p class="textmuted h8">QR Scan</p>
                {{-- <p class="fw-bold h7">{{ $detail->qr_string }}</p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
