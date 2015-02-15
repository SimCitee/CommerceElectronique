<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Address;

use Request;

class UsersController extends Controller {

	//TODO:: use middleware to validate if user is authentified

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateUserRequest $request
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		$addressInput = $request->only('street_number', 'street_name', 'city', 'province', 'country', 'zip_code', 'latitude', 'longitude');
		$address = Address::create($addressInput);

		$userInput = $request->except($addressInput);
		$userInput['address_id'] = $address->id;
		$userInput['password'] = bcrypt($userInput['password']);
		User::create($userInput);

		return redirect()->route('admin.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return view('admin.users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return view('admin.users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateUserRequest $request
	 * @param  int $id
	 * @return Response
	 */
	public function update(UpdateUserRequest $request, $id)
	{
		$addressInput = $request->only('street_number', 'street_name', 'city', 'province', 'country', 'zip_code', 'latitude', 'longitude');
		$userInput = $request->except($addressInput);

		$user = User::find($id);
		$user->address->update($addressInput);
		$user->update($userInput);

		return redirect()->route('admin.users.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$result = $user->delete();
		return $result ? $id : -1;
	}
}
