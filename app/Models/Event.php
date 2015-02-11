<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $fillable = [
        'user_id',
        'address_id',
        'name',
        'description',
        'event_date',
        'maximum_players',
        'minimum_player_age'
    ];

    public function creatorUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    public function boardGameVersion()
    {
        return $this->belongsToMany('App\Models\BoardGameVersion');
    }

    public function eventComment()
    {
        return $this->hasMany('App\Models\EventComment');
    }

    public function participatingUser()
    {
        return $this->belongsToMany('App\Models\User');
    }

}
