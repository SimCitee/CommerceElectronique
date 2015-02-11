<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
        'inventory_status_id',
        'name',
        'description',
        'length',
        'width',
        'height',
        'weight',
        'image_path',
        'sku',
        'upc',
        'quantity',
        'date_available',
        'is_archived',
        'is_inactive'
    ];

    public function inventoryStatus()
    {
        return $this->belongsTo('App\Models\InventoryStatus');
    }

    public function productDetail()
    {
        return $this->hasMany('App\Models\ProductDetail');
    }

    public function productImage()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function productCategory()
    {
        return $this->belongsToMany('App\Models\ProductCategory');
    }

    public function productDiscount()
    {
        return $this->hasMany('App\Models\ProductDiscount');
    }

    public function productPrice()
    {
        return $this->hasMany('App\Models\ProductPrice');
    }

    public function productSale()
    {
        return $this->hasMany('App\Models\ProductSale');
    }

    public function orderLine()
    {
        return $this->hasMany('App\Models\OrderLine');
    }

    public function boardGameVersion()
    {
        return $this->hasOne('App\Models\BoardGameVersion');
    }

}
