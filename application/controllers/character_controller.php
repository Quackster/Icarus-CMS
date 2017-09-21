<?php

class Character extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function me() {
		
		if (!Session::isAuthed()) { Router::sendTo('index'); return; }

        if (Session::isAuthed()) {
            if (Session::auth()->username == "") { 
                Router::sendTo('client'); 
                return;
            }
        }
        
		$this->load_view("me");
		$this->view->publish();
	
	}
	
	public function hotel() {
		
		if(!Session::isAuthed()) { Router::sendTo('index'); return; }
		
		UserDao::updateSSO();
		
        if (Session::auth()->username != "") {
            $this->load_view("client");
        } else {
            $this->load_view("client_new");
        }
        
		$this->view->publish();
	
	}
    
    public function disconnected() {
        print_r($_POST);
    }
}