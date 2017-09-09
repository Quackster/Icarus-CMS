<?php

$path = "localhost";
$build = "PRODUCTION-201701242205-837386173";

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Icarus: Hotel</title>

    <script type="text/javascript">
        var andSoItBegins = (new Date()).getTime();
    </script>
	
    <link rel="shortcut icon" href="{$site->url}/favicon.ico" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="{$site->url}/web-gallery/static/styles/common.css" type="text/css" />
    <script src="{$site->url}/web-gallery/static/js/libs2.js" type="text/javascript"></script>
    <script src="{$site->url}/web-gallery/static/js/visual.js" type="text/javascript"></script>
    <script src="{$site->url}/web-gallery/static/js/libs.js" type="text/javascript"></script>
    <script src="{$site->url}/web-gallery/static/js/common.js" type="text/javascript"></script>
    <script type="text/javascript">
        document.habboLoggedIn = true;
        var habboReqPath = "";
        var habboStaticFilePath = "{$site->url}/web-gallery/";
        var habboImagerUrl = "{$site->url}/habbo-imaging/";
        var habboPartner = "";
        var habboDefaultClientPopupUrl = "/client";

        
        window.name = "82d01adba997d04a81f688ed8a10e54b";
        if (typeof HabboClient != "undefined") {
            HabboClient.windowName = "82d01adba997d04a81f688ed8a10e54b";
            HabboClient.maximizeWindow = true;
        }
    </script>
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic|Ubuntu+Medium' rel='stylesheet' type='text/css'>
    <noscript>
        <meta http-equiv="refresh" content="0;url=/client/nojs" />
    </noscript>
    <link rel="stylesheet" href="{$site->url}/web-gallery/styles/habboflashclient.css" type="text/css" />
    <script src="{$site->url}/web-gallery/static/js/habboflashclient.js" type="text/javascript"></script>
    <script type="text/javascript"> 
        var andSoItBegins = (new Date()).getTime();
        var ad_keywords = "";
        document.habboLoggedIn = true;
        var habboName = "{$user->username}";
        var habboReqPath = "{$site->url}";
        var habboStaticFilePath = "/web-gallery/";
        var habboImagerUrl = "http://www.habbo.nl/habbo-imaging/";
        var habboPartner = "";
        var habboDefaultClientPopupUrl = "/client";
        window.name = "habboMain";

        FlashExternalInterface.loginLogEnabled = true;
        FlashExternalInterface.logLoginStep("web.view.start");
            
        if (top == self)
        {
            FlashHabboClient.cacheCheck();
        }

        var BaseUrl = "{$site->url}/gordon/<?php echo $build; ?>/";

        var flashvars =
        {
            "new.user.flow.enabled":"true",
            "new.user.flow.onboarding.choose.your.room":"Choose your room",
            "new.user.flow.figure.ok":"Figure change ok!",
            "external.texts.txt":"http://localhost/gamedata/external_flash_texts.txt",
            "new.user.flow.onboarding.what.is.hc":"Icarus Club is designed for you to express yourself better than ever! It also has other useful benefits: outfits, rewards, room layouts, a special Shop, extended friends lists, preferential access in queues and room, and extended room limits.",
            "new.user.flow.onboarding.button.select.room":"I want this room",
            "url.prefix":"https:\/\/www.habbo.com",
            "new.user.flow.rename.submit":"Done",
            "client.starting":"Please wait! Icarus is starting up.",
            "new.user.flow.onboarding.button.ready":"I\'m ready",
            "new.user.flow.room.name.12":"Sunshine Lounge",
            "new.user.flow.room.name.11":"Penumbra Penthouse",
            "new.user.flow.room.name.10":"Home Shiny Home",
            "has.identity":"1",
            "new.user.flow.onboarding.this.is.your.habbo":"This is your Habbo",
            "new.user.flow.onboarding.room.information":"Choose your first room to get you started! You can create more rooms for free later.",
            "new.user.flow.gender":"Gender",
            "new.user.flow.onboarding.your.colour":"Choose colour",
            "new.user.flow.loader.waiting":"is warmed up!",
            "new.user.flow.bodyparts":"Body parts",
            "client.starting.revolving":"For science, you monster\/Loading funny message\u2026please wait.\/Would you like fries with that?\/Follow the yellow duck.\/Time is just an illusion.\/Are we there yet?!\/I like your t-shirt.\/Look left. Look right. Blink twice. Ta da!\/It\'s not you, it\'s me.\/Shhh! I\'m trying to think here.\/Loading pixel universe.",
            "new.user.flow.rename.subtitle":"4-15 characters, letters and numbers accepted",
            "spaweb":"1",
            "new.user.flow.header":"For choosing Habbo!",
            "new.user.flow.room.select":"Select",
            "new.user.flow.intro3":"Just one more thing! Tell us what kind of room you want to start with. It\'s not for life, so don\'t overthink it!",
            "new.user.flow.intro2":"Looking good! Next, give your Icarus a name. (Or skip and think of a good one later)",
            "supersonic_application_key":"2abb40ad",
            "connection.info.host":"127.0.0.1",
            "new.user.onboarding.hc.flow.enabled":"true",
            "client.notify.cross.domain":"0",
            "new.user.flow.onboarding.choose.your.name":"Choose your name",
            "new.user.flow.colors":"Colours",
            "new.user.flow.onboarding.creative.tip":"There are tons of Habbos created each day, so get creative!",
            "new.user.flow.onboarding.cant.decide":"Can\'t decide? Don\'t worry, you can change your clothes later!",
            "unique_habbo_id":"hhus-c05a3cd4f933df7036ce3397377cfe25",
            "new.user.flow.onboarding.get.hc.button":"Get Icarus Club!",
            "new.user.flow.onboard.what.is.hc.header":"Much more inside...",
            "new.user.flow.gender.girl":"Girl",
            "new.user.flow.loader":"is starting up...",
            "new.user.flow.onboarding.info.hc":"\"What is Icarus Club?<br>Habbo Club is a special club you can join to get access to more clothing styles, exclusive room designs, more space on your friends list and lots more.",
            "new.user.flow.onboarding.button.remove.items":"Remove items",
            "new.user.flow.onboarding.your.looks":"Choose looks",
            "new.user.flow.note.header":"For choosing Habbo!",
            "new.user.flow.save":"I\'ll wear this!",
            "connection.info.port":"30000",
            "furnidata.load.url":"http://localhost/gamedata/furnidata.xml",
            "new.user.flow.onboarding.hint.hc":"You\'ve selected Icarus club items but you\'ll have to purchase it to wear them!",
             "external.variables.txt": "http://localhost/gamedata/external_variables.txt?<?php echo rand(1,1000); ?>",
            "client.allow.cross.domain":"1",
            "nux.lobbies.enabled":"true",
            "external.override.texts.txt":"http://localhost/gamedata/override/external_flash_override_texts.txt",
            "supersonic_custom_css":"https:\/\/images.habbo.com\/game-data-server-static\/\/.\/hotel.731d1960.css",
            "external.figurepartlist.txt":"http://localhost/gamedata/figuredata.xml",
            "flash.client.origin":"popup",
            "new.user.flow.onboard.what.is.hc.description":"What is Icarus Club?\nHabbo Club is a special club you can join to get access to more clothing styles, exclusive room designs, more space on your friends list and lots more",
            "new.user.flow.galleryUrl":"\/\/images.habbo.com\/c_images\/nux\/",
            "new.user.reception.minLength":"2",
            "processlog.enabled":"1",
            "new.user.flow.page":"1",
            "new.user.flow.title":"Thank You",
            "new.user.flow.roomTypes":"10,11,12",
            "avatareditor.promohabbos":"https:\/\/www.habbo.com\/api\/public\/lists\/hotlooks",
            "new.user.onboarding.show.hc.items":"false",
            "new.user.flow.name":"{$user->username}",
            "new.user.reception.maxLength":"15",
            "new.user.flow.onboarding.characters.tip":"TIP: 3-15 characters, letters, numbers and underscores are accepted.",
            "productdata.load.url":"http://localhost/gamedata/productdata.txt",
            "new.user.flow.rename.warning":"TIP: There are tons of Habbos created every day, and your name must be unique, so be creative! You can also use these special characters: _-",
            "new.user.flow.rename.title":"Name your Habbo:",
            "new.user.flow.intro":"While we\'re preparing your check-in, please choose your first looks from this selection:",
            "external.override.variables.txt":"http://localhost/gamedata/override/external_override_variables.txt",
            "new.user.flow.onboarding.button.skip":"Skip",
            "sso.ticket":"{$user->ssoticket}",
            "new.user.flow.onboarding.choose.your.style":"Choose your style",
            "new.user.flow.onboarding.hint.hc.header":"Wait a second!",
            "new.user.flow.clothes":"Clothes",
            "new.user.flow.gender.boy":"Boy",
            "account_id":"63842078",
            "new.user.flow.figure.error":"Figure change error!",
            "flash.client.url":"BaseUrl",
            "new.user.flow.note.title":"Thank You",
            "new.user.flow.rename.skip":"Skip for now",
            "new.user.flow.room.description.12":"Ambient retro Lava Lamp glow included",
            "new.user.flow.room.description.11":"Ain\'t no party like a Penumbra party!",
            "new.user.flow.room.description.10":"For the Icarus who really likes shiny things",		
        };
        var params =
        {
            "base" : BaseUrl + "/",
            "allowScriptAccess" : "always",
            "menu" : "false"                
        };
        swfobject.embedSWF(BaseUrl + "Habbo.swf", "client", "100%", "100%", "10.0.0", "{$site->url}/gordon/<?php echo $build; ?>expressInstall.swf", flashvars, params, null);
    </script>

    <!--[if IE 8]>
		<link rel="stylesheet" href="/client/styles/css/ie8.css" type="text/css" />
	<![endif]-->
    <!--[if lt IE 8]>
		<link rel="stylesheet" href="/client/styles/css/ie.css" type="text/css" />
	<![endif]-->
    <!--[if lt IE 7]>
		<link rel="stylesheet" href="/client/styles/css/ie6.css" type="text/css" />
		<script src="/client/js/pngfix.js" type="text/javascript"></script>
		<script type="text/javascript">
			try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {}
		</script>
	<![endif]-->
