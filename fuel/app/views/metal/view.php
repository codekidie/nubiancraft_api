<h2>Viewing <span class='muted'>#<?php echo $metal->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $metal->name; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $metal->price; ?></p>

<?php echo Html::anchor('metal/edit/'.$metal->id, 'Edit'); ?> |
<?php echo Html::anchor('metal', 'Back'); ?>