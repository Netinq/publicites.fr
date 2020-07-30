<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('account_uncreated');
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:35|string',
            'firstname' => 'required|max:50|string',
            'adress' => 'required|max:200|string',
            'postal_code' => 'required|integer',
            'locality' => 'required|max:100|string',
            'country' => 'required|max:100|string',
        ]);

        $account = new Account();
        $account->user_id = Auth::id();
        $account->name = request('name');
        $account->firstname = request('firstname');
        $account->adress = request('adress');
        $account->cp = request('postal_code');
        $account->city = request('locality');
        $account->country = request('country');
        $account->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(account $account)
    {
        //
    }
}
