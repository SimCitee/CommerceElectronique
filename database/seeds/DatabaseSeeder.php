<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		/*\App\Models\InventoryStatus::create(array(
			'name_fr' => 'status fr',
			'name_en' => 'status en'
		));

		$product = \App\Models\Product::create(array(
			'inventory_status_id' => 1,
			'name' => 'name product',
			'description' => 'description product',
			'length' => 2,
			'width' => 2,
			'height' => 2,
			'weight' => 2,
			'image_path' => 'image path',
			'sku' => 'sku',
			'upc' => 'upc',
			'quantity' => 10,
			//'date_available' => '',
			//'is_archived' => '',
			//'is_inactive' => ''
		));

		\App\Models\Product::create(array(
			'inventory_status_id' => 1,
			'name' => 'name product',
			'description' => 'description product',
			'length' => 2,
			'width' => 2,
			'height' => 2,
			'weight' => 2,
			'image_path' => 'image path',
			'sku' => 'sku',
			'upc' => 'upc',
			'quantity' => 10,
			//'date_available' => '',
			//'is_archived' => '',
			//'is_inactive' => ''
		));

		\App\Models\ProductDetail::create(array(
			'product_id' => 1,
			'detail_section_title' => 'section title',
			'video_link_url' => 'video url',
			'additional_information' => 'additional information'
		));

		\App\Models\ProductImage::create(array(
			'product_id' => 1,
			'image_path' => 'image path'
		));

		$tag = \App\Models\Tag::create(array(
			'name' => 'tag name'
		));

		$tag->product()->attach(1);
		//$product->tag()->attach(1);

		$productCategory = \App\Models\ProductCategory::create(array(
			//'parent_id' => ,
			'name_fr' => 'name fr',
			'name_en' => 'name en'
		));

		\App\Models\ProductCategory::create(array(
			'parent_id' => 1,
			'name_fr' => 'name fr',
			'name_en' => 'name en'
		));

		$productCategory->product()->attach(1);
		//$product->productCategory()->attach(1);

		\App\Models\ProductSale::create(array(
			'product_id' => 1,
			'date_start' => date("Y-m-d H:i:s"),
			'date_end' => date("Y-m-d H:i:s"),
			'price' => 2
		));

		\App\Models\ProductDiscount::create(array(
			'product_id' => 1,
			'date_start' => date("Y-m-d H:i:s"),
			'date_end' => date("Y-m-d H:i:s"),
			'minimum_quantity' => 10,
			//'maximum_quantity' => ,
			'price' => 2
		));

		\App\Models\ProductPrice::create(array(
			'product_id' => 1,
			'cost_price' => 5,
			'prime_cost' => 6,
			'retail_price' => 7
		));

		\App\Models\Group::create(array(
			'name' => 'group name'
		));

		\App\Models\Address::create(array(
			'street_number' => 282,
			//'apartment' => '',
			'street_name' => 'street name',
			'city' => 'city name',
			'country' => 'country name',
			'province' => 'province name',
			'zip_code' => 'A1B2C3',
			'latitude' => 10.00,
			'longitude' => 10.00
		));

		$user = \App\Models\User::create(array(
			'group_id' => 1,
			'address_id' => 1,
			'first_name' => 'first name',
			'last_name' => 'last name',
			'birth_date' => date("Y-m-d H:i:s"),
			'phone' => '123-456-789',
			'email' => 'email@exemple.com',
			'username' => 'username',
			'password' => 'password'
		));

		\App\Models\UserSearch::create(array(
			'user_id' => 1,
			'search_expression' => 'search expression'
		));

		\App\Models\Order::create(array(
			'user_id' => 1,
			'box_quantity' => 2,
			//'is_payed' => ,
			//'is_shipped' => ,
			//'is_pickedUp' => ,
			//'id_payment' => '',
			//'id_shipment' => '',
			//'id_pick_up' => '',
			//'tracking_number' => ''
		));

		$orderLine = \App\Models\OrderLine::create(array(
			'product_id' => 1,
			'order_id' => 1,
			'quantity' => 2
		));

		$tax = \App\Models\Tax::create(array(
			'name_fr' => 'name fr',
			'name_en' => 'name en',
			'value' => 8,
			//'is_on_gross_price' =>
		));

		$orderLine->tax()->attach(1);
		//$tax->orderLine()->attach(1);

		\App\Models\BoardGameFamily::create(array(
			'name' => 'board game family name'
		));

		\App\Models\BoardGame::create(array(
			'board_game_family_id' => 1,
			'name' => 'board game name'
		));

		\App\Models\Language::create(array(
			'code' => 'fr',
		));

		$designer = \App\Models\Designer::create(array(
			'first_name' => 'first name',
			'last_name' => 'last name'
		));

		$publisher = \App\Models\Publisher::create(array(
			'name' => 'publisher name',
			'website' => 'website link'
		));

		$artist = \App\Models\Artist::create(array(
			'first_name' => 'first name',
			'last_name' => 'last name'
		));

		\App\Models\Honor::create(array(
			'name' => 'honor name'
		));

		$boardGameVersion = \App\Models\BoardGameVersion::create(array(
			'product_id' => 1,
			'board_game_id' => 1,
			'language_id' => 1,
			//'extend_board_game_id' => '',
			//'minimum_players' => '',
			//'maximum_players' => '',
			//'minimum_age' => '',
			//'average_game_time' => '',
			//'website' => '',
			//'release_date' => ''
		));

		\App\Models\BoardGameVersion::create(array(
			'product_id' => 2,
			'board_game_id' => 1,
			'language_id' => 1,
			'extend_board_game_id' => 1,
			//'minimum_players' => '',
			//'maximum_players' => '',
			//'minimum_age' => '',
			//'average_game_time' => '',
			//'website' => '',
			//'release_date' => ''
		));

		$boardGameVersion->designer()->attach(1);
		//$designer->boardGameVersion()->attach(1);

		$publisher->boardGameVersion()->attach(1);
		//$boardGameVersion->publisher()->attach(1);

		$boardGameVersion->artist()->attach(1);
		//$artist->boardGameVersion()->attach(1);

		\App\Models\BoardGameVersionHonor::create(array(
			'board_game_version_id' => 1,
			'honor_id' => 1,
			'award_year' => 2013
		));

		$boardGameVersion->user()->attach(1);
		//$user->boardGameVersion()->attach(1);

		$event = \App\Models\Event::create(array(
			'user_id' => 1,
			'address_id' => 1,
			'name' => 'event name',
			'description' => 'event description',
			'event_date' => date("Y-m-d H:i:s"),
			'maximum_players' => 4,
			'minimum_player_age' => 10
		));

		$boardGameVersion->event()->attach(1);
		//$event->boardGameVersion()->attach(1);

		\App\Models\EventComment::create(array(
			'event_id' => 1,
			'user_id' => 1,
			//'parent_id' => ,
			'comment' => 'comment text'
		));

		\App\Models\EventComment::create(array(
			'event_id' => 1,
			'user_id' => 1,
			'parent_id' => 1,
			'comment' => 'comment text'
		));

		$user->participatedEvent()->attach(1);
		//$event->participatingUser()->attach(1);

		\App\Models\BoardGameVersionComment::create(array(
			'board_game_version_id' => 1,
			'user_id' => 1,
			'rating' => 5,
			'text' => 'comment text'
		));*/

	}

}
