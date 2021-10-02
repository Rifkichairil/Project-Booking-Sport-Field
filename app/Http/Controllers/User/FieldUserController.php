<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Field;
use App\Model\OrderField;
use App\Model\Payment;
use App\Repositories\User\FieldUserRepositories;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Proengsoft\JsValidation\Facades\JsValidatorFacade;
use RealRashid\SweetAlert\Facades\Alert;

class FieldUserController extends Controller
{
    //

    protected $fielduserRepository;
    public $user;

    public function __construct(FieldUserRepositories $fielduserRepository)
    {
        $this->fielduserRepository = $fielduserRepository;
    }

    public function detailField(Request $req, $id)
    {
        $req->session()->put('prev', $req->fullUrl());

        $now = Carbon::now();
        $order_field    = OrderField::first();
        // dd($order_field);
        $detailField = Field::with('user')->where('id', $id)->firstOrFail();
        $order_paid = OrderField::where('field_id', $detailField->id)->where('status', 1)->get();
        $order_wait = OrderField::where('field_id', $detailField->id)->where('status', 0)->get();
        // dd($order_wait);

        return view('user.pages.detailfield', compact('detailField', 'order_paid', 'order_wait', 'order_field', 'now'));
    }

    public function bookingField()
    {
        $order = OrderField::with('payment')->paginate(20);
        return view('user.pages.bookingfield', compact('order'));
    }

    public function invoice($id)
    {
        $orderField = OrderField::where('id', $id)->firstOrFail();

        $time_start = Carbon::parse($orderField->time_start);
        $stime = ($time_start->hour * 60) + $time_start->minute;

        $time_end = Carbon::parse($orderField->time_end);
        $etime = ($time_end->hour * 60) + $time_end->minute;

        $total_time = ($etime - $stime) / 60;

        return view('user.pages.invoice', compact('orderField', 'total_time'));
    }

    public function storeField(Request $req, $id)
    {
        //ubah tanggaal
        $field_date = Carbon::createFromFormat('m/d/Y', $req->field_date)->format('Y-m-d');

        // Cek di table Order_field
        $order_field    = OrderField::where('field_date', $field_date)->get();
        $order_field_where    = OrderField::where('field_date', $field_date)->where('time_start')->where('time_end')->get();
        // dd($order_field_where);

        $detailField    = Field::where('id', $id)->firstOrFail();
        // $ord            = OrderField::where('id', $id)->firstOrFail();
        $exp_order      = Carbon::now()->addMinutes(15);
        $unique         = mt_rand(1, 100);

        $time_start = Carbon::parse($req->time_start);
        $stime = ($time_start->hour * 60) + $time_start->minute;
        $tstart = $req->time_start;

        $time_end = Carbon::parse($req->time_end);
        $etime = ($time_end->hour * 60) + $time_end->minute;
        $tend = $req->time_end;

        $total_time = ($etime - $stime) / 60;

        DB::beginTransaction();
        try {
            //code...
            $this->validate($req, [
                'field_date'     => 'required',
                'time_start'     => 'required',
                'time_start'     => 'required',
            ]);

            // Pemilihan Waktu
            if ($tstart > $tend || $tend == $tstart) {
                # code...
                Alert::error('Oops ! ', 'Periksa kembali waktu yang kamu pilih, cek table dibawah untuk melihat waktu yg sudah dipesan !');
                return back();
            }
            //

            // Diantara Start dan End
            // foreach ($order_field_where as $key => $value) {
            //     # code...
            //     if (($tstart >= $value->time_start) && ($tend <= $value->time_end)) {
            //         Alert::error('Oops ! ', 'Diantara Waktu');
            //         return back();
            //     }
            // }

            foreach ($order_field as $key => $value) {
                # code...
                // Tanggal sama dan Waktu Mulai Sama
                if (($field_date == $value->field_date) && ($tstart == $value->time_start)) {
                    # code...
                    Alert::error('Oops ! ', 'Tanggal Sama kembali waktu yang kamu pilih, cek table dibawah untuk melihat waktu yg sudah dipesan !');
                    return back();
                }

                if (($tstart >= $value->time_start) && ($tend <= $value->time_end)) {
                    # code...
                    Alert::error('Oops ! ', 'Diantara Waktu');
                    return back();
                }
            }
            // // BISA


            // foreach ($order_field as $key => $value) {
            //     # code...
            //     // BISA
            //     if (($tstart == $value->time_start) || ($tstart <= $value->time_end) ) {
            //         # code...
            //         Alert::error('Oops !', ' Waktu yang kamu pilih sudah ada yang pesan, cek table dibawah sebelum memesan lapangan !');
            //         return back();
            //     }


            //     if (($req->field_date == $value->field_date) && $value->field_id) {
            //         # code...
            //         Alert::error('Oops !', ' TANGGAL yang kamu pilih sudah ada yang pesan, cek table dibawah sebelum memesan lapangan !');
            //         return back();
            //     }
            // }


            // if ($order_field) {
            //     # code...
            //     return redirect()->route('user.index');
            // } else {

            $orderField = OrderField::create([
                'user_id'        => auth()->user()->id,
                'field_id'       => $detailField->id,
                'owner_id'       => $detailField->user_id,
                'unique_code'    => $unique,
                'field_name'     => $detailField->field_name,
                'field_category' => $detailField->field_category,
                'field_code'     => $detailField->field_code,
                'price'          => $detailField->price + $unique,
                'field_date'     => $field_date,
                'time_start'     => $tstart,
                'time_end'       => $tend,
                'total'          => ($total_time * $detailField->price) + $unique,
                'expired_order'  => $exp_order,
                'status'         => 0,
                'no_rek'         => $detailField->no_rek
            ]);
            // }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        Alert::success(' Pesanan Berhasil ', ' Silahkan Upload Bukti Pembayaran!');

        DB::commit();

        return redirect()->route('user.pemesanan');
    }

    public function delete($id)
    {
        $order_field = OrderField::find($id);
        $order_field->delete();
        Alert::success('Success ! ', 'Telah Menghapus Pesanan');

        return redirect()->back();
    }

    public function session(Request $req)
    {

        $req->session()->put('detail', $req->input());

        $req->session()->put('id', $req->input('id'));

        return redirect()->route('user.login');
    }
}
