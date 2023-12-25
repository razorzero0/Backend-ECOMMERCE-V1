<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
class OrderController extends Controller
{
    

    public function index()
    {
        // Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-xYOlB80wTumUVX5pOrXnKW4g';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;
 
$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => 201099,
    ),
    'customer_details' => array(
        'first_name' => 'Andryan',
        'last_name' => 'Putra',
        'email' => 'AndryanPutra@gmail.com',
        'phone' => '08111222333',
    ),
);
  
$snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('midtrans',[
            "snaptoken" => $snapToken
        ]);
    }
}
