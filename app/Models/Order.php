<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $fillable = [
        'user_id',
        'box_quantity',
        'is_payed',
        'is_shipped',
        'is_pickedUp',
        'id_payment',
        'id_shipment',
        'id_pick_up',
        'tracking_number'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function orderLine()
    {
        return $this->hasMany('App\Models\OrderLine');
    }

}
