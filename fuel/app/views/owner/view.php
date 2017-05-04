<h2>Viewing <span class='muted'>#<?php echo $owner->id; ?></span></h2>

<p>
	<strong>Firstname:</strong>
	<?php echo $owner->firstname; ?></p>
<p>
	<strong>Lastname:</strong>
	<?php echo $owner->lastname; ?></p>
<p>
	<strong>Phone:</strong>
	<?php echo $owner->phone; ?></p>
<p>
	<strong>Username:</strong>
	<?php echo $owner->username; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $owner->password; ?></p>

<?php echo Html::anchor('owner/edit/'.$owner->id, 'Edit'); ?> |
<?php echo Html::anchor('owner', 'Back'); ?>