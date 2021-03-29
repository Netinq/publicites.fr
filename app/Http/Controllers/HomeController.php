<?php

namespace App\Http\Controllers;

use App\Departement;
use App\Config;
use App\Region;

class HomeController extends Controller
{
    public function __construct()
    {
        $fb_link = Config::where('name', 'fb_link')->first();
        \View::share('fb_link', $fb_link);
    }

    public function index()
    {
        $price = Config::where('name', 'price')->first();
        $regions = Region::orderBy('identifier', 'ASC')->get();
        return view('home', compact('price', 'regions'));
    }

    public function legal()
    {
        $fb_link = Config::where('name', 'fb_link')->first();
        return view('legal', compact('fb_link'));
    }

    public function devlog()
    {
        $fb_link = Config::where('name', 'fb_link')->first();
        return view('devlog');
    }

    public function regions($id)
    {
        $fb_link = Config::where('name', 'fb_link')->first();
        $departements = Departement::where('region_id', $id)->get();
        return view('regions.index', compact('departements', compact('fb_link')));
    }

    public function become_advertiser()
    {
        $fb_link = Config::where('name', 'fb_link')->first();
        return view('account.become_advertiser', compact('fb_link'));
    }
}
