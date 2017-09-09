<?php
$this->inc('housekeeping/base/header');	

$targetedoffer = $this->data->targetedoffer;	

?>
<style type="text/css">
	input[type="message"] {
		width: 300px;
	}
</style>	

<script type="text/javascript">
function previewTS(el)
{
	document.getElementById('ts-preview').innerHTML = '<img src="{$site->url}/c_images/targetedoffers/' + el + '" /><br />';
}
</script>

<div class="page-header">
	<h1>Edit Targeted Offer</h1>
</div>

<form action="{$site->url}/housekeeping/targetedoffers/save" method="post">
	
	<div style="float: left; width: 80%;">
    
    <div class="alert alert-success">
    Please double check all edits before submitting them!
    </div>

    Title:<br />
	<p><input type="text" name="title" value="<?php echo $targetedoffer->title; ?>" style="width: 50%;"></p>
    
    <div id="ts-preview">

	<p><img src="{$site->url}/c_images/<?php echo $targetedoffer->large_image; ?>"></p>

    </div>
    <br />
    
    Large Image:<br />
    <p><select onkeypress="previewTS(this.value);" onchange="previewTS(this.value);" name="largeimage" id="largeimage">
	<?php
	
	if ($handle = opendir('c_images/targetedoffers'))
	{
		while (false !== ($file = readdir($handle)))
		{
			if ($file == '.' || $file == '..')
			{
				continue;
			}	
			
			echo '<option value="' . $file . '"';
			
		    $ex = explode("/", $targetedoffer->large_image);
			
			if (isset($ex) && $ex[1] == $file) {
				echo ' selected';
			}
			
			echo '>' . $file . '</option>';
		}
	}

	?>
	</select></p>
	
    
    <!--Article Large Image:<br />
    <p><input type="text" name="large_image" value="<?php echo $targetedoffer->large_image; ?>" style="width: 50%;"></textarea></p>
    -->
	Description:<br />
	<p><textarea name="description" rows="3" style="width: 50%;"><?php echo $targetedoffer->description; ?></textarea></p>
    
    Cost credits:<br />
	<p><input type="text" name="credits" value="<?php echo $targetedoffer->credits; ?>" style="width: 50%;"></p>
    
    Cost activity points:<br />
	<p><input type="text" name="activitypoints" value="<?php echo $targetedoffer->activity_points; ?>" style="width: 50%;"></p>

    Activity points type:<br />
	<p>     
        <select name="activitypointstype" id="activitypointstype">
            <option value="0">Duckets</option>
            <option value="1">Snowflakes</option>
            <option value="2">Hearts</option>
            <option value="3">Gift Points</option>
            <option value="4">Shells</option>
            <option value="5">Diamonds</option>
        </select>
    </p>
    
    Days until expiry:<br />
	<p><input type="text" name="expirydays" value="<?php echo intval(($targetedoffer->expire_time - time()) / 60 / 60 / 24); ?>" style="width: 50%;"></p>
    
    Disable offer? <i>(Selecting yes will stop this offer being active)</i><br />
	<p>     
        <select name="enabled" id="enabled">
            <option value="1">No</option>
            <option value="0">Yes</option>
        </select>
    </p>
    
    <p><input type="hidden" name="id" value="<?php echo $targetedoffer->id; ?>" style="width: 50%;"></p>
	<p><input type="submit" value="Edit Offer" class="btn btn-primary" /></p>
	</div>
	
</form>

<?php
$this->inc('housekeeping/base/footer');		
?>