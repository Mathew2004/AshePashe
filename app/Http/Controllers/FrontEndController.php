<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Products;
use App\Models\Review;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontEndController extends Controller
{
    //
    public function home()
    {
        $products = Products::take(5)->get();
        $companies = Company::take(4)->get();
        // $averageRating = Review::where('product_id', $products->id)->avg('rating');

        return view("front-end.index", compact("products", "companies"));
    }
    public function allProducts(Request $request)
    {
        $products = Products::paginate(10);;
        $companies = Company::all();

        if ($request->ajax()) {
            return view('front-end.components.cards', compact('products'))->render();
        }
        // $averageRating = Review::where('product_id', $products->id)->avg('rating');

        return view("front-end.all-products", compact("products", "companies"));
    }
    public function allRestaurants(Request $request)
    {
        $products = Products::paginate(10);
        $companies = Company::paginate(10);

        if ($request->ajax()) {
            return view('front-end.components.cards', compact('products'))->render();
        }
        // $averageRating = Review::where('product_id', $products->id)->avg('rating');

        return view("front-end.all-restaurants", compact("products", "companies"));
    }
    public function product($id)
    {
        //All Products
      

        $prod = Products::where('slug', $id)
            ->with('offer')
            ->first();
        // Similar Prods
        $products = Products::where('name', 'LIKE', "%{$prod->name}%")
            ->orWhere('description', 'LIKE', "%{$prod->name}%")
            ->take(5)
            ->with('offer')
            ->get();
        $store = Company::where('name', $prod->company_id)->first();

        $reviews = Review::where('product_id', $prod->id)->orderBy('id', 'desc')->get();
        //Avg Rating
        $averageRating = Review::where('product_id', $prod->id)->avg('rating');


        // Offer
        $remainingTime = '';
        if ($prod->offer) {
            // Convert the input to a Carbon instance
            $offerExpiryDate = Carbon::parse($prod->offer->validity);
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
        }


        return view("front-end.product", compact("prod", 'store', 'reviews', 'averageRating', 'remainingTime', 'products'));
    }
    public function restaurant($id)
    {
        $store = Company::where('slug', $id)->first();
        $prods = Products::where("company_id", $store->id)->get();
        return view("front-end.restaurent", compact('store', 'prods'));
    }

    // Search Products
    public function searchSuggession(Request $request)
    {
        $query = $request->get('query');
        $type = $request->get('type');

        if ($type === 'restaurants') {
            $results = Company::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->take(5)
                ->get();
        } else {
            $results = Products::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->take(5)
                ->with('offer')
                ->get();
        }

        // $products = Products::where('name', 'LIKE', "%{$query}%")
        //     ->orWhere('description', 'LIKE', "%{$query}%")
        //     ->take(5) // Limit the number of suggestions
        //     ->get();

        return response()->json($results);
    }
    public function search(Request $request, $query)
    {
        $type = $request->get('type');
        if ($type === 'restaurants') {
            $products = Company::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $products = Products::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->with('offer')
                ->get();
        }
        // $store = Company::where('name',$products->company_id)->first();

        return view("front-end.search-result", compact('products', 'query'));
    }

}
