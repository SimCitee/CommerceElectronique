<?php namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPrice;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('frontend.cart.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function addItem($productId)
	{
		$response = -1;

		if ($product = Product::find($productId)) {
			if ($rowId = Cart::search(array('id' => $product->id))) {
				$row = Cart::get($rowId[0]);
				$qty = $row->qty + 1;
				Cart::update($rowId[0], $qty);
			}
			else {
				$productPrice = $product->productPrice()->orderBy('created_at', 'desc')->take(1)->first();
				Cart::add($product->id, $product->name, 1, $productPrice->retail_price);
			}

			$response = Cart::count();
		}

		echo $response;
	}

	/**
	 * Remove item from cart.
	 *
	 * @param  int  $rowId
	 * @return Response
	 */
	public function removeItem($id)
	{
		Cart::remove($id);
		return view('frontend.cart.index');
		/*$row = Cart::get($id);
		if (!Cart::remove($id)) {
			return $row->id;
		}
		else {
			return -1;
		}*/
	}

	/**
	 * Update item from cart.
	 *
	 * @param  int  $rowId
	 * @return Response
	 */
	public function updateItem(Request $request, $id)
	{
		$row = Cart::get($id);
		if ($row) {
			Cart::update($id, $request->get('qty'));
		}

		return view('frontend.cart.index');
	}

	/**
	 * Remove all items from cart.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Cart::destroy();

		return view('frontend.cart.index');
	}
}
