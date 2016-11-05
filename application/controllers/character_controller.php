<?php

class Character extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function me() {
		
		if(!Session::isAuthed()) { Router::sendTo('index'); return; }

		$this->load_view("me");
		$this->view->publish();
	
	}
	
	public function hotel() {
		
		if(!Session::isAuthed()) { Router::sendTo('index'); return; }
		
		UserDao::updateSSO();
		
		$this->load_view("client");
		$this->view->publish();
	
	}
}