<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name'
    ];

    public function boardGameVersion()
    {
        return $this->belongsToMany('App\Models\BoardGameVersion');
    }

}
