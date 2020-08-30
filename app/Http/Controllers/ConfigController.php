<?php

namespace App\Http\Controllers;

use App\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Config;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function store(Request $request)
    {
        if (request('price') != null)
        {
            $price = Config::where('name', 'price')->first();
            $price->integer = request('price');
            $price->save();
        }
        if (request('fb_link') != null)
        {
            $fb_link = Config::where('name', 'fb_link')->first();
            $fb_link->string = request('fb_link;');
            $fb_link->save();
        }
        return redirect()->route('user.index')->with('success', ['Configuration mise à jour !', 'Les options de configurations du site ont été mises à jours.']);;
    }
}
