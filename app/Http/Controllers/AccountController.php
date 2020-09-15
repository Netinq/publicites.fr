<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Config;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('account_uncreated')->only('create');
        $this->middleware('account_created')->except(['create', 'store']);

        session(['url.intended' => url()->previous()]);
        $fb_link = Config::where('name', 'fb_link')->first();
        \View::share('fb_link', $fb_link);
    }

    public function index() { return view('user.index'); }

    public function create() { return view('account.create'); }

    public function store(Request $request)
    {
        $this->validate($request,[
            'surname' => 'required|max:35|string',
            'firstname' => 'required|max:50|string',
            'adress' => 'required|max:200|string',
            'postal_code' => 'required|integer',
            'locality' => 'required|max:100|string',
            'country' => 'required|max:100|string',
        ]);

        $account = new Account();
        $account->user_id = Auth::id();
        $account->surname = request('surname');
        $account->firstname = request('firstname');
        $account->adress = request('adress');
        $account->cp = request('postal_code');
        $account->city = request('locality');
        $account->country = request('country');
        $account->save();

        if (session()->get('url.intended') != null) return redirect()->idented('/');
        else return redirect()->route('user.index')->with('success', ['Votre profil à été créé !', 'Vous pouvez dès maintenant y accéder en vous connectant à votre compte via votre \"dashboard\".']);;
    }

    public function show(account $account)
    {
        $account = Account::where('user_id', Auth::id())->first();
        return view('', compact('account'));
    }

    public function edit(account $account)
    {
        $account = Account::where('user_id', Auth::id())->first();
        return view('', compact('account'));
    }

    public function update(Request $request, account $account)
    {
        $this->validate($request,[
            'surname' => 'required|max:35|string',
            'firstname' => 'required|max:50|string',
            'adress' => 'required|max:200|string',
            'postal_code' => 'required|integer',
            'locality' => 'required|max:100|string',
            'country' => 'required|max:100|string',
        ]);

        $account = Account::where('user_id', Auth::id())->first();
        if ($account->surname != request('surname')) $account->surname = request('surname');
        if ($account->firstname != request('firstname')) $account->firstname = request('firstname');
        if ($account->adress != request('adress')) $account->adress = request('adress');
        if ($account->cp != request('postal_code')) $account->cp = request('postal_code');
        if ($account->city != request('locality')) $account->city = request('locality');
        if ($account->country != request('country')) $account->country = request('country');
        $account->save();

        return redirect()->route('user.index')->with('success', ['Votre profil à été mis à jour !', 'La/Les modification(s) ont été enregistrée(s) sur votre profil.']);;
    }

    public function destroy(account $account)
    {
        $account->delete();
    }
}
