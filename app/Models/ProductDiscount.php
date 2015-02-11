<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model {

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'date_start',
        'date_end',
        'minimum_quantity',
        'maximum_quantity',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
