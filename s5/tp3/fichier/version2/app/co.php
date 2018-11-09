<div id="content">
	<h2>Nos Chambre :</h2>
    <div id="grid">
 
	<?php
		$list=$dao->getList('chambre');
		
		foreach ($list as  $value) {
			?>
			<div class="bb">
			<div class="item">
			<h3><?php echo $value->getNom(); ?></h3>
			<img src="<?php echo $value->getImage(); ?>">
			<div>
			<p><?php echo $value->getPrix(); ?> DH</p>
			<p><?php echo $value->getDescription(); ?></p>
			<a href="#">learn more</a></div>
			</div>
			</div>
		<?php	
		}
	?>


</div>
</div>