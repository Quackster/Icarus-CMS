<?php

class Api extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function nameCheck() {
        
        if (!isset($_POST)) {
            
        }
        
        $request = json_decode(file_get_contents('php://input'));
        $username = $request->name;
        
        $json = array();
            
        if (UserDao::exists('username', $username)) {
            $json =
                array(
                'code' => 'NAME_IN_USE',
                'validationResult' => null,
                'suggestions' => array()
            );
            
        } else if (!preg_match('/^[a-zA-Z0-9_]+$/',$username)) {
            $json =
                array(
                    'code' => 'INVALID_NAME',
                    'validationResult' => array(
                        'resultType' => 'VALIDATION_ERROR_ILLEGAL_CHARS',
                        'additionalInfo' => $username,
                        'valid' => false),
                    'suggestions' => array()
                );
        } else if(strlen($username) < 3) {
           $json =
                array(
                    'code' => 'INVALID_NAME',
                    'validationResult' => array(
                        'resultType' => 'VALIDATION_ERROR_NAME_TOO_SHORT',
                        'additionalInfo' => $username,
                        'valid' => false),
                    'suggestions' => array()
                );
            
        } else if (strlen($username) > 16) {
           $json =
                array(
                    'code' => 'INVALID_NAME',
                    'validationResult' => array(
                        'resultType' => 'VALIDATION_ERROR_NAME_TOO_LONG',
                        'additionalInfo' => $username,
                        'valid' => false),
                    'suggestions' => array()
                );
        } else {
            $json['code'] = "OK";        
            $json['validationResult'] = null;
            $json['suggestions'] = array();
            $_SESSION["register_name"] = $username;
        }

        echo json_encode($json);
        
        // Name taken
        //{"code":"NAME_IN_USE","validationResult":null,"suggestions":["winterpar1Cool","Canwinterpar1","Paulwinterpar1"]}
        
        // Success
        //{"code":"OK","validationResult":null,"suggestions":[]}
        
        // Name has bad words
        //{"code":"INVALID_NAME","validationResult":{"resultType":"VALIDATION_ERROR_ILLEGAL_WORDS","additionalInfo":"cunt","valid":false},"suggestions":[]}
        
        // Name too short
        //{"code":"INVALID_NAME","validationResult":{"resultType":"VALIDATION_ERROR_NAME_TOO_SHORT","additionalInfo":2,"valid":false},"suggestions":[]}
        
        // Bad characters
        //{"code":"INVALID_NAME","validationResult":{"resultType":"VALIDATION_ERROR_ILLEGAL_CHARS","additionalInfo":"'","valid":false},"suggestions":[]}
    }
    
    public function saveAppearance() {
        
        $request = json_decode(file_get_contents('php://input'));
        $_SESSION["register_figure"] = $request->figure;
        
        $json = array(
            "uniqueId" => "0",
            "name" => $_SESSION["register_name"],
            "figureString" => $_SESSION["register_figure"],
            "motto" => ""
        );
        
        echo json_encode($json);
    }
    
    public function selectName() {
        
        $json = array();
        $username = $_SESSION["register_name"];
        $figure = $_SESSION["register_figure"];
            
        if (UserDao::exists('username', $username)) {
            $json =
                array(
                'code' => 'NAME_IN_USE',
                'validationResult' => null,
                'suggestions' => array()
            );
            
        } else if (!preg_match('/^[a-zA-Z0-9_]+$/',$username)) {
            $json =
                array(
                    'code' => 'INVALID_NAME',
                    'validationResult' => array(
                        'resultType' => 'VALIDATION_ERROR_ILLEGAL_CHARS',
                        'additionalInfo' => $username,
                        'valid' => false),
                    'suggestions' => array()
                );
        } else if(strlen($username) < 3) {
           $json =
                array(
                    'code' => 'INVALID_NAME',
                    'validationResult' => array(
                        'resultType' => 'VALIDATION_ERROR_NAME_TOO_SHORT',
                        'additionalInfo' => $username,
                        'valid' => false),
                    'suggestions' => array()
                );
            
        } else if (strlen($username) > 16) {
           $json =
                array(
                    'code' => 'INVALID_NAME',
                    'validationResult' => array(
                        'resultType' => 'VALIDATION_ERROR_NAME_TOO_LONG',
                        'additionalInfo' => $username,
                        'valid' => false),
                    'suggestions' => array()
                );
        } else {
            $json['code'] = "OK";        
            $json['validationResult'] = null;
            $json['suggestions'] = array();
            $_SESSION["register_name"] = $username;
        }
        
         R::exec("UPDATE users SET username = ?, figure = ? WHERE id = ?", array($username, $figure, Session::auth()->id));//_SESSION["register_figure"])); 

        echo json_encode($json);
    }
    
    public function selectRoom() {
        //{roomIndex: 1} - requested
        
        
    }
}
    
?>