<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventComment extends Model {

    protected $fillable = [
        'event_id',
        'user_id',
        'parent_id',
        'comment'
    ];

    public function eventCommentChild()
    {
        return $this->hasMany('App\Models\EventComment', 'parent_id');
    }

    public function eventCommentParent()
    {
        return $this->belongsTo('App\Models\EventComment', 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

}
