<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = Product::create([
            'name' => 'Buku sihir',
            'dec' => 'Buku Akhir Zaman',
            'stok' => '1',
            'distributor' => 'Penunggang Kuda Awal Zaman',
            'price' => '11100000',
        ]);

        // $products = Product::create($request->all());

        return redirect('product')->with('message', 'Success Created !');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();

        // return redirect('product')->with('message', 'Success Created !');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        Product::find(2)->update([
            'name' => 'Buku sihir',
            'dec' => 'Buku Akhir Zaman',
            'stok' => '1',
            'distributor' => 'Penunggang Kuda Awal Zaman',
            'price' => '11100000',
        ]);
        // $products = Product::findOrFail($id);

        // $products->update($request->all());

        return redirect('product')->with('message', 'Success Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {



        // $products = Product::findOrFail($id);
        // $products->delete();

        Product::destroy(2);


        return redirect('product')->with('message', 'Success Delete !');
    }
}
