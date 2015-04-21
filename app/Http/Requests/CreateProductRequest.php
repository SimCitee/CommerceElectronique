<?php namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class CreateProductRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'inventory_status_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'required|max:200',
            'length' => 'numeric',
            'width' => 'numeric',
            'height' => 'numeric',
            'weight' => 'numeric',
            'image_path' => 'required|image',
            'sku' => 'numeric',
            'upc' => 'numeric',
            'quantity' => 'numeric|required',
            'date_available' => 'date',
            'upc' => 'numeric',

            'minimum_players' => 'numeric',
            'maximum_players' => 'numeric',
            'minimum_age' => 'numeric',
            'average_game_time' => 'numeric',
            'website' => 'active_url',
            'release_date' => 'date',

            'cost_price' => 'numeric|required',
            'prime_cost' => 'numeric|required',
            'retail_price' => 'numeric|required',
        ];
    }

}
