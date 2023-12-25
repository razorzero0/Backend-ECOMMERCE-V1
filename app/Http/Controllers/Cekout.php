<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Http\Resources\CheckoutResource;
class Cekout extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Checkout::join('products','checkouts.product_id', '=', 'products.id')->latest('checkouts.created_at')->get(['products.*','checkouts.*']);

        // $data = Checkout::latest()->get();

        return new CheckoutResource(true,"working", $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  Checkout::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
            'diskon' => $request->diskon,
            'tipe' => $request->tipe

        ]);
        return new CheckoutResource(true,"working", $data );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $data =  Checkout::where('');
        return new CheckoutResource(true,"working", $data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Checkout::orderBy('id', 'desc')->first()->update([
            'harga_ongkir' => $request->harga_ongkir
        ]);


        return new CheckoutResource(true,"berhasil", $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
