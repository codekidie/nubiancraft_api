  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<style type="text/css">
	@media print{

	}
	body{
		padding: 20px;
	}
</style>
<h2>Listing <span class='muted'>Joborders</span></h2>
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

				$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);

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

						<?php echo Html::anchor('joborders/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>
					</div>
								
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Joborders.</p>

<?php endif; ?><p>

</p>

<script type="text/javascript">
	$('#table1').DataTable();
</script>
