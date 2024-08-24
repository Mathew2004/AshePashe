<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Products;
use Illuminate\Http\Request;

class CreateStore extends Controller
{
    //
    public function create_name(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required|unique:companies,user_id',
        ]);
        
        $store = new Company();
        $store->name = $request->name;
        $store->user_id = $request->user_id;
        $store->save();

        return redirect('/create-store/' . $store->slug);
    }
    public function add_store_page($slug)
    {
        $store = Company::where('slug', $slug)->first();
        $products = Products::where('company_id', $store->id)->get();

           // All location
           $divisions_path = storage_path("all-locations/divisions.json");
           $districts_path = storage_path("all-locations/districts.json");
           
           $divisions = json_decode(file_get_contents($divisions_path), true);
           $districts = json_decode(file_get_contents($districts_path), true);


        return view('front-end.seller.add-store', compact('store', 'products','districts','divisions'));
    }
    public function add_store_img(Request $request, $slug)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,
                                svg,JPG,PNG|max:2048',
        ]);
        $store = Company::where('slug', $slug)->first();

        // Move Uploaded File
        if ($request->hasFile('image')) {
            $fileName = 'uploads/restaurants/' . $store->slug . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/restaurants'), $fileName);
            $store->image = $fileName;
            $store->save();
        } else {
            return redirect("/about");
        }

        return redirect()->back();
    }

    public function add_product(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'company_id' => 'required',
            'price' => 'required|numeric',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($request->hasFile('image1')) {
            // $data['image1'] = $request->file('image1')->store('products', 'public');
            $fileName = $request->name . '_1_' . $request->company_id . '.' . $request->image1->extension();
            $request->image1->move(public_path('uploads/products'), $fileName);
            $data['image1'] = $fileName;
        }

        if ($request->hasFile('image2')) {
            // $data['image2'] = $request->file('image2')->store('products', 'public');
            $fileName = $request->name . '_2_' . $request->company_id . '.' . $request->image2->extension();
            $request->image2->move(public_path('uploads/products'), $fileName);
            $data['image2'] = $fileName;
        }
        if ($request->hasFile('image3')) {
            // $data['image3'] = $request->file('image3')->store('products', 'public');
            $fileName = $request->name . '_3_' . $request->company_id . '.' . $request->image3->extension();
            $request->image3->move(public_path('uploads/products'), $fileName);
            $data['image3'] = $fileName;
        }

        Products::create($data);

        return redirect()->back();

    }

    public function delete_product($slug){
        $product = Products::where('slug',$slug)->first();
        if($product){
            $product->delete();
            return redirect()->back();
        }
        else{
            return redirect()->back()->with('error','Note FOund');
        }
    }
    public function update_product(Request $request, $slug)
    {
        //
        $products = Products::where('slug',$slug)->first();
        
        

        $products->update($request->all());
        return redirect()->back();

    }

    // Update Store
    public function update_store_info(Request $request, string $slug)
    {
        //
        $store = Company::where('slug',$slug);
        
        $request->except('_token');
        if($store){
            $store->update([
                'description'=> $request->description,
                'map' => $request->map,
                'division' => $request->division,
                'city' => $request->city,
                'iframe' => $request->iframe,
                'phone' => $request->phone,
                'name' => $request->name,
            ]);
            return redirect()->back();
        }
        else{
            return redirect("/")->with(['error','not found']);
        }

    }
}
