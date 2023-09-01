<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {

        // __ query builder__
        // $category = DB::table('categories')->get();


        // __ eloquent__
        $category = Category::all();
        
        // category.index.blade.php ar frontend show korbe.....
        return view('category.index', compact('category'));

    }

    // __ create method__
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {

        // dd($request->all());
        
        $validated = $request->validate([
           
            'category_name' => 'required|unique:categories|max:255',

        ]);

        // ... category insert by create/insert method...
        // Category::create([
        //     'category_name'=>$request->category_name,
        // ]);
        // dd($validated);


        // ... category insert by save method...
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();

        return redirect()->back();
        // dd($category);

    }

    // ... edit method...
    public function edit($id)
    {
        // database theke first method ar maddome query builder kore data nia aslam..
        // $data = DB::table('categories')->where('id',$id)->first();

        // find data from database with model..
        $data = Category::find($id);
        return view('category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // find the category..
        $category = Category::find($id); 
        // update the category..
        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        // .. Delete with query builder..
        // DB:: table('categories')->where('id', $id)->delete();

        // .. Delete with model...
        // $category = Category::find($id);
        // $category->delete();

        // or delete with destroy...
        Category::destroy($id);
        return redirect()->back();
    }
}
