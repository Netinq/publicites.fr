<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Str;
use App\Administrator;
use App\User;
use App\Account;

class AnnonceController extends Controller
{

    public function __construct()
    {
        $paypal_conf = Config::get('paypal');
        
        $this->middleware('auth');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function search(Request $request)
    {
        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        $args = request('search');
        $ac_p1 = Annonce::where('title', 'LIKE', '%'.$args.'%')
        ->orWhere('description', 'LIKE', '%'.$args.'%')
        ->orWhere('departement_id', 'LIKE', '%'.$args.'%')->get();
        if (User::where('email', 'LIKE', '%'.$args.'%')->first() != null)
        {
            $ac_p2 = User::where('email', 'LIKE', '%'.$args.'%')->first()->annonce()->get();
            $annonces = $ac_p1->merge($ac_p2);
        } else {
            $annonces = $ac_p1;
        }
        foreach ($annonces as $ac) {
            $dep = Departement::where('identifier', $ac->departement_id)->first();
            $user = User::where('id', $ac->user_id)->first();
            $account = Account::where('user_id', $ac->user_id)->first();
            $ac->departement_name = $dep->name;
            $ac->user = $user;
            $ac->account = $account;
        }
        return view('user.annonces', compact('annonces', 'admin' , 'args'));
    }

    public function create($region)
    {
        $departements = Departement::where('region_id', $region)->orderBy('name')->get();
        return view('annonces.create', compact('departements'));
    }

    public function store(Request $request)
    {
        if (!(Str::contains(request('link'), 'https://')) && !(Str::contains(request('link'), 'http://')))
        {
            $request->merge(['link' => 'http://'.request('link')]);
        }

        $this->validate($request,[
            'departement_id' => 'required',
            'title' => 'required|max:30|string',
            'description' => 'required|string|max:155',
            'link' => 'required|url',
            'image' => 'required|mimes:jpeg,jpg,png|max:1024'
        ]);

        $image_file = request('image');
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));

        $annonce = new Annonce();
        $annonce->user_id = Auth::id();
        $annonce->departement_id = request('departement_id');
        $annonce->title = request('title');
        $annonce->description = request('description');
        $annonce->link = request('link');
        $annonce->image = $image;
        $annonce->save();

        if(Administrator::where('user_id', Auth::id())->exists()) $admin = true;
        else $admin = false;
        
        if ($admin)
        {
            $annonce = Annonce::where('id', $annonce->id)->first();
            $annonce->pay = true;
            $annonce->save();
    
            return redirect()->route('user.index')->with('success', ['Votre annonce à été publié', 'Vous pouvez dès maintenant y accéder en vous connectant à votre compte via votre \"dashboard\".']);
        }
        else {
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
    
            $item = new Item();
            $item->setName('Annonce sur publicites.fr')
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setPrice(\App\Config::where('name', 'price')->first()->integer);
    
            $item_list = new ItemList();
            $item_list->setItems(array($item));
    
            $amount = new Amount();
            $amount->setCurrency('EUR')
                    ->setTotal(\App\Config::where('name', 'price')->first()->integer);
            
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list);
    
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(route('confirm', [$annonce->id]))
                    ->setCancelUrl(route('user.index'));
    
            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
            $payment->create($this->_api_context);
            
            foreach ($payment->getLinks() as $link) { if ($link->getRel() == 'approval_url') { $redirect_url = $link->getHref(); break; }}
            
            Session::put('paypal_payment_id', $payment->getId());
    
