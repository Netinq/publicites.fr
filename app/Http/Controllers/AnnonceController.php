<?php

namespace App\Http\Controllers;

use App\annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $this->validate($request,[
            'departement_id ' => 'required',
            'title' => 'required|max:200|string',
            'description' => 'required|text',
            'link' => 'required|text',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show(annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit(annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, annonce $annonce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(annonce $annonce)
    {
        //
    }
}
