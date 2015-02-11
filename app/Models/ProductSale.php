<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model {

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'date_start',
        'date_end',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
