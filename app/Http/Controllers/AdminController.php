<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Category;
use App\Models\Offers;
use App\Models\Products;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request){ 
        

        $companies = Company::all();
        $categories = Category::all();
        $products = Products::all();
        $offers = Offers::all();
        
        // All location
        $divisions_path = storage_path("all-locations/divisions.json");
        $districts_path = storage_path("all-locations/districts.json");
        
        $divisions = json_decode(file_get_contents($divisions_path), true);
        $districts = json_decode(file_get_contents($districts_path), true);
        

        $page = $request->page;
        $subpage = $request->subpage;



        
        return view('index',compact('companies','page','subpage','categories','divisions','districts', 'products','offers'));
        
    }
    public function forms(Request $request){
        // $companies = Company::all();
        $page = $request->page;
        return view('index',compact('page'));
    }
}
