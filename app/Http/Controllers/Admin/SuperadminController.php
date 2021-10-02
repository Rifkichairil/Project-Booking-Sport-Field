<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Model\User;
use App\Repositories\SuperRepositories;
use JsValidator;




class SuperadminController extends Controller
{
    protected $superRepository;
    public $user;

    public function __construct(SuperRepositories $superRepository)
    {
        $this->superRepository = $superRepository;
    }


    public function index()
    {
        $user = User::get();

        return view('admin.pages.super.index', compact('user'));
    }

    public function category()
    {
        $category = Category::get();

        return view('admin.pages.super.kategori', compact('category'));
    }

    public function storeCategory(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
        ]);

        $category = Category::create([
            'name' => $req->name,
        ]);
        // $this->coreRepository->save($req);

        return redirect()->route('core.super.category');
    }

    public function updateStatus($id)
    {
        $this->superRepository->updateStatus($id);

        return redirect()->route('core.super.index')->with('msg-success', 'Status berita telah diperbarui.');
    }
    public function deleteAdmin($id)
    {
        $this->superRepository->deleteAdmin($id);

        return redirect()->route('core.super.index')->with(['success' => 'Berhasil Menghapus User']);
    }
}
