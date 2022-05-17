<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;

    public function subCategory()
    {
        //return $this->hasMany(Categoryhassubcategory::class);
        return $this->hasMany(Categoryhassubcategory::class);
    }
    public static function getSubCateGoryName(int $subcategoryid){
        return Subcategory::find($subcategoryid)['name'];
    }


}
