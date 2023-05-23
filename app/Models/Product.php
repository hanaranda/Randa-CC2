<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image'];
    
    public function index()
{
    return view('accueil', compact('products'));
}
public function category()
{
    return $this->belongsTo(Category::class);
}

}
