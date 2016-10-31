<?php

class Err extends Controller {
	public function __construct() {
		parent::__construct();

		$this->load_view('error');
	}

	public function notFound() {
		
		http_response_code(404);
	
		$this->view->bind("error->title", "File not found");
		$this->view->bind("error->message", "I'm sorry. The file you requested could not be found.");

		$this->view->publish();
	}

	public function unexpected() {
		
		http_response_code(500);
	
		$this->view->bind("error->title", "Unexpected error");
		$this->view->bind("error->message", "It seems we've encountered an unexpected error. Please contact the site administrator and/or try again later.");

		$this->view->publish();
	}
	
	public function forbidden() {
		
		http_response_code(403);
	
		$this->view->bind("error->title", "Forbidden");
		$this->view->bind("error->message", "You're not allowed to access this directory/file.");

		$this->view->publish();
	}
}