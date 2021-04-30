<?php

namespace App\Http\Controllers;
use App\Models\addProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rentPropertyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property= DB::table('add_properties')->where('result',0)->get();
        return view('rent',[
            'property'=>$property
        ]);
    }
}
