				<?php if (isset($_SESSION['alert-type'])) { ?>
				
				<div class="<?php echo $_SESSION['alert-type'];  ?>">
					<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
					<?php echo $_SESSION['alert-message'];  ?>
				</div>
				
				<?php 
				
					unset($_SESSION['alert-type']);
					unset($_SESSION['alert-message']);
				} ?>