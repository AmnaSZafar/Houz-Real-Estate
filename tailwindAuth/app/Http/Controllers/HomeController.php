<?php

namespace App\Http\Controllers;
use App\Models\addProperty;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
        $property= addProperty::all();
        return view('home',[
            'property'=>$property
        ]);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addition');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|mimes:jpg, png, jpeg|max:5048',
        //     'result'=>'required',
        //     'type'=>'required',
        //     'area'=>'required|integer|min:1',
        //     'price'=>'required|integer|min:0'
        // ]);
        $newImageName = time().'_'.$request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'), $newImageName);
        

        $property = addProperty::create([
            'user_id'=>auth()->id(),
            'result'=>$request->input('option'),//option to rent or sell
            'type'=>$request->input('inlineRadioOptions'),//residential or commercial or a plot
            'area'=>$request->input('area'),//area in marlas
            'price'=>$request->input('price'),//price of selected area
            'image_path'=>$newImageName
            
        ]);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = addProperty::find($id);
        return view('edit')->with('property',$property);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newImageName = time().'_'.$request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'), $newImageName);

        $property = addProperty::where('id',$id)->update([

            'result'=>$request->input('option'),//option to rent or sell
            'type'=>$request->input('inlineRadioOptions'),//residential or commercial or a plot
            'area'=>$request->input('area'),//area in marlas
            'price'=>$request->input('price'),//price of selected area
            'image_path'=>$newImageName
        ]);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = addProperty::find($id);
        $property->delete();
        return redirect('/home');
    }

}
