<h2>Editing <span class='muted'>Owner</span></h2>
<br>

<?php echo render('owner/_form'); ?>
<p>
	<?php echo Html::anchor('owner/view/'.$owner->id, 'View'); ?> |
	<?php echo Html::anchor('owner', 'Back'); ?></p>
