<h2>Viewing <span class='muted'>#<?php echo $material->id; ?></span></h2>

<p>
	<strong>Materialname:</strong>
	<?php echo $material->materialname; ?></p>
<p>
	<strong>Materialimage:</strong>
	<?php echo $material->materialimage; ?></p>
<p>
	<strong>Material:</strong>
	<?php echo $material->material; ?></p>
<p>
	<strong>Cost:</strong>
	<?php echo $material->cost; ?></p>

<?php echo Html::anchor('material/edit/'.$material->id, 'Edit'); ?> |
<?php echo Html::anchor('material', 'Back'); ?>