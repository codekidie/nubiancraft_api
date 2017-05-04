
<div class="col-md-12">
   <div id="content" class="formjoborder">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
               <div class="panel-heading clearfix">
                  <i class="icon-calendar"></i>
                  <h3 class="panel-title">Job Order Form</h3>
               </div>
               <div class="panel-body form-horizontal ">
                  <div class="row">
                     <div class="col-lg-3 col-sm-3">
                        <div class="input-group">
                           <span class="input-group-addon">Name</span>
                           <input type="text" id="name" name="name" class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-3 col-sm-3">
                        <div class="input-group">
                           <span class="input-group-addon">Address</span>
                           <input type="text" id="address" class="form-control" name="address">
                        </div>
                     </div>
                  
                       <div class="col-lg-3 col-sm-3">
                        <div class="input-group">
                           <span class="input-group-addon">Telephone #</span>
                           <input type="text"    class="form-control"  id="telnum" name="telnum">
                        </div>
                     </div>
                     <div class="col-lg-3 col-sm-3">
                        <div class="input-group">
                           <span class="input-group-addon">Date</span>
                           <input type="date"  class="form-control"  id="date_schedule" name="date_schedule">
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-lg-3 col-sm-3">
                        <div class="input-group">
                           <span class="input-group-addon">Deposit</span>
                           <input type="number" class="form-control"  onchange="depositKeyTrig()" onkeydown="depositKeyTrig()"    id="deposit" name="deposit">
                        </div>
                     </div>
                        <div class="col-lg-3 col-sm-3">
                        <div class="input-group">
                           <span class="input-group-addon">Amount</span>
                           <input type="text"    class="form-control"  disabled='disabled'   id="amount" name="amount">
                        </div>
                     </div>
                     <div class="col-lg-3 col-sm-3">
                        <div class="input-group">
                           <span class="input-group-addon">Balance</span>
                           <input type="text"  class="form-control"  id="balance" name="balance" disabled='disabled'>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-md-6">
   <?php foreach ($materials as $m): ?>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="panel panel-default">
            <div class="panel-heading clearfix">
               <i class="icon-calendar"></i>
               <h3 class="panel-title" id="materialname"><?php echo $m['materialname']; ?></h3>
            </div>
            <div class="panel-body form-horizontal ">
               <div class="row">
                  <div class="col-lg-12 col-sm-12" style="margin:10px;">
                     <div class="input-group">
                        <span class="input-group-addon">Labor Cost: </span>
                        <input type="text"  class="form-control"  id="laborcost" value="<?php echo $m['laborcost']; ?>" readonly style="width:130px;">
                     </div>
                  </div>
                  <hr>
                  <div class="col-lg-12 col-sm-12" style="margin:10px;">
                     <div class="input-group">
                        <span class="input-group-addon">Weight : </span>
                        <input type="text"  class="form-control"  id="weight" value="<?php echo $m['weight']; ?>" readonly style="width:130px;">
                     </div>
                  </div>
                  <hr>
                  <hr>
                  <div class="col-lg-12 col-sm-12" style="margin:10px;">
                     <div class="input-group">
                        <span class="input-group-addon">Number of Gem: </span>
                        <input type="text"  class="form-control"  id="numberofgems" value="<?php echo $m['numberofgems']; ?>" readonly style="width:130px;">
                     </div>
                  </div>
                  <hr>
                  <div class="col-lg-12 col-sm-12" style="margin:10px;">
                     <div class="input-group">
                        <span class="input-group-addon">Select Metals: </span>
                        <select class="form-control" id="metalselection">
                        </select>
                     </div>
                  </div>
                  <hr>
                  <input type="hidden" name="gemsize" id="gemsize" value="<?php echo $m['gemsize']; ?>">
                  <div class="col-lg-12 col-sm-12" style="margin:10px;">
                     <div class="input-group">
                        <span class="input-group-addon">Select Gems: </span>
                        <select class="form-control" id="gemselection">
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-12 col-sm-12" style="margin:10px;">
                     <div class="input-group">
                        <button onclick="submitOrder()" class="btn btn-info">Submit</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endforeach ?>
</div>
<div class="col-md-6">
    <div id="metalSelectedContainer">
        <img src="14kgold.png" alt="" class="metalimage">
       <center> <h3 id="goldname" style="color:#fff;"></h3> </center>
   </div>
	<?php foreach ($materials as $m): ?>
		 <?php echo html_entity_decode($m['embed']); ?>
	<?php endforeach ?>
   <div id="metalSelectedContainer"></div>
	</div>
		 
