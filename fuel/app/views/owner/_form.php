<input type="hidden" id="id" value="<?php echo $owner->id; ?>">
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Firstname', 'firstname', array('class'=>'control-label')); ?>

				<?php echo Form::input('firstname', Input::post('firstname', isset($owner) ? $owner->firstname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Firstname')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lastname', 'lastname', array('class'=>'control-label')); ?>

				<?php echo Form::input('lastname', Input::post('lastname', isset($owner) ? $owner->lastname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lastname')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Phone', 'phone', array('class'=>'control-label')); ?>

				<?php echo Form::input('phone', Input::post('phone', isset($owner) ? $owner->phone : ''), array('class' => 'col-md-4 form-control','id'=> 'phone', 'placeholder'=>'Phone')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

				<?php echo Form::input('username', Input::post('username', isset($owner) ? $owner->username : ''), array('class' => 'col-md-4 form-control','id'=> 'username',  'placeholder'=>'Username')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', isset($owner) ? $owner->password : ''), array('class' => 'col-md-4 form-control','id'=> 'newpassword',  'placeholder'=>'Password')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<span class="btn btn-primary" id="ownerbtn" onclick="updateOwner()"> Save </span>
			<?php //echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary','id'=> 'ownerbtn')); ?>		</div>
	</fieldset>
