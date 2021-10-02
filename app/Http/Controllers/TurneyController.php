<?php

namespace App\Http\Controllers;

use App\Model\OrderField;
use App\Model\Turney;
use Illuminate\Http\Request;

class TurneyController extends Controller
{
    //
    public function index()
    {
        $turney = Turney::latest()->get();
        // $order_fields    = OrderField::where('id')->get();
        // dd($order_fields);
        return view('turnaments.turney', compact('turney'));
    }
}
