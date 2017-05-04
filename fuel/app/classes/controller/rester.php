<?php 

class Controller_Rester extends Controller_Rest
{
	 

    public function get_purchaseorder($name,$address,$date_schedule,$amount,$deposit,$balance,$metalselection,$gemselection,$laborcost,$weight,$numberofgems,$telnum,$materialname,$materialimage)
    {
        	$joborder = Model_Joborder::forge(array(
				'name' => $name,
				'address' => $address,
				'date_schedule' => $date_schedule,
				'amount' => $amount,
				'deposit' => $deposit,
				'balance' => $balance,
				'metalselection' => $metalselection,
				'gemselection' => $gemselection,
				'laborcost' => $laborcost,
				'weight' => $weight,
				'numberofgems' => $numberofgems,
				'telnum' => $telnum,
				'materialname' => $materialname,
				'materialimage' => $materialimage,
			));

			if ($joborder and $joborder->save())
			{
				Session::set_flash('success', 'Added joborder #'.$joborder->id.'.');
			}
    }


     public function get_purchaseorder3d($name,$address,$date_schedule,$amount,$deposit,$balance,$metalselection,$gemselection,$laborcost,$weight,$numberofgems,$telnum,$materialname)
    {
        	$joborder = Model_Joborder::forge(array(
				'name' => $name,
				'address' => $address,
				'date_schedule' => $date_schedule,
				'amount' => $amount,
				'deposit' => $deposit,
				'balance' => $balance,
				'metalselection' => $metalselection,
				'gemselection' => $gemselection,
				'laborcost' => $laborcost,
				'weight' => $weight,
				'numberofgems' => $numberofgems,
				'telnum' => $telnum,
				'materialname' => $materialname
			));

			if ($joborder and $joborder->save())
			{
				Session::set_flash('success', 'Added joborder #'.$joborder->id.'.');
			}
    }

    public function get_updatejo($id)
    {
    	$updatejo = DB::select()->from('joborders')->where('id', '=', $id)->as_object()->execute();
    	foreach ($updatejo as $u) {

		echo '<form>
			  <div class="form-group">
			    <label for="email">Gem Cost</label>
			    <input type="text" class="form-control"  id="gemcost" value="'.$u->gemselection.'">
			    <input type="hidden" class="form-control"  id="updatejo_id" value="'.$u->id.'">
			    <input type="hidden" class="form-control"  id="weight" value="'.$u->weight.'">
			    <input type="hidden" class="form-control"  id="numberofgems" value="'.$u->numberofgems.'">
			    <input type="hidden" class="form-control"  id="deposit" value="'.$u->deposit.'">
			    <input type="hidden" class="form-control"  id="laborcost" value="'.$u->laborcost.'">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Metal Cost:</label>
			    <input type="text" class="form-control" id="metalcost"  value="'.$u->metalselection.'">
			  </div>
			</form>';
    	}
    }

    public function get_savejoupdated($id,$gemcost,$metalcost,$weight,$numberofgems,$laborcost,$deposit)
    {

    	$amount =  $laborcost + ( $metalcost *  $weight) + ( $gemcost *  $numberofgems); 
    	$balance =  $amount - $deposit; 

    	$query = DB::update('joborders');
		$query->set(array(
		    'gemselection' => $gemcost,
		    'metalselection' => $metalcost,
		    'balance' => $balance,
		    'amount' => $amount,
		))->where('id',$id)->execute();	
    }

        public function get_ChangePassword($id,$username,$newpassword)
    {

    		$owner 			  = 	Model_Owner::find($id);
			$owner->username  = 	$username;
			$owner->username  = 	$username;
			$owner->username  = 	$username;
			$owner->username  = 	$username;
			$owner->username  = 	$username;
			$owner->password  =		sha1($newpassword);

			if ($owner->save())
			{
				echo 1;
			}else{
				echo 0;
			}


    }

    public function get_status($status,$id)
    {
    	$joborder = Model_Joborder::find($id);
		$joborder->status = $status;
		if ($joborder->save());
    }

    public function get_maxid()
    {
    	
    	$query = DB::query('SELECT max(id) as id FROM joborders')->execute()->get('id');
    	echo $query;
    }
}

 ?>