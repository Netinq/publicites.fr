<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Departement;
use App\Account;
use App\Administrator;
use App\Annonce;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('account_created');
        $this->middleware('auth');
    }

    public function myannonces()
    {
        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        $annonces = Annonce::where('user_id', Auth::id())->get();
        foreach ($annonces as $ac) {
            $dep = Departement::where('identifier', $ac->departement_id)->first();
            $ac->departement_name = $dep->name;
        }
        return view('user.myannonces', compact('annonces', 'admin'));
    }

    public function users()
    {
        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        $users = User::all();
        foreach ($users as $user) {
            $account = Account::where('user_id', $user->id)->first();
            $user->account = $account;
        }
        return view('user.users', compact('users', 'admin'));
    }

    public function annonces()
    {
        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        $annonces = Annonce::all();
        foreach ($annonces as $ac) {
            $dep = Departement::where('identifier', $ac->departement_id)->first();
            $user = User::where('id', $ac->user_id)->first();
            $account = Account::where('user_id', $ac->user_id)->first();
            $ac->departement_name = $dep->name;
            $ac->user = $user;
            $ac->account = $account;
        }
        return view('user.annonces', compact('annonces', 'admin'));
    }

    public function index()
    {
        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        $account = Account::where('user_id', Auth::id())->first();
        $user = User::where('id', Auth::id())->first();
        return view('user.index', compact('account', 'user', 'admin'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
