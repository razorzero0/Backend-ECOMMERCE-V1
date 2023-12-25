<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ongkir;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\OngkirResource;
class OngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $data = Ongkir::orderBy('id', 'desc')->first();
        return new OngkirResource(true,"berhasil", $data);
    }
    public function jne()
    {
       
        $response = Http::withHeaders([
            'key' => '691a921d26984422f4457de022244e7a'])
            ->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 501,
            'destination' => 114,
            'weight' => 1700,
            'courier' => "jne"
        ]);

        $a = $response['rajaongkir']['results'];
        return new OngkirResource(true,"berhasil", $a);
    }
    public function tiki()
    {
        $response = Http::withHeaders([
            'key' => '691a921d26984422f4457de022244e7a'])
            ->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 501,
            'destination' => 114,
            'weight' => 1700,
            'courier' => "tiki"
        ]);

        $a = $response['rajaongkir']['results'];
        return new OngkirResource(true,"berhasil", $a);
    }





    // public function kota()
    // {
    //     $response = Http::withHeaders([
    //         'key' => '691a921d26984422f4457de022244e7a'])
    //         ->get('https://api.rajaongkir.com/starter/city?province_id=5')['rajaongkir'];
    //         $a = $response['results'];
    //     return new OngkirResource(true,"berhasil", $a);
    // }
    // public function Storekota()
    // {

    //     $response = Http::withHeaders([
    //         'key' => '691a921d26984422f4457de022244e7a'])
    //         ->get('https://api.rajaongkir.com/starter/city')['rajaongkir'];
    //         $a = $response['results'];
    //     return new OngkirResource(true,"berhasil", $response);
    // }

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
        $response = Http::withHeaders([
            'key' => '691a921d26984422f4457de022244e7a'])
            ->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 501,
            'destination' => 114,
            'weight' => 1700,
            'courier' => "jne"
        ]);

        $a = $response['rajaongkir']['results'];
        return new OngkirResource(true,"berhasil", $a);
    }


    public function harga(Request $request)
    {
        $data = Ongkir::create([
            'harga_ongkir' => $request->harga_ongkir
        ]);

        return new OngkirResource(true,"berhasil", $data);
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
       
        $data = Ongkir::orderBy('id', 'desc')->first()->update([
            'harga_ongkir' => $request->harga_ongkir
        ]);


        return new OngkirResource(true,"berhasil", $data);
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
