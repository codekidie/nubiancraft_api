<h2>Viewing <span class='muted'>#<?php echo $gem->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $gem->name; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $gem->price; ?></p>
<p>
	<strong>Size:</strong>
	<?php echo $gem->size; ?></p>

<?php echo Html::anchor('gem/edit/'.$gem->id, 'Edit'); ?> |
<?php echo Html::anchor('gem', 'Back'); ?>