</head>

<body id="client" class="flashclient">
    <div id="overlay"></div>
    <img src="/client/page_loader.gif" style="position:absolute; margin: -1500px;" />
    <div id="client-ui">
        <div id="flash-wrapper">
            <div id="flash-container">
                <div id="content" style="width: 400px; margin: 20px auto 0 auto;">
                    <div class="cbb clearfix">
						<h2 class="title">Please update your Flash Player to the latest version.</h2>
						<div class="box-content">
							<p>You can install and download Adobe Flash Player here: <a href="http://get.adobe.com/flashplayer/">Install flash player</a>. More instructions for installation can be found here: <a href="http://www.adobe.com/products/flashplayer/productinfo/instructions/">More information</a></p>
							<p><a href="http://www.adobe.com/go/getflashplayer"><img src="/client/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
						</div>
						
                    </div>
                </div>
                <noscript>
                    <div style="width: 400px; margin: 20px auto 0 auto; text-align: center">
                        <p>If you are not automatically redirected, please <a href="/client/nojs">click here</a></p>
                    </div>
                </noscript>
            </div>
        </div>
        <div id="content" class="client-content"></div>
        <iframe id="game-content" class="hidden" allowtransparency="true" frameBorder="0" src="about:blank"></iframe>
        <iframe id="page-content" class="hidden" allowtransparency="true" frameBorder="0" src="about:blank"></iframe>
        <script type="text/javascript">
            RightClick.init("flash-wrapper", "flash-container");
            if (window.opener && window.opener != window && window.opener.location.href == "/") {
                window.opener.location.replace("/me");
            }
            $(document.body).addClassName("js");
            HabboClient.startPingListener();
            Pinger.start(true);
            HabboClient.resizeToFitScreenIfNeeded();
        </script>
        <script type="text/javascript">
            HabboView.run();
        </script>
</body>
</html>
