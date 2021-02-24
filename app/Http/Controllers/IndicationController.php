<?php

namespace App\Http\Controllers;

use App\Models\Indication;
use Illuminate\Http\Request;

class IndicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indications = Indication::get();
        
        return view('admin.indications.index',compact('indications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.indications.create');
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
            'name' => 'required|unique:indications|max:50',
        ]);
        $indication = Indication::create([
            'name' =>  $request->name,
        ]);
        
        return redirect()->route('admin.indications.index')->with('success', "'$request->name' Inserted Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Indication  $indication
     * @return \Illuminate\Http\Response
     */
    public function show(Indication $indication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Indication  $indication
     * @return \Illuminate\Http\Response
     */
    public function edit(Indication $indication)
    {
        return view('admin.indications.edit', compact('indication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Indication  $indication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indication $indication)
    {
        $validated = $request->validate([
            'name' => 'required|unique:indications,name,'. $indication->id .'|max:50',
        ]);

        $indication->update([
            'name' =>  $request->name
        ]);
        
        return redirect()->route('admin.indications.index')->with('success', "'$request->name' Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indication  $indication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indication $indication)
    {
        $indication->delete();

        return redirect()->route('admin.indications.index')->with('success', "'$indication->name' Deleted Successfully");
    }
}
