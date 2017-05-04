<h2>Listing <span class='muted'>Metals</span></h2>
<br>
<?php if ($metals): ?>
<table class="table table-condensed" id="table1">
	<thead>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($metals as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->price; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php // echo Html::anchor('metal/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>	
						<?php // echo Html::anchor('metal/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>	
						<?php // echo Html::anchor('metal/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
			<a href="#" onclick="deleteMetal(<?php echo $item->id; ?>)" class="btn btn-sm btn-danger">Delete</a>
						
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Metals.</p>

<?php endif; ?><p>
	<?php //echo Html::anchor('metal/create', 'Add new Metal', array('class' => 'btn btn-success')); ?>

</p>
