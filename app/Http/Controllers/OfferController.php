<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use DefStudio\Telegraph\Facades\Telegraph;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $offer = new Offer();
        $offer->name = $request->input('name');
        $offer->email = $request->input('email');
        $offer->phone = $request->input('phone');
        $offer->message = $request->input('message');
        $offer->save();

        $message = view('telegram.offer', ['offer' => $offer])->render();
        Telegraph::html($message)->send();

        return redirect()->route('posts.index');
    }
}
