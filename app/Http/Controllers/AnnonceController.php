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
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

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

    public function create($region)
    {
        $departements = Departement::where('region_id', $region)->orderBy('name')->get();
        return view('annonces.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'departement_id' => 'required',
            'title' => 'required|max:30|string',
            'description' => 'required|string|max:155',
            'link' => 'required|url',
            'image' => 'required|mimes:jpeg,jpg,png|max:1014'
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
    public function edit(annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, annonce $annonce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(annonce $annonce)
    {
        //
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
