<?php namespace App\Http\Controllers;

class AdminController extends Controller {
	
	public function __construct()
	{
		$this->middleware('guest');
	}
	
    public function login()
    {
        return "admin!";
        //return View::make('pages.home');
    }
}