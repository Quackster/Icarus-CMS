		<div class="nav-bar">
			<div class="container">
				<ul class="nav">
					<li><a href="{$site->url}/home">HOME</a></li>
					<li><a href="{$site->url}/community">COMMUNITY</a></li>
					<li><a href="{$site->url}/staff">STAFF</a></li>
					<?php if(Session::isAuthed()) { ?>
<li><a href="{$site->url}/account/logout">LOGOUT</a></li>


<?php 	if(Session::hasHousekeeping()) { ?>
<li><a href="{$site->url}/housekeeping">HOUSEKEEPING</a></li>
				<?php } } ?></ul>
				
				
				
				
			</div>
		</div>