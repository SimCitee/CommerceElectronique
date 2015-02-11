<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryStatus extends Model {

    public $timestamps = false;

	protected $fillable = [
        'name_fr',
        'name_en'
    ];

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

}
