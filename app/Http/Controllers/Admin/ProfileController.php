<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JsValidator;
use App\Repositories\ProfileRepositories;


class ProfileController extends Controller
{
    //

    protected $profileRepository;

    public function __construct(ProfileRepositories $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function profile()
    {
        return view('admin.pages.super.profile');
    }

    public function edit($id)
    {
        $validator = JsValidator::make([
            'first_name'     => 'required',
            'last_name'      => 'required',
        ]);
        $userp = $this->profileRepository->first($id);

        return view('admin.pages.super.profilesuperuser', compact('validator', 'userp'));
    }

    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => 'required'
        ]);
        $userp = $this->profileRepository->update($req, $id);
        return redirect()->route('core.profile');
    }
}
