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

class Targetedoffers extends Controller {

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
		
		$this->load_view('housekeeping/targetedoffers');
		$this->view->publish();
	}
    
    public function edit() {
    
        if(isset($_GET['id'])) {
			if(empty($_GET['id'])) { Router::sendTo('housekeeping/targetedoffers'); }
			
			$id = intval($_GET['id']);
    
            if(!HkDao::targetedoffer_exists($id)) {
                Router::sendTo('housekeeping/targetedoffers');
            }
        
            $this->load_view('housekeeping/targetedoffer_edit');
            
            $this->view->data->targetedoffer = R::load('targeted_offers', $id);
            $this->view->publish();
        }
	}
    
    public function add() {
   
        if (!isset($_GET["add"]))
        {
            $this->load_view('housekeeping/targetedoffer_add');
            $this->view->publish();
        }
        else
        {
            $fields = array("id", "title", "largeimage", "description", "credits", "activitypoints", "activitypointstype", "expirydays", "enabled", "items");
        
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
            
            $article = R::dispense('targeted_offers');
            $article->title = $_POST['title'];
            $article->description = $_POST['description'];
            $article->credits = $_POST['credits'];
            $article->large_image = "targetedoffers/" . $_POST["largeimage"];
            $article->activity_points = $_POST['activitypoints'];
            $article->activity_points_type = $_POST['activitypointstype'];
            $article->expire_time = (time() + (86400 * intval($_POST['expirydays'])));
            $article->enabled = $_POST['enabled'];
            $article->items = $_POST['items'];
            $id = R::store($article);
            
            $this->load_view('housekeeping/response');
            $this->view->data->status = "Success";
            $this->view->data->alert_type = "success";
            $this->view->data->error = "Targeted offer has been added! ";
            $this->view->publish();
        }
	}
    
    public function save() {
  
        /*Array ( [title] => Random MEGA Deal! [largeimage] => download.png [description] => [credits] => 50 [activitypoints] => -1 [activitypointstype] => 0 [expirydays] => 5 [enabled] => 1 [id] => 1 )*/
  
        $fields = array("id", "title", "largeimage", "description", "credits", "activitypoints", "activitypointstype", "expirydays", "enabled", "items");
        
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
        
        $daysUntilExpiry = (time() + (86400 * intval($_POST['expirydays'])));
        
        //R::exec("UPDATE site_articles SET article_name = ?, article_topstory = '/c_images/Top_Story_Images/" . $_POST["topstory"] . "', article_description = ?, article_story = ? WHERE id = ". $_POST["id"], array($_POST["name"], $_POST["description"], $_POST["story"]));
        
        R::exec("UPDATE targeted_offers SET title = ?, description = ?, credits = ?, activity_points = ?, activity_points_type = ?, large_image = ?, expire_time = ?, enabled = ?, items = ? WHERE id = ?", array($_POST["title"], $_POST["description"], $_POST["credits"], $_POST["activitypoints"], $_POST["activitypointstype"], "targetedoffers/" . $_POST["largeimage"], $daysUntilExpiry, $_POST["enabled"], $_POST["items"], $_POST['id']));
        
        MUS("reloadoffers", "");
        
        $this->load_view('housekeeping/response');
        $this->view->data->status = "Success";
        $this->view->data->alert_type = "success";
        $this->view->data->error = "Targeted offer is saved!";
        $this->view->publish();
    }
    
    public function clear_blacklist() {
  
        $fields = array("id");
  
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
        
        $id = intval($_GET['id']);

        if(!HkDao::targetedoffer_exists($id)) {
            Router::sendTo('housekeeping/targetedoffers');
        }
        
        R::exec("DELETE FROM targeted_offers_blacklist WHERE offer_id = ?", array($_GET['id']));
        
        $this->load_view('housekeeping/response');
        $this->view->data->status = "Success";
        $this->view->data->alert_type = "success";
        $this->view->data->error = "Targeted offer blacklist with offer ID " . $id . " has been cleared!";
        $this->view->publish();
    }
    
    public function delete() {
    
		if(!Session::isAuthed()) { Router::sendTo('index'); return; }
		if(!Session::hasHousekeeping()) { Router::sendTo('me'); }
	
        if (!isset($_GET["id"]))
        {
            $this->load_view('housekeeping/response');
            $this->view->data->status = "Error";
            $this->view->data->alert_type = "important";
            $this->view->data->error = "Unexpected error occured!";
            $this->view->publish();
            return;
        }
        else if ($_GET["id"] == "")
        {
            $this->load_view('housekeeping/response');
            $this->view->data->status = "Error";
            $this->view->data->alert_type = "important";
            $this->view->data->error = "Unknown targeted offer";
            $this->view->publish();
            return;
        }
        
        $id = intval($_GET['id']);

        if(!HkDao::targetedoffer_exists($id)) {
            Router::sendTo('housekeeping/targetedoffers');
        }
    
        R::exec("DELETE FROM targeted_offers WHERE id = '". $_GET["id"] . "'");
	
        $this->load_view('housekeeping/response');
        $this->view->data->status = "Success";
        $this->view->data->alert_type = "success";
        $this->view->data->error = "Targeted offer has been deleted!";
        $this->view->publish();
    }
}