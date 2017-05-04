<h2>Editing <span class='muted'>Joborder</span></h2>
<br>

<?php echo render('joborder/_form'); ?>
<p>
	<?php echo Html::anchor('joborder/view/'.$joborder->id, 'View'); ?> |
	<?php echo Html::anchor('joborder', 'Back'); ?></p>
