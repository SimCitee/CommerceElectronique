<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    public $timestamps = false;

    protected $fillable = [
        'street_number',
        'apartment',
        'street_name',
        'city',
        'country',
        'province',
        'zip_code',
        'latitude',
        'longitude'
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    public function event()
    {
        return $this->hasMany('App\Models\Event');
    }

}
