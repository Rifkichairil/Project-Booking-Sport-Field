<?php

namespace App\Http\Controllers\Admin;

use Auth;
use JsValidator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AdminsRepositories;

class AdminsController extends Controller
{
    //
    public $user;

    protected $adminsRepository;

    public function __construct(AdminsRepositories $adminsRepository)
    {
        $this->adminsRepository = $adminsRepository;
    }

    public function index()
    {
        return view('admin.pages.normal.index');
    }

    public function profile()
    {
        return view('admin.pages.normal.profile');
    }
}
