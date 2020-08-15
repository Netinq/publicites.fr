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

class AnnonceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($region)
    {
        $departements = Departement::where('region_id', $region)->get();
        return view('annonces.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'departement_id' => 'required',
            'title' => 'required|max:200|string',
            'description' => 'required|string',
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

        return redirect()->route('user.index')->with('success', ['Votre annonce à été publié', 'Vous pouvez dès maintenant y accéder en vous connectant à votre compte via votre \"dashboard\".']);;
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
