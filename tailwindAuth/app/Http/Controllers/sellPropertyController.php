<?php

namespace App\Http\Controllers;
use App\Models\addProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sellPropertyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property= DB::table('add_properties')->where('result',1)->get();
        return view('sell',[
            'property'=>$property
        ]);
    }
}
