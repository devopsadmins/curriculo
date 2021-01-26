<?php

namespace App\Http\Controllers;

use App\Models\AreasInteresse;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areasInteresses = AreasInteresse::all();

        return view('areasInteresses.index', compact('areasInteresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areasInteresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AreasInteresse::create($request->all());

        return back()->with('message', 'item stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AreasInteresse $areasInteresse
     * @return \Illuminate\Http\Response
     */
    public function show(AreasInteresse $areasInteresse)
    {
        return view('areasInteresses.show', compact('areasInteresse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AreasInteresse $areasInteresse
     * @return \Illuminate\Http\Response
     */
    public function edit(AreasInteresse $areasInteresse)
    {
        return view('areasInteresses.edit', compact('areasInteresse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\AreasInteresse $areasInteresse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AreasInteresse $areasInteresse)
    {
        $areasInteresse->update($request->all());

        return back()->with('message', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AreasInteresse $areasInteresse
     * @return \Illuminate\Http\Response
     */
    public function destroy(AreasInteresse $areasInteresse)
    {
        $areasInteresse->delete();

        return back()->with('message', 'item deleted successfully');
    }
}
