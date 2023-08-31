<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    //

    public function create()
    {
        $categories = SubCategory::all();
        // dd($categories);



        return view('subCategory.create',compact('categories'));
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'code' => 'required',
            'category_id' => 'required',
            'product_name' => 'required',

            'price' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg',
        ]);

        $imagename = '';
        if($photo = $request->file('photo')){
            $imagename = time().'-'.uniqid().'.'.$photo->getClientOriginalExtension();
            // image move to products foler..
            $photo->move('images/products', $imagename);
        }
        if($imagename){
                   dd($request->all());

        }else{
            return 'not done';
        }

        // SubCategory::create([
        //     'code' => $request->code,
        //     'category_id' => $request->category_id,
        //     'product_name' => $request->product_name,
        //     'product_slug' => Str::of($request->product_name)->slug('-'),
        //     'price' => $request->price,
        //     'photo' => $imagename,
        // ]);

        // Session::flash('msg','Product added successfully');
        // return redirect()->back();

    }

}
