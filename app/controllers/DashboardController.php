<?php

class DashboardController extends \BaseController {

	protected $layout = 'layout.layout';

	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth', array('only'=>array('getIndex')));
	}

	public function getIndex(){
		$id = Auth::id();
		$profile = $this->profileUser($id);
		$this->layout->sidebarLeft = View::make('dashboard.sidebarLeft')->with('profile', $profile);
		$this->layout->content = View::make('dashboard.content');
		$this->layout->sidebarRight = View::make('dashboard.sidebarRight');
	}

	public static function profileUser($id){
		$user = User::leftJoin('users_profile', function($join) {
			$join->on('users.id', '=', 'users_profile.id');
		})
		->where('users.id', $id)
		->first([
			'users.username AS userName',
			'users.email',
			'users.type AS typeUser',
			'users.avatar',
			'users_profile.fullname AS fullName',
			'users_profile.website',
			'users_profile.about'
		]);
		return $user;
	}

	public function getLogin(){
		return View::make('login');
	}

	public function postSignin(){
		if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
		    return Redirect::to('dashboard/')->with('message', 'You are now logged in!');
		} else {
		    return Redirect::to('login')
		        ->with('message', 'Your username/password combination was incorrect')
		        ->withInput();
		}
	}

	public function getDashboard(){
		$this->layout->sidebarLeft = View::make('dashboard.sidebarLeft');
		$this->layout->content = View::make('dashboard.content');
	}

	public function getLogout(){
		Auth::logout();
    	return Redirect::to('login')->with('message', 'Sesión finalizada!');
	}
}