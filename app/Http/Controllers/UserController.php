<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Departement;
use App\Account;
use App\Administrator;
use App\Annonce;
use Illuminate\Support\Facades\Auth;
use App\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('account_created');
        $this->middleware('auth');
        $fb_link = Config::where('name', 'fb_link')->first();
        \View::share('fb_link', $fb_link);
    }

    public function myannonces()
    {
        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        if(Annonce::where('pay', false)->where('user_id', Auth::id())->exists()) $needpay = true;
        else $needpay = false;
        $annonces = Annonce::where('user_id', Auth::id())->get();
        foreach ($annonces as $ac) {
            $dep = Departement::where('identifier', $ac->departement_id)->first();
            $ac->departement_name = $dep->name;
            $ac->image = route('image.fetch', $ac->id);
        }
        return view('user.myannonces', compact('annonces', 'admin', 'needpay'));
    }

    public function users()
    {
        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        if($admin && Administrator::where('user_id', Auth::id())->first()->superuser) $superuser = true;
        else $superuser = false;
        if(Annonce::where('pay', false)->where('user_id', Auth::id())->exists()) $needpay = true;
        else $needpay = false;
        $users = User::all();

        foreach ($users as $user) {
            $account = Account::where('user_id', $user->id)->first();
            if ($account != null) $user->account = $account;
            else {
                $account = new Account();
                $account->user_id = $user->id;
                $account->surname = "undefine";
                $account->firstname = "undefine";
                $account->adress = "undefine";
                $account->cp = "undefine";
                $account->city = "undefine";
                $account->country = "undefine";
                $user->account = $account;
            }
            $user->admin = Administrator::where('user_id', $user->id)->exists();
            if ($user->admin) $user->superuser = Administrator::where('user_id', $user->id)->first()->superuser;
        }
        if ($admin) return view('user.users', compact('users', 'admin', 'needpay', 'superuser'));
        return view('user.users', compact('users', 'admin', 'needpay'));
    }

    public function search(Request $request)
    {
        $fb_link = Config::where('name', 'fb_link')->first();
        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        if(Annonce::where('pay', false)->where('user_id', Auth::id())->exists()) $needpay = true;
        else $needpay = false;
        $args = request('search');
        $users = User::where('email', 'LIKE', '%'.$args.'%')->get();
        foreach ($users as $user) {
            $account = Account::where('user_id', $user->id)->first();
            $user->account = $account;
        }
        return view('user.users', compact('users', 'admin', 'needpay' , 'args', 'fb_link'));
    }

    public function annonces()
    {
        $fb_link = Config::where('name', 'fb_link')->first();
        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        if(Annonce::where('pay', false)->where('user_id', Auth::id())->exists()) $needpay = true;
        else $needpay = false;
        $annonces = Annonce::all();
        foreach ($annonces as $ac) {
            $dep = Departement::where('identifier', $ac->departement_id)->first();
            $user = User::where('id', $ac->user_id)->first();
            $account = Account::where('user_id', $ac->user_id)->first();
            $ac->departement_name = $dep->name;
            $ac->user = $user;
            $ac->account = $account;
        }
        return view('user.annonces', compact('annonces', 'admin', 'needpay', 'fb_link'));
    }

    public function setAdmin($id)
    {
        if (!Administrator::where('user_id', Auth::id())->exists() || !Administrator::where('user_id', Auth::id())->first()->superuser)
        {
            return redirect()->route('user.users')->with('error', ['Vous n\'avez pas la permission', '']);
        }

        if (Auth::id() == $id)
        {
            return redirect()->route('user.users')->with('error', ['Vous ne pouvez pas modifier cet utilisateur', '']);
        }

        if (Administrator::where('user_id', $id)->exists())
        {
            return redirect()->route('user.users')->with('error', ['L\'utilisateur est déjà administrateur', '']);
        }

        $admin = Administrator::create();
        $admin->user_id = $id;
        $admin->save();

        $user = User::where('id', $id)->first();

        return redirect()->route('user.users')->with('success', ['Nouveau admin ajouté !', $user->email]);
    }

    public function removeAdmin($id)
    {
        if (!Administrator::where('user_id', Auth::id())->exists() || !Administrator::where('user_id', Auth::id())->first()->superuser)
        {
            return redirect()->route('user.users')->with('error', ['Vous n\'avez pas la permission', '']);
        }

        if (Auth::id() == $id)
        {
            return redirect()->route('user.users')->with('error', ['Vous ne pouvez pas modifier cet utilisateur', '']);
        }

        if (!Administrator::where('user_id', $id)->exists())
        {
            return redirect()->route('user.users')->with('error', ['L\'utilisateur n\'est pas administrateur', '']);
        }

        $admin = Administrator::where('user_id', $id)->first();
        $admin->delete();
        $user = User::where('id', $id)->first();

        return redirect()->route('user.users')->with('error', ['Admin supprimé !', $user->email]);
    }

    public function index()
    {
        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        if(Annonce::where('pay', false)->where('user_id', Auth::id())->exists()) $needpay = true;
        else $needpay = false;
        $account = Account::where('user_id', Auth::id())->first();
        $user = User::where('id', Auth::id())->first();

        if ($admin)
        {
            $email = Config::where('name', 'email')->first();
            $price = Config::where('name', 'price')->first();
            $fb_link = Config::where('name', 'fb_link')->first();
            return view('user.index', compact('account', 'user', 'admin', 'needpay', 'price', 'fb_link', 'email'));
        } else return view('user.index', compact('account', 'user', 'admin', 'needpay'));
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
        $user = User::find($id);
        if (!Administrator::where('user_id', Auth::id())->exists())
        {
            return redirect()->route('user.index')->with('error', ['Vous n\'avez pas la permission', '']);
        }
        $email = $user->email;
        $user->delete();
        return redirect()->route('user.index')->with('success', ['Le compte '.$email.' à été supprimé !', '']);
    }

    public function passwordEdit($id) {

        $account = Account::where('user_id', $id)->first();
        if ($account->id != Auth::id())
        {
            return redirect()->route('user.index')->with('error', ['Vous n\'avez pas la permission', '']);
        }
        return view('account.password', compact('account'));
    }

    public function passwordChange(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $this->validate($request,[
            'oldpassword' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        if(Hash::check(request('oldpassword'), $user->password))
        {
            $user->password = Hash::make(request('password'));
            $user->save();
            return redirect()->route('user.index')->with('success', ['Votre profil à été mis à jour !', 'La/Les modification(s) ont été enregistrée(s) sur votre profil.']);;
        } else {
            return redirect(route('passwordEdit', [$id]))
            ->withErrors(['oldpassword'=>'Mot de passe invalide'])
            ->withInput();
        }

    }

    public function passwordReset($id)
    {
        $user = User::find($id);
        if (!Administrator::where('user_id', Auth::id())->exists() && $id != Auth::id())
        {
            return redirect()->route('user.index')->with('error', ['Vous n\'avez pas la permission', '']);
        }

        $newpassword = Str::random(8);
        $user->password = Hash::make($newpassword);
        $user->save();

        return redirect()->route('user.index')->with('error', ['Vous avez réinitialisé le mot de passe de '.$user->email, 'Voici sont nouveau mot de passe : '.$newpassword]);
    }
}
