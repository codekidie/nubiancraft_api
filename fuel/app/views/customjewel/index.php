<h2>Listing <span class='muted'>3d Jewels</span></h2>
<br>
<?php if ($customjewels): ?>
<table class="table table-fixed" id="table1">
	<thead>
		<tr>
			<th>Materialname</th>
			<th >Embed</th>
			<th>Laborcost</th>
			<th>Weight</th>
			<th>Gemsize</th>
			<th>Numberofgems</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($customjewels as $item): ?>		<tr>

			<td><?php echo $item->materialname; ?></td>
			<td><?php echo  substr($item->embed, 0, 100); ?></td>
			<td><?php echo $item->laborcost; ?></td>
			<td><?php echo $item->weight; ?></td>
			<td><?php echo $item->gemsize; ?></td>
			<td><?php echo $item->numberofgems; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
							<a href="#" onclick="delete3dMaterial(<?php echo $item->id; ?>)" class="btn btn-sm btn-danger">Delete</a>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Customjewels.</p>

<?php endif; ?><p>

</p>
