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

class Save extends Controller {
	public function __construct() {
		parent::__construct();
		
		if(!Session::isAuthed()) {
			Router::sendTo();
		}
		
		if(!Session::hasHousekeeping()) {
			Router::sendTo(); 
		}
	}
	
	public function note() {
		$form = new Form("post", array('note'));

		if($form->check()) {
			$form->produce();
			
			$note = $form->field->note;
			
			R::exec("UPDATE site_housekeeping_notes SET note = ? WHERE user_id = ?", array($note, Session::auth()->id));
			Router::sendTo("housekeeping");
		
		} else {
			Router::sendTo("housekeeping");
		}
	}
	
}