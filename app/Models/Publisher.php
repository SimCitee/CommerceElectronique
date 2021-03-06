<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model {

    public $timestamps = false;

    protected $fillable = [
        'name',
        'website'
    ];

    public function boardGameVersion()
    {
        return $this->belongsToMany('App\Models\BoardGameVersion');
    }

}
