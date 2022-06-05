<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'price',
    'category_id',
    'subcategory_id',
    'description',
    'show',
    'image',
    'quantity',
    'unit_price',
    'discount_type',
    'discount',
    'tax_type',
    'tax',

];

    public function getCategory()
        {
            return $this->belongsTo(Category::class,'category_id');
        }
    public function getSubcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    
}
