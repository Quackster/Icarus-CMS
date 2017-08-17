<?php

class Account extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function base() {

	
	}
	
	public function login() {

		if(Session::isAuthed()) { Router::sendTo('me'); }
		
		$form = new Form("post", array('username', 'password'));
		
		if($form->check()) {
			$form->produce();
			
			$username = $form->field->username;
			$password = $form->field->password;
			
			if(UserDao::exists('username', $username)) {
				
				$user = UserDao::getByKey('username', $username);
			
				if(password_verify($password, $user[0]['password'])) {
					Session::set($user[0]['id']);
					Router::sendTo("me");
				} else {
					
					Session::setOwn('alert-type', 'error');
					Session::setOwn('alert-message', 'You have entered an invalid password');
					
					Router::sendTo("index");
				}
			} else {
				Session::setOwn('alert-type', 'error');
				Session::setOwn('alert-message', 'That account does not exist');
				
				Router::sendTo("index");
			}
		} else {
			Session::setOwn('alert-type', 'error');
			Session::setOwn('alert-message', 'You need to enter both your username and password');
			
			Router::sendTo("index");
		}
		
	}
	
	public function register() {
		
		if(Session::isAuthed()) { Router::sendTo('me'); }

		$form = new Form("post", array('regusername', 'regemail', 'regpassword', 'regconfirmpassword'));

		if($form->check()) {
			$form->produce();

			$username = $form->field->regusername;
			$password = password_hash($form->field->regpassword, PASSWORD_DEFAULT);
			$email = $form->field->regemail;

			if(!valid_email($email)) {
				
				Session::setOwn('alert-type', 'error');
				Session::setOwn('alert-message', 'You have entered an invalid email address.');
				Router::sendTo('register');
			}

			if(!preg_match('/^[a-zA-Z0-9_]+$/',$username)) {
				Session::setOwn('alert-type', 'error');
				Session::setOwn('alert-message', 'You have entered an invalid username, please only use letters and numbers.');
				Router::sendTo('register');
			}

			if(strlen($username) < 3) {
				Session::setOwn('alert-type', 'error');
				Session::setOwn('alert-message', 'Your name is too small, please chose a username which has more than 2 characters');
				Router::sendTo('register');
			}

			if(strlen($username) > 16) {
				Session::setOwn('alert-type', 'error');
				Session::setOwn('alert-message', 'Your name is too long, please chose a username which is 16 characters or less');
				Router::sendTo('register');
			}
			
			if(strlen($form->field->regpassword) < 6) {
				Session::setOwn('alert-type', 'error');
				Session::setOwn('alert-message', 'Your password needs to be 6 or more characters');
				Router::sendTo('register');
			}

			if($form->field->regpassword != $form->field->regconfirmpassword) {
				Session::setOwn('alert-type', 'error');
				Session::setOwn('alert-message', 'The two passwords do not match!');
				Router::sendTo('register');
			}
			
			if(UserDao::exists('username', $username)) {
				Session::setOwn('alert-type', 'error');
				Session::setOwn('alert-message', 'The username you chose is already in use');
				Router::sendTo('register');
			}

			if(UserDao::exists('email', $email)) {
				Session::setOwn('alert-type', 'error');
				Session::setOwn('alert-message', 'The email you chose is already in use');
				Router::sendTo('register');
			}

			$id = UserDao::create($form);

			Session::set($id);
			
			Session::setOwn('alert-type', 'success');
			Session::setOwn('alert-message', 'You have successfully created your account, welcome to the hotel!');
			
			Router::sendTo('me');

		} else {
			Session::setOwn('alert-type', 'error');
			Session::setOwn('alert-message', 'Please add information to all the fields');
			Router::sendTo('register');
		}
	}
	
	public function logout() {

		if(!Session::isAuthed()) { Router::sendTo('index'); }
		
		Session::deAuth();
		
		Session::setOwn('alert-type', 'warning');
		Session::setOwn('alert-message', 'Successfully logged out!');
		
		Router::sendTo("index");
	}
}