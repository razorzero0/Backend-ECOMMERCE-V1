<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paymentgateway;
use App\Http\Resources\PaymentResource;
use Illuminate\Support\Facades\Validator;
class PaymentGatewayController extends Controller
{
    public function index(){
       $data =  Paymentgateway::all();
return new PaymentResource(1,"OK",$data);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          
            'nama'   => 'required',
            'link' => 'required',
            'api' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
         //create post
         $user = Paymentgateway::create([
            'nama_layanan'     => $request->nama,
            'Link_layanan'     => $request->link,
            'api_key' => $request->api

        ]);

        //return response
        return new PaymentResource(true, 'Data Berhasil Ditambahkan!', $user);
    }
    public function destroy($id)
    {
        Paymentgateway::destroy($id);
    }

}
