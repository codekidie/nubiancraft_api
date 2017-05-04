  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<button class="btn btn-info" id="printerbuton" onclick="printer()" style="float: right;"><i class="fa fa-fw fa-print"></i> Print</button>

<select id="status">
	<option>Select Status</option>
	<option>Claimed</option>
	<option>Pending</option>
</select>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
  	$('select').on('change', function() {
		   var status = this.value;
		   var getUrl = window.location;
           var baseUrl = "http://localhost/jewelry_api/";
           var id = $('#jid').val();
		     $.ajax({
                    url: baseUrl+"rester/status/"+status+"/"+id,
                    type: "GET",
                    success: function(data){
                        alert("Status success updated");
                    },
                    error: function(){
                        alert("status failed update");
                    }             
            });
	})
  </script>

<div id="myElementId">
<input type="hidden" id="jid" value="<?php echo $joborder->id; ?>">

<center><h2>Nubian Craft Goldsmith</h2>
	<p>Dr# 2 , F. Tan BLDG. S.K Pendatun Ave <br> cotabato city , 9600 <br> Contact #: 0919-922-9605</p>
	</center>
<table class="table wrap-print">
	<tr><td colspan="4">Job Order Reciept </td><td>Reciept</td><td>#<?php echo $joborder->id; ?></span></td></tr>
	<tr><td colspan="2">Customer Name :</td><td><?php echo $joborder->name; ?></td><td>Date Due</td><td colspan="2"><?php echo $joborder->date_schedule; ?></td></tr>
	<tr><td colspan="2">Address :</td><td><?php echo $joborder->address; ?></td><td>Tel #:</td><td colspan="2"><?php echo $joborder->telnum; ?></td></tr>

<table class="table" style="margin-top:100px;">
	<tr><th colspan="5" style="text-align:center;">Description</th></tr>
	<tr> <td rowspan="5">	<img src="http://localhost/jewelry_api/files/<?php echo $joborder->materialimage;?>" style="width:150px;height:150px;"></td></tr>
	<tr><td>Design Name :</td><td>	<?php echo $joborder->materialname; ?></td></tr>	
	<tr><td>Labor Cost :</td><td>	<?php echo $joborder->laborcost; ?></td></tr>	
	<tr><td>Metal Cost:</td><td>	<?php echo $joborder->metalselection; ?></td> <td>Weight </td> <td><?php echo $joborder->weight; ?></td></tr>	
	<tr><td>Gem Cost:</td><td>	<?php echo $joborder->gemselection; ?></td> <td>Number of gems</td><td><?php echo $joborder->numberofgems; ?></td></tr>	
</table>
	<?php 
			$totalcost =  $joborder->laborcost + ( $joborder->metalselection *  $joborder->weight) + ( $joborder->gemselection *  $joborder->numberofgems); 

	 ?>

	<h4 style="text-align:right;">Total Cost :  <?php echo $totalcost ?></h4>
	<h4 style="text-align:right;">Deposit : <?php echo  $joborder->deposit; ?></h4>
	<h4 style="text-align:right;">Balance : <?php echo  $joborder->balance; ?></h4>
	<h4 style="text-align:left;">Recieved By : __________________________ </h4>
	<h4 style="text-align:left;">Claimed By : ___________________________ </h4>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.5.1/jQuery.print.js"></script>
<script type="text/javascript">
	function printer()
	{	
	      $('#printerbuton').hide();

		$("#myElementId").print({
		    addGlobalStyles : true,
		    stylesheet : null,
		    rejectWindow : true,
		    noPrintSelector : ".no-print",
		    iframe : true,
		    append : null,
		    prepend : null
		});

		
	}
</script>