<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardGameVersion extends Model {

    protected $fillable = [
        'product_id',
        'board_game_id',
        'language_id',
        'extend_board_game_id',
        'minimum_players',
        'maximum_players',
        'minimum_age',
        'average_game_time',
        'website',
        'release_date'
    ];

    public function boardGameVersionChild()
    {
        return $this->hasMany('App\Models\BoardGameVersion', 'extend_board_game_id');
    }

    public function boardGameVersionParent()
    {
        return $this->belongsTo('App\Models\BoardGameVersion', 'extend_board_game_id');
    }

    public function boardGame()
    {
        return $this->belongsTo('App\Models\BoardGame');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }

    public function designer()
    {
        return $this->belongsToMany('App\Models\Designer');
    }

    public function publisher()
    {
        return $this->belongsToMany('App\Models\Publisher');
    }

    public function artist()
    {
        return $this->belongsToMany('App\Models\Artist');
    }

    public function boardGameVersionHonor()
    {
        return $this->hasMany('App\Models\BoardGameVersionHonor');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function event()
    {
        return $this->belongsToMany('App\Models\Event');
    }

    public function boardGameVersionComment()
    {
        return $this->hasMany('App\Models\BoardGameVersionComment');
    }

}
