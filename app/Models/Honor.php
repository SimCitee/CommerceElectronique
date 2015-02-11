<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Honor extends Model {

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function boardGameVersionHonor()
    {
        return $this->hasMany('App\Models\BoardGameVersionHonor');
    }

}
