<?php

namespace App\Http\Controllers;

use App\Departement;
use Illuminate\Http\Request;
use App\Annonce;
use App\Region;
use App\Config;

class DepartementController extends Controller
{

    public function __construct()
    {
        $fb_link = Config::where('name', 'fb_link')->first();
        \View::share('fb_link', $fb_link);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show($departement)
    {
        $annonces = Annonce::where(['departement_id' => $departement, 'pay' => true])->orderBy('updated_at', 'desc')->get();
        $dep = Departement::where('identifier', $departement)->first();
        $reg = Region::where('identifier', $dep->region_id)->first();
        return view('departements.index', compact('annonces', 'dep', 'reg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departement $departement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        //
    }
}
