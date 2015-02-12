<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $fillable = [
        'group_id',
        'address_id',
        'first_name',
        'last_name',
        'birth_date',
        'phone',
        'email',
        'username',
        'password'
    ];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    public function userSearch()
    {
        return $this->hasMany('App\Models\UserSearch');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function boardGameVersion()
    {
        return $this->belongsToMany('App\Models\BoardGameVersion');
    }

    public function createdEvent()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function eventComment()
    {
        return $this->hasMany('App\Models\EventComment');
    }

    public function participatedEvent()
    {
        return $this->belongsToMany('App\Models\Event');
    }

    public function boardGameVersionComment()
    {
        return $this->hasMany('App\Models\BoardGameVersionComment');
    }

}