            if (isset($redirect_url)) {
                return Redirect::away($redirect_url);
            } else {
            Session::put('error', 'Unknown error occurred');
                return Redirect::route('paywithpaypal');
            }
        }
    }

    public function pay($id)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName('Annonce sur publicites.fr')
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice(\App\Config::where('name', 'price')->first()->integer);

        $item_list = new ItemList();
        $item_list->setItems(array($item));

        $amount = new Amount();
        $amount->setCurrency('EUR')
                ->setTotal(\App\Config::where('name', 'price')->first()->integer);
        
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('confirm', [$id]))
                ->setCancelUrl(route('user.index'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        $payment->create($this->_api_context);
        
        foreach ($payment->getLinks() as $link) { if ($link->getRel() == 'approval_url') { $redirect_url = $link->getHref(); break; }}
        
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            return Redirect::away($redirect_url);
        } else {
        Session::put('error', 'Unknown error occurred');
            return Redirect::route('paywithpaypal');
        }
    }

    public function confirm_paiement($id, Request $request)
    {
        if (empty($request->query('paymentId')) || empty($request->query('PayerID')) || empty($request->query('token')))
            return redirect()->route('user.index')->with('error', ['Paiement non éffectué', 'Veuillez tenter de nouveau !']);

        $payment = Payment::get($request->query('paymentId'), $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->query('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() != 'approved') return redirect()->route('user.index')->with('error', ['Paiement non éffectué', 'Veuillez tenter de nouveau !']);

        $annonce = Annonce::where('id', $id)->first();
        $annonce->pay = true;
        $annonce->save();

        return redirect()->route('user.index')->with('success', ['Votre annonce à été publié', 'Vous pouvez dès maintenant y accéder en vous connectant à votre compte via votre \"dashboard\".']);
    }

    public function show(annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ac = Annonce::where('id', $id)->first();
        $ac->image = route('image.fetch', $ac->id);
        return view('annonces.edit', compact('ac'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $annonce = Annonce::where('id', $id)->first();
        if ($annonce->user_id != Auth::id() && !Administrator::where('user_id', Auth::id())->exists())
        {
            return redirect()->route('user.index')->with('error', ['Vous n\'avez pas la permission', '']);
        }

        if (!Str::contains(request('link'), 'https://') && !Str::contains(request('link'), 'http://'))
        {
            $request->merge(['link' => 'http://'.request('link')]);
        }

        $this->validate($request,[
            'title' => 'max:30|string',
            'description' => 'string|max:155',
            'link' => 'url',
            'image' => 'mimes:jpeg,jpg,png|max:1024'
        ]);
        if (request('image') != null)
        {
            $image_file = request('image');
            $image = Image::make($image_file);
            Response::make($image->encode('jpeg'));
        }

        if (request('title') != null) $annonce->title = request('title');
        if (request('description') != null) $annonce->description = request('description');
        if (request('link') != null) $annonce->link = request('link');
        if (request('image') != null) $annonce->image = $image;
        $annonce->save();

        return redirect()->route('user.index')->with('success', ['Votre annonce à été mise à jour', 'Vous pouvez dès maintenant y accéder en vous connectant à votre compte via votre \"dashboard\".']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annonce = Annonce::find($id);
        if ($annonce->user_id != Auth::id() && !Administrator::where('user_id', Auth::id())->exists())
        {
            return redirect()->route('user.index')->with('error', ['Vous n\'avez pas la permission', '']);
        }
        $annonce->delete();
        return redirect()->route('user.index')->with('success', ['Votre annonce à été supprimé', '']);
    }

    public function confirmPayment(Request $request)
    {
        // If query data not available... no payments was made.
        if (empty($request->query('paymentId')) || empty($request->query('PayerID')) || empty($request->query('token')))
            return redirect('/checkout')->withError('Payment was not successful.');
// We retrieve the payment from the paymentId.
        $payment = Payment::get($request->query('paymentId'), $this->api_context);
// We create a payment execution with the PayerId
        $execution = new PaymentExecution();
        $execution->setPayerId($request->query('PayerID'));
// Then we execute the payment.
        $result = $payment->execute($execution, $this->api_context);
// Get value store in array and verified data integrity
        // $value = $request->session()->pull('key', 'default');
// Check if payment is approved
        if ($result->getState() != 'approved')
            return redirect('/checkout')->withError('Payment was not successful.');
return redirect('/checkout')->withSuccess('Payment made successfully');
    }
}
