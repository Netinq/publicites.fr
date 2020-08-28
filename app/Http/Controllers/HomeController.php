<?php

namespace App\Http\Controllers;

use App\Departement;
use App\Config;

class HomeController extends Controller
{
    public function index()
    {
        $price = Config::where('name', 'price')->first();
        $fb_link = Config::where('name', 'fb_link')->first();
        return view('home', compact('price', 'fb_link'));
    }

    public function legal()
    {
        return view('legal');
    }

    public function regions($id)
    {
        $departements = Departement::where('region_id', $id)->get();
        return view('regions.index', compact('departements'));
    }

    public function become_advertiser()
    {
        return view('account.become_advertiser');
    }
}
