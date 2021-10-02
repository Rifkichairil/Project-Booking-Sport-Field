<?php

namespace App\Http\Controllers\Admin\Normal;

use Auth;
use JsValidator;
use App\Http\Controllers\Controller;
use App\Repositories\FieldRepositories;
use Illuminate\Http\Request;
use App\Model\Field;

class FieldController extends Controller
{
    //
    public $user;
    protected $fieldRepository;

    public function __construct(FieldRepositories $fieldRepository)
    {
        $this->fieldRepository = $fieldRepository;
    }

    public function index()
    {
        $field = $this->fieldRepository->get();

        return view('admin.pages.normal.field.index', compact('field'));
    }

    public function create()
    {
        $user = Auth::user();
        // $fieldCategory = Field::with('category')->first();


        if ($user->status == 1) {
            # code...
            $validator = JsValidator::make([
                'field_name'     => 'required',
                'field_category' => 'required',
                'field_code'     => 'required',
                // 'category_id'    => 'required',
                'price'          => 'required',
                'image'          => 'required|image',
                'field_address'  => 'required',
                'no_rek'         => 'required|numeric'
            ]);

            // $category = $this->fieldRepository->getCategories();

            return view('admin.pages.normal.field.create', compact('validator'));
        }
        return redirect()->route('core.admins.index');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'field_name'     => 'required',
            'field_category' => 'required',
            'field_code'     => 'required',
            // 'category_id'    => 'required',
            'price'          => 'required',
            'image'          => 'required|image',
            'fasilitas'      => 'required',
            'field_address'  => 'required',
            'no_rek'         => 'required|numeric'
        ]);

        $field = $this->fieldRepository->save($req);

        return redirect()->route('core.lapangan.index');
    }

    public function edit($id)
    {
        $validator = JsValidator::make([
            'field_name'     => 'required',
            'field_category' => 'required',
            'field_code'     => 'required',
            'price'          => 'required',
            'image'          => 'required|image',
            'fasilitas'      => 'required',
            'field_address'  => 'required',
            'no_rek'         => 'required|numeric'

        ]);
        $field = $this->fieldRepository->first($id);

        return view('admin.pages.normal.field.create', compact('validator', 'field'));
    }

    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'field_name'     => 'required',
            'field_category' => 'required',
            'field_code'     => 'required',
            'price'          => 'required',
            'image'          => 'required|image',
            'fasilitas'      => 'required',
            'field_address'  => 'required',
            'no_rek'         => 'required|numeric'

        ]);
        $field = $this->fieldRepository->update($req, $id);
        return redirect()->route('core.lapangan.index')->with(['success' => 'Berhasil Memperbaharui Data Lapangan']);;
    }

    public function delete($id)
    {
        $this->fieldRepository->delete($id);

        return redirect()->route('core.lapangan.index')->with(['success' => 'Berhasil Menghapus Lapangan']);
    }
}
