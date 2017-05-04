<h2>Listing <span class='muted'>Materials</span></h2>
<br>
<?php if ($materials): ?>
<table class="table table-condensed" id="table1">
	<thead>
		<tr>
			<th>Material Name</th>
			<th>Material Image</th>
			<th>Labor Cost</th>
			<th>Weight</th>
			<th>Gem Size</th>
			<th>Number Of Gems</th>
			<th>Type</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($materials as $item): ?>		<tr>

			<td><?php echo $item->materialname; ?></td>
			<td><img src="http://localhost/jewelry_api/files/<?php echo $item->materialimage; ?>" style="width:50px;height: 50px;"> </td>
			<td><?php echo $item->laborcost; ?></td>
			<td><?php echo $item->weight; ?></td>
			<td><?php echo $item->gemsize; ?></td>
			<td><?php echo $item->numberofgems; ?></td>
			<td><?php echo $item->type; ?></td>
			<td>
		
					<a href="#" onclick="deleteMaterial(<?php echo $item->id; ?>)" class="btn btn-sm btn-danger">Delete</a>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Materials.</p>

<?php endif; ?><p>
	<?php //echo Html::anchor('material/create', 'Add new Material', array('class' => 'btn btn-success')); ?>

</p>
