<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardGameFamily extends Model {

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function boardGame()
    {
        return $this->hasMany('App\Models\BoardGame');
    }

}
