<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Select2AutocompleteController extends Controller
{
    /**
     * Show the application layout.
     *
     * @return \Illuminate\Http\Response
     */
    public function layout()
    {
    	return view('fo.testsearch');
    }

    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAjax(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("tags")
            		->select("id","nombre")
            		->where('nombre','LIKE',"%$search%")
            		->get();
        }

        return response()->json($data);
    }
}
