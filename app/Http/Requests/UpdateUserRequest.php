<?php namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class UpdateUserRequest extends Request {

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
			'first_name' => 'required|max:100',
			'last_name' => 'required|max:100',
			'birth_date' => 'required|date',
			'phone' => 'required|max:25',
			'email' => 'required|e-mail|unique:users,id,'.$this->get('id'),

			'street_number' => 'required|numeric|between:1,999999',
			'street_name' => 'required|max:150',
			'apartment' => 'numeric|between:1,9999',
			'city' => 'required|max:100',
			'province' => 'required|max:100',
			'country' => 'required|max:100',
			'zip_code' => 'required|max:20',
			'latitude' => 'numeric|max:100',
			'longitude' => 'numeric|max:100',

			'username' => 'required|max:150|unique:users,username,'.$this->get('id'),
			'password' => 'required|max:512',
			'repeat_password' => 'required|max:512|same:password',
		];
	}
}
