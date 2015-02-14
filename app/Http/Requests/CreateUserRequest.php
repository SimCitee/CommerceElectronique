<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// TODO:: Check if user is admin
		return true;
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
			'phone' => 'required|25',
			'email' => 'required|e-mail|unique:users',

			'street_number' => 'required|numeric|max:6',
			'street_name' => 'required|max:150',
			'apartment' => 'required|numeric|max:4',
			'city' => 'required|max:100',
			'province' => 'required|max:100',
			'country' => 'required|max:100',
			'zip_code' => 'required|max:20',
			'latitude' => 'numeric|max:100',
			'longitude' => 'numeric|max:100',

			'username' => 'required|max:150|unique:users',
			'password' => 'required|max:512',
		];
	}

}
