<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index(Request $request)
    // {
    //     return view($this->template($request).'.index');
    // }
    //
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create(Request $request)
    // {
    //     return view($this->template($request));
    // }

    public function template(Request $request){
        $parts = explode('/',$request->path());
        $templateUrl="";
        foreach ($parts as $key => $value) {
            $templateUrl.=".{$value}";
        }

        return response()->view("templates{$templateUrl}");
    }
}
