<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model {

    protected $fillable = [
        'name_fr',
        'name_en',
        'value',
        'is_on_gross_price'
    ];

    public function orderLine()
    {
        return $this->belongsToMany('App\Models\OrderLine');
    }

}
