<?php

class UserController extends \BaseController {

	public function index()
	{
		if (Auth::guest()) {
			return Redirect::to('login');
		}
		else{
			return Redirect::to('dashboard');
		}
	}
	public function login()
	{
		if (Auth::guest()) {
			return View::make('login');	
		}
		else{
			return Redirect::to('dashboard');
		}
	}
	public function checkLogin()
	{
		$rule['username'] = 'required|min:5';
		$rule['password'] = 'required|alphaNum|min:5';

		$validator = Validator::make(Input::all(), $rule);
		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
		}
		else{
			$userdata['username'] = Input::get('username');
			$userdata['password'] = Input::get('password');

			if (Auth::attempt($userdata)) {
				return Redirect::to('dashboard');
			}
			else{
				return Redirect::to('login');
			}
		}
	}
	public function logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}
}
