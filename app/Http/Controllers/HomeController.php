<?php namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSale;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::orderBy('created_at', 'desc')->take(3)->get();
		$popularProducts = Product::where('quantity', '>=', 10)->orderBy('created_at')->take(1)->get();
		$featuredProducts = Product::has('productSale')->orderBy('updated_at', 'desc')->take(5)->get();
		return view('frontend.home')
			->with('products', $products)
			->with('popularProducts', $popularProducts)
			->with('featuredProducts', $featuredProducts);
	}
}
