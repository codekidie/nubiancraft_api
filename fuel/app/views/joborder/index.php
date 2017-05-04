
<h2>Listing <span class='muted'>Due For Today</span></h2>
<br>
<?php if ($joborders): ?>
<table class="table table-condensed" id="table1">
	<thead>
		<tr>
			<th>Control #</th>
			<th>Name</th>
			<th>Address</th>
			<th>Due Date</th>
			<th>Amount</th>
			<th>Deposit</th>
			<th>Balance</th>
			<th>Tel #</th>
			<th>Status</th>
			<th>Transaction Date</th>
			<th>Final Due Date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($joborders as $item): ?>		<tr>
<?php 

				$createddate =  date('d',$item->created_at);
				$duedate =  $item->date_schedule;
				$datesum = $createddate + $duedate;
				$month =  date('m',$item->created_at);
				$year =  date('Y',$item->created_at);

				$days  = cal_days_in_month(CAL_GREGORIAN,$month,$year);
				

				if ($datesum > 29) {
					if ($days == 30) {
					   $datesum =  $datesum - $days;
					   $month++;	
					   	
					}
					else if($days == 29)
					{
					   $datesum = $datesum - $days;	
					   $month++;	

					}
					else if($days == 31)
					{
					   $datesum = $datesum - $days;	
					   $month++;	

					}
					else{
					   $datesum = $datesum - $days;
					   $month++;	
					}

				}

				$finalduedate = $month.'/'.$datesum.'/'.$year;
				$today = date("m/d/Y");		

				if ($finalduedate == $today) {
				
				}else{
					continue;
				}

						

			?>
		   <td><?php echo $item->id; ?></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->address; ?></td>
			<td><?php echo $item->date_schedule; ?></td>
			<td><?php echo $item->amount; ?></td>
			<td><?php echo $item->deposit; ?></td>
			<td><?php echo $item->balance; ?></td>
			<td><?php echo $item->telnum; ?></td>
			<td><?php echo $item->status; ?></td>
			<td><?php echo date('m/d/Y',$item->created_at); ?></td>
			<td><?php echo $month.'/'.$datesum.'/'.$year; ?></td>

	
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
					<button type="button" class="btn btn-info btn-sm" onclick="updateJo(<?php echo $item->id; ?>)">Update</button>			
					<a href="#" onclick="deleteJobOrder(<?php echo $item->id; ?>)" class="btn btn-sm btn-danger">Delete</a>

					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	
</tbody>
</table>
<?php endif; ?>

