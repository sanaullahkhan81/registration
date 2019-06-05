<?php

namespace App\Http\Controllers;

use App\Ethnic;
use Illuminate\Http\Request;

class EthnicController extends Controller
{

    public function index()
    {
        return Ethnic::select(['id','ethnic_origin_name'])->get();
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ethnic  $ethnic
     * @return \Illuminate\Http\Response
     */
    public function show(Ethnic $ethnic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ethnic  $ethnic
     * @return \Illuminate\Http\Response
     */
    public function edit(Ethnic $ethnic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ethnic  $ethnic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ethnic $ethnic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ethnic  $ethnic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ethnic $ethnic)
    {
        //
    }
}
