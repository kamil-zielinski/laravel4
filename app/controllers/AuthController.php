<?php

use Illuminate\Support\Facades\Redirect;

class AuthController extends BaseController {


	public function getLogin()
	{
		return View::make( 'auth.login' );
	}
	
	public function postLogin()
	{
		if (Auth::attempt( array( 'nickname' => Input::get( 'nickname' ), 'password' => input::get( 'password' )))) {
			return Redirect::intended( 'dashboard' );
		} else {
			return Redirect::to('/')->with( 'login_failed', true );
		}
				
	}

}