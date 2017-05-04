<h2>Listing <span class='muted'>Gems</span></h2>
<br>
<?php if ($gems): ?>
<table class="table table-condensed" id="table2">
	<thead>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Size</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($gems as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->price; ?></td>
			<td><?php echo $item->size; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="#" onclick="deleteGem(<?php echo $item->id; ?>)" class="btn btn-sm btn-danger">Delete</a>
										
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Gems.</p>

<?php endif; ?><p>

</p>
