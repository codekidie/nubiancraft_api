<h2>Listing <span class='muted'>Accounts</span></h2>
<br>
<?php if ($owners): ?>
<table class="table table-condensed" id="table1">
	<thead>
		<tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Phone</th>
			<th>Username</th>
			<th>Password</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($owners as $item): ?>		<tr>

			<td><?php echo $item->firstname; ?></td>
			<td><?php echo $item->lastname; ?></td>
			<td><?php echo $item->phone; ?></td>
			<td><?php echo $item->username; ?></td>
			<td><?php echo $item->password; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="#" onclick="getOwner(<?php echo $item->id; ?>)" class="btn btn-sm btn-info">Update</a>
						<a href="#" onclick="deleteOwner(<?php echo $item->id; ?>)" class="btn btn-sm btn-danger">Delete</a>
						
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Account Found.</p>
<?php endif ?>
