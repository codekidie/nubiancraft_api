<h2>Viewing <span class='muted'>#<?php echo $customjewel->id; ?></span></h2>

<p>
	<strong>Materialname:</strong>
	<?php echo $customjewel->materialname; ?></p>
<p>
	<strong>Embed:</strong>
	<?php echo $customjewel->embed; ?></p>
<p>
	<strong>Laborcost:</strong>
	<?php echo $customjewel->laborcost; ?></p>
<p>
	<strong>Weight:</strong>
	<?php echo $customjewel->weight; ?></p>
<p>
	<strong>Gemsize:</strong>
	<?php echo $customjewel->gemsize; ?></p>
<p>
	<strong>Numberofgems:</strong>
	<?php echo $customjewel->numberofgems; ?></p>

<?php echo Html::anchor('customjewel/edit/'.$customjewel->id, 'Edit'); ?> |
<?php echo Html::anchor('customjewel', 'Back'); ?>