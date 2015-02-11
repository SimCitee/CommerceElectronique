<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model {

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function tax()
    {
        return $this->belongsToMany('App\Models\Tax');
    }

}
