<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardGame extends Model {

    public $timestamps = false;

    protected $fillable = [
        'board_game_family_id',
        'name'
    ];

    public function boardGameFamily()
    {
        return $this->belongsTo('App\Models\BoardGameFamily');
    }

    public function boardGameVersion()
    {
        return $this->hasMany('App\Models\BoardGameVersion');
    }

}
