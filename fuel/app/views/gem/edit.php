<h2>Editing <span class='muted'>Gem</span></h2>
<br>

<?php echo render('gem/_form'); ?>
<p>
	<?php echo Html::anchor('gem/view/'.$gem->id, 'View'); ?> |
	<?php echo Html::anchor('gem', 'Back'); ?></p>
