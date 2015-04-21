<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\BoardGameVersion;
use App\Models\ProductPrice;
use App\Models\InventoryStatus;
use App\Models\Language;
use App\Models\Tag;

use App\Http\Requests\CreateProductRequest;

use Illuminate\Http\Request;

class ProductsController extends Controller {


	/**
	 *
	 */
	public function __construct()
	{
		$this->middleware('admin', ['except' => 'getLogout']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();

		return view('admin.products.index', compact("products"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tags = null;
		$languages = null;
		$statuses = null;

		foreach (InventoryStatus::all() as $status)
		{
			$statuses[$status->id] = $status->name_en;
		}

		foreach (Language::all() as $language)
		{
			$languages[$language->id] = $language->code;
		}

		foreach (Tag::all() as $tag)
		{
			$tags = $tag;
		}

		return view('admin.products.create', compact('statuses'))->with('languages', $languages)->with('tags', $tags);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateProductRequest $request)
	{

		$image = $request->file('image_path');
		$name = $image->getClientOriginalName();

		$image->move(public_path() . '/img/products/', $name);

		$productRecord = $request->only('inventory_status_id', 'name', 'description', 'length', 'width', 'height', 'weight', 'sku', 'upc', 'quantity', 'date_available');
		$productRecord = array_add($productRecord, 'image_path', $name);
		$product = Product::create($productRecord);

		$priceProductRecord = $request->only('cost_price', 'prime_cost', 'retail_price');
		$priceProductRecord = array_add($priceProductRecord, 'product_id', $product->id);
		$priceProduct = ProductPrice::create($priceProductRecord);

		if ($request->input('isBoardGame') == '1')
		{
			$BoardGameRecord = $request->except($productRecord, $priceProductRecord, 'isBoardGame');
			$BoardGameRecord = array_add($BoardGameRecord, 'product_id', $product->id);
			$boardGame = BoardGameVersion::create($BoardGameRecord);
		}

		return redirect()->route('admin.products.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$boardGameVersion = null;
		$productPrice = null;

		$product = Product::find($id);

		$boardGameVersion = BoardGameVersion::where('product_id', '=', $id)->first();
		$productPrice = ProductPrice::where('product_id', '=', $id)->first();

		return view('admin.products.show', compact('product'))->with('boardgame', $boardGameVersion)->with('price', $productPrice);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$boardGameVersion = null;
		$productPrice = null;

		$product = Product::find($id);

		$boardGameVersion = BoardGameVersion::where('product_id', '=', $id)->first();
		$productPrice = ProductPrice::where('product_id', '=', $id)->first();

		return view('admin.products.edit', compact('product'))->with('boardgame', $boardGameVersion)->with('price', $productPrice);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// TODO
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::find($id);
		$result = $product->delete();
		return $result ? $id : -1;
	}
}