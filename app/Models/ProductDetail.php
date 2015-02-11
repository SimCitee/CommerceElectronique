<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model {

    protected $fillable = [
        'product_id',
        'detail_section_title',
        'video_link_url',
        'additional_information'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
