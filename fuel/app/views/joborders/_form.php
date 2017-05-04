<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($joborder) ? $joborder->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Address', 'address', array('class'=>'control-label')); ?>

				<?php echo Form::input('address', Input::post('address', isset($joborder) ? $joborder->address : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Address')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Date', 'date', array('class'=>'control-label')); ?>

				<?php echo Form::input('date', Input::post('date', isset($joborder) ? $joborder->date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Amount', 'amount', array('class'=>'control-label')); ?>

				<?php echo Form::input('amount', Input::post('amount', isset($joborder) ? $joborder->amount : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Amount')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($joborder) ? $joborder->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Deposit', 'deposit', array('class'=>'control-label')); ?>

				<?php echo Form::input('deposit', Input::post('deposit', isset($joborder) ? $joborder->deposit : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Deposit')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Balance', 'balance', array('class'=>'control-label')); ?>

				<?php echo Form::input('balance', Input::post('balance', isset($joborder) ? $joborder->balance : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Balance')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Conform', 'conform', array('class'=>'control-label')); ?>

				<?php echo Form::input('conform', Input::post('conform', isset($joborder) ? $joborder->conform : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Conform')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Recievedby', 'recievedby', array('class'=>'control-label')); ?>

				<?php echo Form::input('recievedby', Input::post('recievedby', isset($joborder) ? $joborder->recievedby : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Recievedby')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Claimedby', 'claimedby', array('class'=>'control-label')); ?>

				<?php echo Form::input('claimedby', Input::post('claimedby', isset($joborder) ? $joborder->claimedby : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Claimedby')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>