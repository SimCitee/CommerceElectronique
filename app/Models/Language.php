<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {

    public $timestamps = false;

    protected $fillable = [
        'code'
    ];

    public function boardGameVersion()
    {
        return $this->hasMany('App\Models\BoardGameVersion');
    }

}
