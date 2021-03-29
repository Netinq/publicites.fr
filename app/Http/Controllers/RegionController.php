<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use App\Departement;
use App\Config;

class RegionController extends Controller
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
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show($region)
    {
        $region = Region::where('identifier', $region)->first();
        if (!$region->active) {
            return redirect()->back();
        }
        $departements = Departement::where('region_id', $region->identifier)->orderBy('name')->get();
        return view('regions.index', compact('departements'));
    }

    public function update_status($region)
    {
        $region = Region::where('identifier', $region)->first();
        if ($region->active) {
            $region->active = false;
        } else {
            $region->active = true;
        }
        $region->save();
        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        //
    }
}
