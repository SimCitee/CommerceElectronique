<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardGameVersionHonor extends Model {

    public $timestamps = false;

    protected $fillable = [
        'board_game_version_id',
        'honor_id',
        'award_year'
    ];

    public function honor()
    {
        return $this->belongsTo('App\Models\Honor');
    }

    public function boardGameVersion()
    {
        return $this->belongsTo('App\Models\BoardGameVersion');
    }

}
