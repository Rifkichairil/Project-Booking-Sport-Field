<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\Model\OrderField;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index($id)
    {
        $orderField = OrderField::where('id', $id)->firstOrFail();
        return view('user.pages.payment', compact('orderField'));
    }

    public function store(Request $req, $id)
    {
        $orderField    = OrderField::where('id', $id)->firstOrFail();

        $this->validate($req, [
            'image'          => 'required|image',
        ]);

        $payment = Payment::create([
            'order_field_id' => $orderField->id,
            'user_id'        => $orderField->user_id,
            'owner_id'       => $orderField->owner_id,
            'image'          => $req->image->store('images'),
        ]);

        return redirect()->route('user.pemesanan')->with(['success' => 'Berhasil Mengupload Bukti Transfer, Silahkan Cek Invoice 5 Menit Setelah ini!']);
    }
}
