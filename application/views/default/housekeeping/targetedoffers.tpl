<?php
$this->inc('housekeeping/base/header');		
?>

<h1>News Articles</h1>
<table class="table table-striped">
	<tr>
		<th>Name</th>
		<th>Description</th>
		<th>Cost Credits</th>
		<th>Purchase Limit</th>
		<th>Enabled</th>
	</tr>
<?php
	foreach(R::getAll("SELECT * FROM targeted_offers WHERE expire_time > " . time() . " LIMIT 25") as $targetedoffer) {
	
	?>
		<tr>
			<td><?php echo $targetedoffer["title"]; ?></td>
			<td width="50%"><?php echo $targetedoffer["description"]; ?></td>
			<td><?php echo $targetedoffer["credits"]; ?></td>
			<td><?php echo $targetedoffer["purchase_limit"]; ?></td>
			<td><?php echo $targetedoffer["enabled"]; ?></td>
			<td>
				<a href="{$site->url}/housekeeping/targetedoffers/edit?targetedoffer=<?php echo $targetedoffer["id"]; ?>" class="btn btn-primary">Edit</a>
				<a href="{$site->url}/housekeeping/targetedoffers/delete?targetedoffer=<?php echo $targetedoffer["id"]; ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
	<?php
	}
?>
</table>


<?php
$this->inc('housekeeping/base/footer');		
?>