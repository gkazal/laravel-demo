<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'code','category_id','product_name','product_slug','price','photo'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
