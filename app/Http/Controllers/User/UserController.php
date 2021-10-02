<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\OrderField;
use App\Model\Payment;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositories;
use App\Model\User;
use Mail;

class UserController extends Controller
{

    protected $userRepositories;
    public $user;

    public function __construct(UserRepositories $userRepositories)
    {
        $this->userRepositories = $userRepositories;
    }

    public function index()
    {
        $field = $this->userRepositories->getField();

        $order = OrderField::get();


        return view('user.pages.dashboard', compact('field', 'order'));
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
