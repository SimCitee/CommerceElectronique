<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardGameVersionComment extends Model {

    protected $fillable = [
        'board_game_version_id',
        'user_id',
        'rating',
        'text'
    ];

    public function boardGameVersion()
    {
        return $this->belongsTo('App\Models\BoardGameVersion');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
