<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use JsValidator;
use App\Mail\Welcome;
use App\Repositories\User\CoreRepositories;
use App\Model\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail as Mail;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;

class CoreController extends Controller
{
    protected $coreRepository;
    public $user;

    public function __construct(CoreRepositories $coreRepository)
    {
        $this->coreRepository = $coreRepository;
        $this->middleware('auth.user');
    }

    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function login(Request $req)
    {
        $validator = JsValidator::make([
            'email'      => 'required',
            'password'   => 'required',
        ]);

        $detail = $req->session()->get('detail');
        $url = $req->session()->get('prev');
        $id = $req->session()->get('id');
        // dd($url);
        // dd($detail);
        // dd($id);


        return view('user.login', compact('validator'));
    }

    public function auth(Request $req)
    {
        $this->validate($req, [
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $detail = $req->session()->get('detail');
        $id = $req->session()->get('id');


        if ($detail) {
            # code...
            if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'role_id' => 2])) {
                Alert::success(' Login Success ');
                return redirect()->route('user.detailfield', ['id' => $id]);
            }
        }

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'role_id' => 2])) {
            Alert::success(' Login Success ');
            return redirect()->intended('/');
        } else {
            return redirect()->route('user.login')->with(['error' => 'Email atau password salah !']);;
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.index');
    }

    public function register()
    {
        return view('user.register');
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
            'role_id'    => '2',
            'status'     => '1',
            'account'    => '10',
            'is_email'   => '0',
        ]);

        // Use mailtrap here.
        Mail::to($user)->send(new Welcome($user));
        // \Mail::to($user)->send(new Welcome($user));

        return redirect()->route('user.login');
    }
}
