<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Line;
use App\Models\Brand;


class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines = line::get();

        return view('admin.lines.index' , compact('lines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get();

        return view('admin.lines.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:lines|max:50',
            'brand' => 'required',
        ],[
            'name.required' => 'Please Enter The Line Name',
            'name.unique' => $request->name . ' is Already Present',
            'name.max' => 'Line Name Must Be Less Than 50 Character',
            'brand.required' => 'Please Choose The Line\'s Brand',
        ]);

        $line = Line::create([
            'name' =>  $request->name,
            'brand_id' =>  $request->brand
        ]);
        
        return redirect()->route('admin.lines.index')->with('success', "'$line->name' Inserted Successfully");
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
    public function edit(Request $request, $id)
    {
        $line = Line::find($id);
        $brands = Brand::get();
        session(['referer' => $request->header('referer')]);
        return view('admin.lines.edit', compact('line' , 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $brand = 'all')
    {
        // dd(session('referer'));
        $validated = $request->validate([
            'name' => 'required|unique:lines,name,'. $id .'|max:50',
            'brand' => 'required',
        ],[
            'name.required' => 'Please Enter The Line Name',
            'name.unique' => $request->name . ' is Already Present',
            'name.max' => 'Line Name Must Be Less Than 50 Character',
            'brand.required' => 'Please Choose The Line\'s Brand',
        ]);

        $line = Line::find($id)->update([
            'name' =>  $request->name,
            'brand_id' =>  $request->brand
        ]);
        
        $referer = session('referer');
        session()->forget('referer');
        return redirect($referer)->with('success', "'$request->name' Updated Successfully");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $line = Line::find($id);
        $line->delete();

        return redirect()->back()->with('success', "'$line->name' Deleted Successfully");
    }
}
