<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Category;


class CompaniesController extends Controller
{
    //store data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'division' => 'required',
            'city' => 'required',
            'iframe' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,JPG,PNG|max:2048',
        ]);
        $company = new Company;
        $company->name = $request->name;
        $company->description = $request->description;
        $company->category = $request->category;
        $company->division = $request->division;
        $company->city = $request->city;
        $company->map = $request->map;
        $company->iframe = $request->iframe;
        // Upload image
        if($request->hasFile("image")){
            
            $filename = $company->name . '.' . $request->image->extension();
            $request->image->move(public_path("uploads/restaurants/"),$filename);
            $company->image = "uploads/restaurants/".$filename;
        }else{
            return response()->json(['message'=>"No file found"]);
        }
        $company->map = $request->map;
        $company->save();
        return redirect("/dashboard/companies");
    }

    // Update Data
    public function update(Request $request, $id)
    {
            $request->validate(
                [
                    'name' => 'required',
                    'description' => 'required',
                    'division' => 'required',
                    'city' => 'required',
                    'iframe' => 'required',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,
                                svg,JPG,PNG|max:2048',

                ]
                );

            $company = Company::find($id);
            $company->name = $request->name;
            $company->description = $request->description;
            $company->category = $request->category;
            $company->division = $request->division;
            $company->city = $request->city;
            $company->map = $request->map;
            if($request->hasFile('image')){
                $fileName = 'uploads/restaurants/'.$request->name.'.'. $request->image->extension();
                $request->image->move(public_path('uploads/restaurants'), $fileName);
                $company->image = $fileName;
            }
            $company->iframe = $request->iframe;
            $company->save();
            return redirect("/dashboard/companies");
    }

    public function destroy(Request $request, $id){
        $company = Company::find(request()->id);
        $company->delete();
        return redirect('/dashboard/companies');
    }


    // Store Category
    public function storeCategory(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect('/dashboard/category');
    }
    public function updateCategory(Request $request, $id){

        $category = Category::find(request()->id);

        $category->name = $request->name;
        $category->save();
        
        return redirect("/dashboard/category");
    }
    public function destroyCategory(Request $request, $id){
        $cat = Category::find(request()->id);
        $cat->delete();
        return redirect('/dashboard/category');
    }



}
