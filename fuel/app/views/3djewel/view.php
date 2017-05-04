<h2>Viewing <span class='muted'>#<?php echo $3djewel->id; ?></span></h2>

<p>
	<strong>Materialname:</strong>
	<?php echo $3djewel->materialname; ?></p>
<p>
	<strong>Embed:</strong>
	<?php echo $3djewel->embed; ?></p>
<p>
	<strong>Laborcost:</strong>
	<?php echo $3djewel->laborcost; ?></p>
<p>
	<strong>Weight:</strong>
	<?php echo $3djewel->weight; ?></p>
<p>
	<strong>Gemsize:</strong>
	<?php echo $3djewel->gemsize; ?></p>
<p>
	<strong>Numberofgems:</strong>
	<?php echo $3djewel->numberofgems; ?></p>

<?php echo Html::anchor('3djewel/edit/'.$3djewel->id, 'Edit'); ?> |
<?php echo Html::anchor('3djewel', 'Back'); ?>