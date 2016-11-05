<?php 

Site::getConfig()->db->host = '127.0.0.1';
Site::getConfig()->db->username = 'root';
Site::getConfig()->db->password = '123456';
Site::getConfig()->db->database = 'root';
Site::getConfig()->db->development_mode = false;

Site::getConfig()->site->template = 'default';
Site::getConfig()->site->url = 'http://localhost';
Site::getConfig()->site->name = 'Icarus';

Site::getConfig()->security->salt = "salty";

Site::getConfig()->site->housekeeping_rank = 5;

?>