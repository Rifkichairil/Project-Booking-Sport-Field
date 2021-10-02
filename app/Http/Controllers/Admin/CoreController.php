<?php

namespace App\Http\Controllers\Admin;

use Auth;
use JsValidator;
use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\Mail\Welcome;
use Illuminate\Http\Request;
use App\Repositories\CoreRepositories;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
use Mail;
use RealRashid\SweetAlert\Facades\Alert;

// use Illuminate\Support\Facades\Auth;

class CoreController extends Controller
{
    protected $coreRepository;
    public $user;

    public function __construct(CoreRepositories $coreRepository)
    {
        $this->coreRepository = $coreRepository;
    }

    public function dashboard()
    {
         // Cek di table Order_field
       
        return view('admin.pages.dashboard');
    }

    public function login()
    {
        $validator = JsValidator::make([
            'email'      => 'required',
            'password'   => 'required',
        ]);
        return view('admin.login', compact('validator'));
    }

    public function auth(Request $req)
    {
        $this->validate($req, [
            'email'     => 'required',
            'password'  => 'required',
        ]);

        // $credential = $req->only('email', 'password');

        // ($req->has('remember')) ? $remember = true : $remember = false;

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'role_id' => 99])) {
            Alert::success(' Login Success ');
            return redirect()->intended('admin/super-admin');
        } else if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'role_id' => 1, 'is_email' => 1])) {
            Alert::success(' Login Success ');
            return redirect()->route('core.admins.index');
        } else {
            return redirect()->route('core.login')->with(['error' => 'Email atau password salah !']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('core.login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
            'telp'       => 'required',
            'password'   => 'required',

        ]);

        $user = User::create([
            'first_name' => $req->first_name,
            'last_name'  => $req->last_name,
            'email'      => $req->email,
            'telp'       => $req->telp,
            'password'   => Hash::make($req->password),
            'role_id'    => '1',
            'status'     => '0',
            'account'    => '50',
            'is_email'   => '0',
        ]);
        // $this->coreRepository->save($req);

        // Use mailtrap here.
        \Mail::to($user)->send(new Welcome($user));

        return redirect()->route('core.login');
    }
}
