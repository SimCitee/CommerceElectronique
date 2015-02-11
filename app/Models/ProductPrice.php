<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model {

    protected $fillable = [
        'product_id',
        'cost_price',
        'prime_cost',
        'retail_price'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
