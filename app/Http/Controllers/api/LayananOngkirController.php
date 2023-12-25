<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layananongkir;
use App\Http\Resources\LayananOngkirResource;
use Illuminate\Support\Facades\Validator;
class LayananOngkirController extends Controller
{
    public function index(){
        $data =  Layananongkir::all();
 return new LayananOngkirResource(1,"OK",$data);
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
          $user = Layananongkir::create([
             'nama_layanan'     => $request->nama,
             'Link_layanan'     => $request->link,
            'api_key' => $request->api
         ]);
 
         //return response
         return new LayananOngkirResource(true, 'Data Berhasil Ditambahkan!', $user);
     }
     public function destroy($id)
     {
         Layananongkir::destroy($id);
     }
 }
