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

class Index extends Controller {
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
		$this->load_view('housekeeping/dashboard');
		
		if(count(HkDao::getNote(Session::auth()->id)) != 1) {
			$note = R::dispense('site_housekeeping_notes');
			$note->user_id = Session::auth()->id;
			$note->note = "Put something here that you think you might forget, I'll be here forever!";
			R::store($note);
		}
		
		$n = HkDao::getNote(Session::auth()->id);
		
		$this->view->bind('hk->note', $n[0]->note);
		
		$this->view->publish();
	}
}