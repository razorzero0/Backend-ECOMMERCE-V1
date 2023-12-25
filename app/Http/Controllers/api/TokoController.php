<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Toko;
use App\Http\Resources\TokoResource;
use Illuminate\Support\Facades\Validator;
class TokoController extends Controller
{
    public function index()
    {
        $user = Toko::find(1)->get();

        return new TokoResource(true,"succes", $user);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          
            'nama'   => 'required',
            'alamat'   => 'required',
            'description' => 'required',
            'service' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
         //create post
         $user = Toko::create([
            'nama'     => $request->nama,
            'alamat'     => $request->alamat,
            'description'     => $request->description,
            'service'     => $request->service,

        ]);

        //return response
        return new TokoResource(true, 'Data Berhasil Ditambahkan!', $user);
    }

    public function update(Request $request, $id){
       $data =  Toko::where('id','1')->update([
            'nama'     => $request->nama,
            'alamat'     => $request->alamat,
            'description'     => $request->description,
            'service'     => $request->service,
        ]);
        return new TokoResource(1,"STATUS",$data);
    }





}
