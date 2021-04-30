<?php

namespace App\Http\Controllers;
use App\Models\addProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $property= addProperty::orderBy('id','desc')->take(5)->get();
        return view('welcome',[
            'property'=>$property
        ]);
    }

    
}
