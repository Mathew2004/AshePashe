<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            $fileName = $request->name. '_1_' . $request->company_id . '.' . $request->image1->extension();
            $request->image1->move(public_path('uploads/products'), $fileName);
            $data['image1'] = $fileName;
        }

        if ($request->hasFile('image2')) {
            // $data['image2'] = $request->file('image2')->store('products', 'public');
            $fileName = $request->name. '_2_' . $request->company_id . '.' . $request->image2->extension();
            $request->image2->move(public_path('uploads/products'), $fileName);
            $data['image2'] = $fileName;
        }
        if ($request->hasFile('image3')) {
            // $data['image3'] = $request->file('image3')->store('products', 'public');
            $fileName = $request->name. '_3_' . $request->company_id . '.' . $request->image3->extension();
            $request->image3->move(public_path('uploads/products'), $fileName);
            $data['image3'] = $fileName;
        }

        Products::create($data);

        return redirect('/dashboard/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $products = Products::find($id);
        
        

        $products->update($request->all());
        return redirect("/dashboard/products");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $products = Products::find($id);
        if ($products) {
            $products->delete();
            return redirect('/dashboard/products');
        } else {
            return redirect('/dashboard/products')->with('error', 'Product not found');
        }

    }

   
}
