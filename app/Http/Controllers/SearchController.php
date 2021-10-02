<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Field;

class SearchController extends Controller
{
    //
    public function search(Request $req)
    {
        $q = $req->get('q');
        $field = Field::where('field_category', 'like', '%' . $q . '%')->orWhere('field_name', 'like', '%' . $q . '%')->paginate(9);
        // $fieldc = Field::where('field_category', 'like', '%' . $q . '%')->paginate(9);

        return view('user.pages.search', compact('q', 'field'));
    }
}
