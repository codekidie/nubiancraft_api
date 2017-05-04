<option value="0">Please Select Gems</option>
<?php foreach ($gem as $item): ?>		
		<option value="<?php echo $item->price; ?>"><?php echo $item->name; ?></option>
<?php endforeach; ?>	
