<?php

namespace App\Http\Controllers;

use App\Departement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
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
