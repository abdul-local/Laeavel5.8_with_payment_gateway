<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    // buat method dengan nama index untuk mengembalikan nilai dari ke view
    public function index(){
        return view('donation');

    }
   

}
