<?php namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\UserSearch;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserSearchController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = $request['query'];

		if (!empty($query)) {
			$user = Auth::user();

			if ($user) {
				$search = $user->userSearch()->where('search_expression', '=', $query)->get()->first();

				if ($search) {
					$search->search_count += 1;
				}
				else {
					$search = new UserSearch;
					$search->user_id = $user->id;
					$search->search_expression = $query;
					$search->search_count = 1;

				}

				$search->save();
			}
		}

	}
}
