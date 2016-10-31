<?php

class Index extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function base() {
		
		if(Session::isAuthed()) { Router::sendTo('me'); return; }
		
		$this->load_view("index");
		$this->view->publish();
	
	}
	
	public function register() {
		
		if(Session::isAuthed()) { Router::sendTo('me'); return; }
		
		$this->load_view("register");
		$this->view->publish();
	
	}
}