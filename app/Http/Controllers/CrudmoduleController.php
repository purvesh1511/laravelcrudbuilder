<?php

namespace App\Http\Controllers;

use App\Models\Crudmodule;
use Illuminate\Http\Request;

class CrudmoduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('crud-module.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud-module.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Crudmodule::create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crudmodule  $crudmodule
     * @return \Illuminate\Http\Response
     */
    public function show(Crudmodule $crudmodule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crudmodule  $crudmodule
     * @return \Illuminate\Http\Response
     */
    public function edit(Crudmodule $crudmodule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crudmodule  $crudmodule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crudmodule $crudmodule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crudmodule  $crudmodule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crudmodule $crudmodule)
    {
        //
    }
}
