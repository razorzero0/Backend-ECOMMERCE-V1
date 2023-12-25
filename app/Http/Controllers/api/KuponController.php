<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Http\Resources\KuponResource;
use Illuminate\Support\Facades\Validator;
class KuponController extends Controller
{
    public function index(){
        $data =  Coupon::all();
 return new KuponResource(1,"OK",$data);
     }
 
 
     public function store(Request $request)
     {
         $validator = Validator::make($request->all(), [
           
             'nama'   => 'required',
             'diskon' => 'required'
         ]);
 
         //check if validation fails
         if ($validator->fails()) {
             return response()->json($validator->errors(), 422);
         }
          //create post
          $user = Coupon::create([
             'nama_coupon'     => $request->nama,
             'jumlah_diskon'     => $request->diskon,
 
         ]);
 
         //return response
         return new KuponResource(true, 'Data Berhasil Ditambahkan!', $user);
     }

        public function destroy($id)
    {
        Coupon::destroy($id);
    }
 }
 