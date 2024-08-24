<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Offers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    //
    public function offerStore(Request $request)
    {
        $request->validate(
            [
                "product_id" => "required|unique:offers,product_id",
                "offer_percent" => "integer",
                "offer_buy" => "nullable",
                "validity" => "required",
            ],
            [
                'product_id.unique' => 'This product already has an offer.',
            ]

        );
        $offer = Offers::create($request->all());
        return redirect('/dashbooard/products');
    }
    public function offerUpdate(Request $request, string $id)
    {
        $offers = Offers::find($id);

        if ($offers) {
            $offers->update($request->all());
        } else {
            return redirect('/dashbooard/offers')->with('error', 'Offer not found');
        }

        // Update Offers With all Request
        $offers->update($request->all());

        return redirect("/dashboard/offers");
    }
    public function destroyOffer($id)
    {
        $offer = Offers::find($id);
        $offer->delete();
        return redirect('/dashboard/offers');
    }











    // Front_end
    public function offerPage()
    {
        $currentDateTime = Carbon::now();


        $products = Products::whereHas('offers', function ($query) use ($currentDateTime) {
            $query->where('validity', '>', $currentDateTime);
        })->with([
                    'offers' => function ($query) use ($currentDateTime) {
                        $query->where('validity', '>', $currentDateTime);
                    }
                ])->get();


        return view('front-end.offers', compact('products'));
    }

    public function offerFilter(Request $request)
    {
        $filter = $request->input('offer_percent');

        if ($filter == '30') {
            $offers = Offers::where('offer_percent', '>=', 30)->get();
        } elseif ($filter == 'other') {
            $offers = Offers::where('offer_percent', '<', 10)->get();
        } elseif ($filter == '10') {
            $offers = Offers::where('offer_percent', 15)->get();
        } elseif ($filter == '20') {
            $offers = Offers::where('offer_percent', 20)->get();
        } else {
            $offers = Offers::all();
        }
        $html = '';
        foreach ($offers as $offer) {
            $products = Products::where('id', $offer->product_id)->first();
            $html .= view('front-end.components.cards', compact('offer', 'products'))->render();
        }

        if ($request->ajax()) {
            return response()->json([
                'html' => $html
            ]);
        }
    }

    public function offerSingle($id)
    {
        $offer = Offers::find($id);
        // Automaticly Get Product (belongs to relationship)
        $offer_product = $offer->product;
        $offer_product->offer_price = $offer_product->price - $offer_product->price * ($offer->offer_percent) / 100;

        
        // Convert the input to a Carbon instance
        $offerExpiryDate = Carbon::parse($offer->validity);
        $currentDateTime = Carbon::now();

        // Check if the offer has already expired
        if ($currentDateTime->greaterThanOrEqualTo($offerExpiryDate)) {
            $remainingTime = [
                'days' => 0,
                'hours' => 0,
                'minutes' => 0,
                'seconds' => 0,
            ];
        } else {
            // Get the difference in a human-readable format
            $diff = $offerExpiryDate->diff($currentDateTime);

            $remainingTime = [
                'days' => $diff->d,
                'hours' => $diff->h,
                'minutes' => $diff->i,
                'seconds' => $diff->s,
            ];
        }
        $reviews = Review::where('product_id',$offer_product->product_id)->orderBy('id','desc')->get();
        //Avg Rating
        $averageRating = Review::where('product_id',$offer_product->product_id)->avg('rating');


        if ($offer_product) {
            return view('front-end.offer', compact('offer_product','offer', 'remainingTime','reviews','averageRating'));
        } else {
            return redirect('/')->with('error', "Not Found");
        }

    }
}
