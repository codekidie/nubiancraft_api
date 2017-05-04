<option value="0">Please Select Metal</option>
<?php foreach ($metals as $item): ?>		
		<option value="<?php echo $item->price; ?>"><?php echo $item->name; ?></option>
<?php endforeach; ?>	
