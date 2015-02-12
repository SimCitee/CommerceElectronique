<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

    public $timestamps = false;

    protected $fillable = [
        'name',
        'is_admin'
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    public function isAdmin()
    {
        return $this->is_admin == 1;
    }
}
