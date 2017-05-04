<h2>Viewing <span class='muted'>#<?php echo $joborder->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $joborder->name; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $joborder->address; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $joborder->date; ?></p>
<p>
	<strong>Amount:</strong>
	<?php echo $joborder->amount; ?></p>

<p>
	<strong>Deposit:</strong>
	<?php echo $joborder->deposit; ?></p>
<p>
	<strong>Balance:</strong>
	<?php echo $joborder->balance; ?></p>


<?php echo Html::anchor('joborder/edit/'.$joborder->id, 'Edit'); ?> |
<?php echo Html::anchor('joborder', 'Back'); ?>