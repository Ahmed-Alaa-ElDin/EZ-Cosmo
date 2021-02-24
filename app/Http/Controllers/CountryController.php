<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::get();
        
        return view('admin.countries.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
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
            'name' => 'required|unique:countries|max:50',
        ]);
        $country = Country::create([
            'name' =>  $request->name,
        ]);
        
        return redirect()->route('admin.countries.index')->with('success', "'$country->name' Inserted Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $validated = $request->validate([
            'name' => 'required|unique:countries,name,'. $country->id .'|max:50',
        ]);

        $country->update([
            'name' =>  $request->name
        ]);
        
        return redirect()->route('admin.countries.index')->with('success', "'$request->name' Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('admin.countries.index')->with('success', "'$country->name' Deleted Successfully");
    }

    public function showUsers(Request $request,Country $country)
    {
        return view('admin.countries.showUsers', compact('country'));
    }

    public function showProducts(Request $request,Country $country)
    {
        return view('admin.countries.showProducts', compact('country'));
    }

    public function showBrands(Request $request,Country $country)
    {
        return view('admin.countries.showBrands', compact('country'));
    }
}
