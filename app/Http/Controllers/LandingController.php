<?php

namespace App\Http\Controllers;

use App\About;
use App\Contact;
use App\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        \Stripe\Stripe::setApiKey('sk_test_51Hfv21KYWi6uPg51VXmXk412Gi5xPSw2rFT972JdPkLxvWuvV9bpOzfP8f1m4zwWDWlecLKzeNOIkkz04zDPf0xG00fKN1WTlS');

        $plans = \Stripe\Plan::all();
        $products = \Stripe\Product::all();

        // dd($products);

        $sliders = Slider::all();
        $about = About::find(1);
        $documets = $about->documents;
        $last = $documets->last()->id; // Variable contador para saber el último tipo de documento.
        $contact = Contact::find(1);

        return view('welcome', ['plans' => $plans,
                                'products' => $products,
                                'sliders' => $sliders,
                                'about' => $about,
                                'documents' => $documets,
                                'last' => $last,
                                'contact' => $contact
                                ]);
    }
}
