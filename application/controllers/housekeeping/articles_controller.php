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

class Articles extends Controller {

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
		
		$this->load_view('housekeeping/articles');
		$this->view->publish();
	}
    
    public function edit() {
    
        if(isset($_GET['article'])) {
			if(empty($_GET['article'])) { Router::sendTo('housekeeping/articles'); }
			
			$id = intval($_GET['article']);
    
            if(!HkDao::article_exists($id)) {
                Router::sendTo('housekeeping/articles');
            }
        
            $this->load_view('housekeeping/articles_edit');
            $this->view->data->article = R::load('site_articles', $id);
            $this->view->publish();
        }
	}
    
    public function add() {
   
        if (!isset($_GET["add"]))
        {
            $this->load_view('housekeeping/articles_add');
            $this->view->publish();
        }
        else
        {
            $fields = array("name", "topstory", /*"large_image", */"description", "story");
            
            foreach ($fields as $value)
            {
                if (!isset($_POST[$value]))
                {
                    $this->load_view('housekeeping/response');
                    $this->view->data->status = "Error";
                    $this->view->data->alert_type = "important";
                    $this->view->data->error = "Unexpected error occured!";
                    $this->view->publish();
                    return;
                }
                else if ($_POST[$value] == "")
                {
                    $this->load_view('housekeeping/response');
                    $this->view->data->status = "Error";
                    $this->view->data->alert_type = "important";
                    $this->view->data->error = "You left a field blank!";
                    $this->view->publish();
                    return;
                }
            }
            
            $article = R::dispense('site_articles');
            $article->article_name = $_POST['name'];
            $article->article_topstory = "/c_images/Top_Story_Images/" . $_POST['topstory'];
            //$article->article_bigimage = $_POST['large_image'];
            $article->article_story = $_POST['story'];
            $article->article_description = $_POST['description'];
            $article->article_date = get_date_delim(time());
            $article->article_author = Session::auth()->username;
            $id = R::store($article);
            
            $this->load_view('housekeeping/response');
            $this->view->data->status = "Success";
            $this->view->data->alert_type = "success";
            $this->view->data->error = "News article has been added! ";
            $this->view->publish();
        }
	}
    
    public function save() {
  
        $fields = array("id", "name", "topstory", /*"large_image", */"description", "story");
        
        foreach ($fields as $value)
        {
            if (!isset($_POST[$value]))
            {
                $this->load_view('housekeeping/response');
                $this->view->data->status = "Error";
                $this->view->data->alert_type = "important";
                $this->view->data->error = "You tried to save an article which didn't exist!";
                $this->view->publish();
                return;
            }
            else if ($_POST[$value] == "")
            {
                $this->load_view('housekeeping/response');
                $this->view->data->status = "Error";
                $this->view->data->alert_type = "important";
                $this->view->data->error = "You left a field blank!";
                $this->view->publish();
                return;
            }
        }
        
        R::exec("UPDATE site_articles SET article_name = ?, article_topstory = '/c_images/Top_Story_Images/" . $_POST["topstory"] . "', article_description = ?, article_story = ? WHERE id = ". $_POST["id"], array($_POST["name"], $_POST["description"], $_POST["story"]));
		
		/*        
        R::exec("UPDATE site_articles SET article_name = ?, article_topstory = '/c_images/Top_Story_Images/" . $_POST["topstory"] . "', article_bigimage = ?, article_description = ?, article_story = ? WHERE id = ". $_POST["id"], array($_POST["name"], $_POST["large_image"], $_POST["description"], $_POST["story"]));*/
	
        $this->load_view('housekeeping/response');
        $this->view->data->status = "Success";
        $this->view->data->alert_type = "success";
        $this->view->data->error = "News article is saved!";
        $this->view->publish();
    }
    
    public function delete() {
    
		if(!Session::isAuthed()) { Router::sendTo('index'); return; }
		if(!Session::hasHousekeeping()) { Router::sendTo('me'); }
	
        if (!isset($_GET["article"]))
        {
            $this->load_view('housekeeping/response');
            $this->view->data->status = "Error";
            $this->view->data->alert_type = "important";
            $this->view->data->error = "Unexpected error occured!";
            $this->view->publish();
            return;
        }
        else if ($_GET["article"] == "")
        {
            $this->load_view('housekeeping/response');
            $this->view->data->status = "Error";
            $this->view->data->alert_type = "important";
            $this->view->data->error = "Unknown article";
            $this->view->publish();
            return;
        }
    
        R::exec("DELETE FROM site_articles WHERE id = '". $_GET["article"] . "'");
	
        $this->load_view('housekeeping/response');
        $this->view->data->status = "Success";
        $this->view->data->alert_type = "success";
        $this->view->data->error = "Article has been deleted!";
        $this->view->publish();
    }
}