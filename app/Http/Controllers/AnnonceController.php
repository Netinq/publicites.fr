<?php

namespace App\Http\Controllers;

use App\annonce;
use App\Departement;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($region)
    {
        $departements = Departement::where('region_id', $region)->get();
        return view('annonces.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'departement_id' => 'required',
            'title' => 'required|max:200|string',
            'description' => 'required|string',
            'link' => 'required|url',
            'image' => 'required|mimes:jpeg,jpg,png|max:1014'
        ]);

        $extension = $request->image->extension();
        $name = Str::random(5);

        $request->image->storeAs('/public', $name.".".$extension);
        $url = Storage::url($name.".".$extension);

        $file = File::create([
            'annonce_id' => $name,
            'url' => $url,
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
