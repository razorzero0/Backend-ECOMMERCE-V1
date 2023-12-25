<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flashtime;
use App\Http\Resources\FlashtimeResource;
use Illuminate\Support\Facades\Validator;
class FlashtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data =  Flashtime::find(1)->get();
       //return response
       return new FlashtimeResource(true, 'Data Flash Sale Time !', $data);


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
        $validator = Validator::make($request->all(), [
            'sale_date'   => 'required',
            'status'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
         //create post
         $user = Flashtime::create([
            'sale_date'     => $request->sale_date,
            'status' => $request->status
        ]);

        //return response
        return new FlashtimeResource(true, 'Data Flash Sale Time berhasil ditabahkan!', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           //create post
           $user = Flashtime::find(1)->get();

        //return response
        return new FlashtimeResource(true, 'Data Flash Sale Time berhasil ditabahkan!', $user);
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
    public function update(Request $request, Flashtime $Flashtime)
    {
        $validator = Validator::make($request->all(), [
            'sale_date'   => 'required',
            'status'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
         //create post
         $Flashtime->update([
            'sale_date'   => $request->sale_date,
            'status' => $request->status
        ]);

        //return response
        return new FlashtimeResource(true, 'Data Flash Sale Time berhasil ditabahkan!', $Flashtime);
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
