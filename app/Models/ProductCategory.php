<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {

    public $timestamps = false;

    protected $fillable = [
        'parent_id',
        'name_fr',
        'name_en'
    ];

    public function productCategoryChild()
    {
        return $this->hasMany('App\Models\ProductCategory', 'parent_id');
    }

    public function productCategoryParent()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'parent_id');
    }

    public function product()
    {
        return $this->belongsToMany('App\Models\Product');
    }

}
