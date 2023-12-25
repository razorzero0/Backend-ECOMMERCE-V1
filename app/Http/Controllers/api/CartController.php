<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Http\Resources\CartResource;
use Illuminate\Support\Facades\Validator;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Cart::join('products','carts.product_id','=','products.id')->
          get(['carts.*','products.name','products.harga','products.foto']);

       
       
       
        
        return new CartResource(true, 'Data Post Berhasil Ditambahkan!', $a);
    }
    // $data = Checkout::join('products','checkouts.product_id', '=', 'products.id')->get(['products.*','checkouts.*']);

    // return new CheckoutResource(true,"working", $data );
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
        $validator = Validator::make($request->all(), [
          
            'product'   => 'required',
            'user' => 'required',
            'quantity' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
         //create post
         $user = Cart::create([
            'product_id'     => $request->product,
            'user_id'     => $request->user,
            'quantity'     => $request->quantity,

        ]);

        //return response
        return new CartResource(true, 'Data Post Berhasil Ditambahkan!', $user);
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
        $data = Cart::find($id)->update([
            'quantity' => $request->quantity
        ]);


        return new CartResource(true,"berhasil", $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy($id);
    }
}
