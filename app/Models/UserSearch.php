<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSearch extends Model {

    protected $fillable = [
        'user_id',
        'search_expression'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
