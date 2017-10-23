<?php

class Controller {
	protected $model;
	protected $view;

	public function __construct() {
		R::setup('mysql:host=' . Site::getConfig()->db->host . ';dbname=' . Site::getConfig()->db->database, Site::getConfig()->db->username, Site::getConfig()->db->password);
		if(!Site::getConfig()->db->development_mode) {
			R::freeze(true);
		}

		if(Session::isAuthed()) {
			if(Session::auth()->ip != $_SERVER['REMOTE_ADDR']) {
				$user = R::load('users', Session::auth()->id);
			}
		}
	}

	public function getModel($model) {
		$model_name = $model . '_model';

		if(file_exists(APP_PATH . '/models/' . $model_name . '.php')) {
			require APP_PATH . '/models/' . $model_name . '.php';
		} else {
			die("Oops! Failed to locate the model: " . $model_name . ", make sure it exists in the models directory.");
		}

		$this->model = new $model_name();
	}

	public function getFooter() {
		$tpl = new View('footer');
        $this->view->bind('footer', $tpl->get());
	}

	public function load_view($view) {
		$this->view = new View($view);
	}
}