<h2>Listing <span class='muted'>3djewels</span></h2>
<br>
<?php if ($3djewels): ?>
<table class="table table-striped" id="table1">
	<thead>
		<tr>
			<th>Materialname</th>
			<th>Embed</th>
			<th>Laborcost</th>
			<th>Weight</th>
			<th>Gemsize</th>
			<th>Numberofgems</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($3djewels as $item): ?>		<tr>

			<td><?php echo $item->materialname; ?></td>
			<td><?php echo $item->embed; ?></td>
			<td><?php echo $item->laborcost; ?></td>
			<td><?php echo $item->weight; ?></td>
			<td><?php echo $item->gemsize; ?></td>
			<td><?php echo $item->numberofgems; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('3djewel/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('3djewel/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('3djewel/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No 3djewels.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('3djewel/create', 'Add new 3djewel', array('class' => 'btn btn-success')); ?>

</p>
