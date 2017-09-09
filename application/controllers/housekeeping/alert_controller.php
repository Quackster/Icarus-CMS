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

class Alert extends Controller {

	public function __construct() {
		parent::__construct();
		
		if(!Session::isAuthed()) {
			Router::sendTo();
		}
		
		if(!Session::hasHousekeeping()) {
			Router::sendTo(); 
		}
	}

	public function base() {
		$this->load_view('housekeeping/alert');
		$this->view->publish();
	}
    
    public function send() { 
		$this->load_view('housekeeping/alert_send');
		$this->view->publish();
	}
}