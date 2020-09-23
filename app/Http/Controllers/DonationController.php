<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Donation;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;


class DonationController extends Controller
{
      // buat method untuk construct
      public function __construct()
      {
          Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
          Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
          Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
          Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
      }
      
    // buat method dengan nama index untuk mengembalikan nilai dari ke view
    public function index(){
        return view('donation');

    }
    // buat method store untuk create Donation
    public function store(Request $request){

      
        \DB::transaction(function() use ($request){

            $donation = Donation::create([
                'donor_name'=>$request->donor_name,
                'donor_email'=>$request->donor_email,
                'donation_type'=>$request->donation_type,
                'donor_name'=>$request->donor_name,
                'amount'=>floatval($request->amount),
                'note'=>$request->note

            ]);
            $payload=[
                'transaction_details' => [
                    'order_id'=>'SANBOX-'.uniqid(),
                    'gross_amount'=>$donation->amount,
    
                ],
                'constumer_details' => [
                    'first_name'=>$donation->donor_name,
                    'email'=>$donation->donor_email
    
                ],
                'items_details' => [
                    'id'=>$donation->donation_type,
                    'price'=>$donation->amount,
                    'quantity'=>1,
                    'name'=>ucwords(str_replace('-','',$donation->donation_type))
                ]
                ];
                $snapToken=Veritrans_Snap::getSnapToken($payload);
                $donation->snap_token = $snapToken;
                $donation->save();
                $this->response['snap_token'] =$snapToken;
    
        });
        return response()->json($this->response);
       
    }
    

}
