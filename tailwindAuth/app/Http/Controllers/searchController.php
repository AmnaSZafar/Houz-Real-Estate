<?php
namespace App\Http\Controllers;
use App\Models\addProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class searchController extends Controller
{
    public function index(Request $request)
    {
        //return $request;
        $result = $request->input('result');//option to rent or sell
        $categories = $request->input('categories');//residential or commercial or a plot
        $area = $request->input('area');//area in marlas
        $price= $request->input('price');//price of selected area
        $property = addProperty::where('result',$result)->orWhere('type',$categories)->orWhere('area','<>', '%' . $area . '%')->orWhere('price','<>', '%' . $price . '%')->get();
        return view('search', compact('property'));
    }
}
// ->where('result','=', $result)
// ->orWhere('area','LIKE', '%' . $area . '%')
//         ->orWhere('price','LIKE', '%' . $price . '%')