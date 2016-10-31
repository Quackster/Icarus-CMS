<?php
/*
	 /'\_/`\                                    
	/\      \     __      ___      __     ___   
	\ \ \__\ \  /'__`\  /' _ `\  /'_ `\  / __`\ 
	 \ \ \_/\ \/\ \L\.\_/\ \/\ \/\ \L\ \/\ \L\ \
	  \ \_\\ \_\ \__/.\_\ \_\ \_\ \____ \ \____/
	   \/_/ \/_/\/__/\/_/\/_/\/_/\/___L\ \/___/ 
	                               /\____/      
	                               \_/__/       
	@author Leon Hartley
*/

class Users extends Controller {
	public function __construct() {
		parent::__construct();
		
		if(!Session::isAuthed()) {
			Router::sendTo();
			return;
		}
		
		if(!Session::hasHousekeeping()) {
			Router::sendTo();
			return;
		}
	}

	public function base() {
		$this->load_view('housekeeping/users');
		
		$this->view->publish();
	}
	
	public function edit() {
		if(isset($_GET['user'])) {
			if(empty($_GET['user'])) { Router::sendTo('housekeeping/users'); }
			
			$id = intval($_GET['user']);
			
			if(!UserDao::exists('id', $id)) {
				Router::sendTo('housekeeping/users');
			}
		
			$this->load_view('housekeeping/edit_user');
			$this->view->data->user = R::load('users', $id);
			$this->view->publish();
		}
	}
}