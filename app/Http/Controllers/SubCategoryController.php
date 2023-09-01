<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{

    public function index(){

        //  subcategory get...
        $subCategory = SubCategory::all();
        // dd($data);
        // return response()->json($data);
        return view('subCategory.index', compact('subCategory'));
    }

    public function create()
    {
        $categories = Category::all();
        // dd($categories);

        // subCategory/create route a subcategory.create ar form show korbe. 
        // and categories table ar data lagbe category name select ar jonno ai jonno categories compact kora hoice..
        // seta create table jeye foreach ar maddome categories loop kore category name pabo..
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
        // dd($imagename);
        // if($imagename){
                //    dd($request->all());

        // }else{
        //     return 'not done';
        // }

        SubCategory::create([
            'code' => $request->code,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::of($request->product_name)->slug('-'),
            'price' => $request->price,
            'photo' => $imagename,
        ]);

        Session::flash('msg','Product added successfully');
        

        return redirect()->back();

    }


    // edit a click korle age edit show hobe.. then update hobe 
    public function edit($id)
    {
        // find data from database with model..
        // category and subcategory 2 ta table thekei taka nia asa lagbe..
        $categories = Category::all();
        $data = SubCategory::find($id);
        return view('subCategory.edit', compact('categories','data'));
    }

    public function update(Request $request, $id)
    {
        // find the category..
        $subCategory = SubCategory::find($id); 

        $request->validate([
            'code' => 'required',
            'category_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            // 'photo' => 'required|mimes:png,jpg,jpeg',

        ]);

        $imagename = '';
        $deleteOldImage = 'images/products/'.$subCategory->Photo;

        if($photo = $request->file('photo')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $imagename = time().'-'.uniqid().'.'.$photo->getClientOriginalExtension();
            $photo->move('images/products', $imagename);
        }else{
            $imagename = $subCategory->Photo;
        }

        // update the category..
        SubCategory::where('id', $id)-> update([
            // 'code'=>$request->code,
            // 'category_id'=>$request->category_id,
            // 'product_name'=>$request->product_name,
            // 'price'=>$request->price,
            // 'photo'=>$imagename,
            'code' => $request->code,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::of($request->product_name)->slug('-'),
            'price' => $request->price,
            'photo' => $imagename,
        ]);

        return redirect()->route('subCategory.index');
    }

    public function destroy($id)
    {
        // .. Delete with query builder..
        // DB:: table('categories')->where('id', $id)->delete();

        // .. Delete with model...
        // $category = Category::find($id);
        // $category->delete();

        // or delete with destroy...
        SubCategory::destroy($id);
        return redirect()->back();
    }

}
