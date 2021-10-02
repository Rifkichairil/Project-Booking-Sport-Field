<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Mail;



class EmailController extends Controller
{
    //
    public $user;

    public function activated(Request $req)
    {
        // dd($req);

        $user = User::where('email', $req->email)->firstOrFail();

        $user->update([
            'is_email' => '1',
        ]);
        if ($user->role_id ==  1) {
            # code...
            return redirect()->route('core.login');
        } else {
            # code...
            return redirect()->route('user.login');
        }
    }

    public function userActivated(Request $req)
    {
        // dd($req);

        $user = User::where('email', $req->email)->firstOrFail();

        $user->update([
            'is_email' => '1',
        ]);

        return redirect()->route('user.login');
    }
}
