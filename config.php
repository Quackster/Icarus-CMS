<?php 

Site::getConfig()->db->host = '127.0.0.1';
Site::getConfig()->db->username = 'root';
Site::getConfig()->db->password = '';
Site::getConfig()->db->database = 'icarusdb';
Site::getConfig()->db->development_mode = false;

Site::getConfig()->register->motto = "I'm a new user!";
Site::getConfig()->register->credits = 5000;
Site::getConfig()->register->figure = "ch-210-66.hr-100-0.sh-290-80.hd-180-7.lg-270-82";

Site::getConfig()->site->template = 'default';
Site::getConfig()->site->url = 'http://icarus.dev';
Site::getConfig()->site->name = 'Icarus';
Site::getConfig()->site->client_popup = false;

Site::getConfig()->site->housekeeping_rank = 5;

Site::getConfig()->site->ip = "127.0.0.1";
Site::getConfig()->site->mus_port = 30001;
Site::getConfig()->site->mus_password = "jellybaby";

Site::getConfig()->client->ip = "localhost";
Site::getConfig()->client->port = 30000;

Site::getConfig()->client->external_variables = "http://icarus.dev/gamedata/external_variables.txt?version=" . time();
Site::getConfig()->client->external_flash_texts = "http://icarus.dev/gamedata/external_flash_texts.txt?version=" . time();
Site::getConfig()->client->external_override_texts = "http://icarus.dev/gamedata/override/external_flash_override_texts.txt?version=" . time();
Site::getConfig()->client->external_override_variables = "http://icarus.dev/gamedata/override/external_override_variables.txt?version=" . time();
Site::getConfig()->client->productdata = "http://icarus.dev/gamedata/productdata.txt";
Site::getConfig()->client->furnidata = "http://icarus.dev/gamedata/furnidata.xml";
Site::getConfig()->client->figuredata = "http://icarus.dev/gamedata/figuredata.xml";
Site::getConfig()->client->path = "http://icarus.dev/gordon/PRODUCTION-201709192204-203982672/";
Site::getConfig()->client->swf = "http://icarus.dev/gordon/PRODUCTION-201709192204-203982672/Habbo.swf?version=" . time();

?>