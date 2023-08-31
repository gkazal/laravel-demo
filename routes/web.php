<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // dd(app());
    return view('welcome');
});
 
Route::get('/about', function () {
    // dd(app());
    return view('about');
})->middleware('auth');
 


// Route::get('/product', function(){
//     return view('product');
// });

// product crud operation...
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/create', [ProductController::class, 'addProduct'])->name('addProduct');
Route::post('/product', [ProductController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');


// ...category show...
Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');

// category create...
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');

// category edit and update and delete
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');


//  Sub category crud operations...
Route::get('subCategory/create', [SubCategoryController::class, 'create'])->name('subCategory.create');
Route::post('subCategory/store', [SubCategoryController::class, 'store'])->name('subCategory.store');
 




// Route::get('/category/create', [ProductController::class, 'create'])->name('addProduct');











 





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
