<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User;
use Auth;
use App\Repositories\User\ProfileRepositories;
use Illuminate\Http\Request;
use JsValidator;
use App\Mail\userWelcome;
use Mail;

class ProfileController extends Controller
{
    //
    protected $profileRepository;

    public function __construct(ProfileRepositories $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function sendMail()
    {
        // Use mailtrap here.
        $user = User::where('email', Auth::user()->email)->firstOrFail();

        \Mail::to($user)->send(new userWelcome($user));

        return redirect()->route('user.profile')->with(['success' => 'Silahkan Cek Email Anda']);
    }

    public function profile()
    {
        // $field = $this->fielduserRepository->get();

        return view('user.pages.profileuser');
    }

    public function edit($id)
    {
        $validator = JsValidator::make([
            'first_name'     => 'required',
            'last_name'      => 'required',
            'edit_email'     => 'required'
        ]);
        $userp = $this->profileRepository->first($id);

        return view('user.pages.profileuseredit', compact('validator', 'userp'));
    }

    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'first_name'     => 'required',
            'last_name'      => 'required',
            'edit_email'     => 'required'
        ]);
        $userp = $this->profileRepository->update($req, $id);
        return redirect()->route('user.profile');
    }
}
