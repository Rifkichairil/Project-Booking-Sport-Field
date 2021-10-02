<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Turney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class TurneyController extends Controller
{
    //
    public function index()
    {
        $turney = Turney::latest()->paginate(6);

        return view('turnaments.turney-admin', compact('turney'));
    }

    public function store(Request $req)
    {
        DB::beginTransaction();
        try {
            //code...
            $this->validate($req, [
                'image'             => 'required|image',
                'turney_name'       => 'required',
                'turney_desc'       => 'required',
                'turney_address'    => 'required',
                'turney_open_req'   => 'required',
                'turney_fee'        => 'required',
                'turney_link'       => 'required',
            ]);

            $turney = Turney::create([
                'image'           => $req->image->store('images/turney'),
                'turney_name'     => $req->turney_name,
                'turney_desc'     => $req->turney_desc,
                'turney_address'  => $req->turney_address,
                'turney_open_req' => $req->turney_open_req,
                'turney_fee'      => $req->turney_fee,
                'turney_link'      => $req->turney_link,
            ]);
        } catch (\Exception $e) {
            Alert::error(' Oops ! ', 'Cek Kembali data yang telah diinput!');

            DB::rollBack();
            throw $e;
        }
        Alert::success(' Success ! ', 'Turney Berhasil Ditambahkan!');

        DB::commit();
        return redirect()->route('core.super.admin.turney');
    }
}
