<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;




class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product', ['products' => $products]);
    }

    public function addProduct(){

        return view('addProduct');
    }

    public function store(Request $request){
        // dd($request->all());

        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg',

        ]);

        $imagename = '';
        if($photo = $request->file('photo')){
            $imagename = time().'-'.uniqid().'.'.$photo->getClientOriginalExtension();
            // $imagename = $image->getClientOriginalExtension();

            $photo->move('images/products', $imagename);
        }

        Product::create([
            'code'=>$request->code,
            'name'=>$request->name,
            'price'=>$request->price,
            'category'=>$request->category,
            'photo'=>$imagename,
        ]);

        // $newProduct = Product::create($data);
        Session::flash('msg','Product added successfully');

        return redirect(route('product'));



        /*
        
         
        $request->validate([
            'code' => 'required',
            'category_id' => 'required',
            'product_name' => 'required|unique:sub_categoriess|max:255',

            'price' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg',
        ]);

        $imagename = '';
        if($photo = $request->file('photo')){
            $imagename = time().'-'.uniqid().'.'.$photo->getClientOriginalExtension();
            // image move to products foler..
            $photo->move('images/products', $imagename);
        }
        // if($imagename){
        //            dd($request->all());

        // }else{
        //     return 'not done';
        // }

        // SubCategories::create([
        //     'code' => $request->code,
        //     'category_id' => $request->category_id,
        //     'product_name' => $request->product_name,
        //     'product_slug' => Str::of($request->product_name)->slug('-'),
        //     'price' => $request->price,
        //     'photo' => $imagename,
        // ]);

        // Session::flash('msg','Product added successfully');
        return redirect()->back();
        
        
        */

    }

    public function edit($id){
        $product = Product::findOrFail($id);
        // return $product;
        return view('edit', compact('product'));
    }

    public function update(Request $request, $id){

        $product = Product::findOrFail($id);
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            // 'photo' => 'required|mimes:png,jpg,jpeg',

        ]);

        $imagename = '';
        $deleteOldImage = 'images/products/'.$product->Photo;


        if($photo = $request->file('photo')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $imagename = time().'-'.uniqid().'.'.$photo->getClientOriginalExtension();
            $photo->move('images/products', $imagename);
        }else{
            $imagename = $product->Photo;
        }

        Product::where('id', $id)-> update([
            'code'=>$request->code,
            'name'=>$request->name,
            'price'=>$request->price,
            'category'=>$request->category,
            'photo'=>$imagename,
        ]);

        // $newProduct = Product::create($data);
        Session::flash('msg','Product Edit successfully');

        return redirect(route('product'));

    }

    public function delete($id){
        $product = Product::findOrFail($id);
        $deleteOldImage = 'images/products/'.$product->Photo;
        if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
        }
        $product->delete();
        Session::flash('msg','Product delete successfully');
        return redirect()->back();



    }







}
