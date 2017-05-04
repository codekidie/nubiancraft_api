<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Materialname', 'materialname', array('class'=>'control-label')); ?>

				<?php echo Form::input('materialname', Input::post('materialname', isset($customjewel) ? $customjewel->materialname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Materialname')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Embed', 'embed', array('class'=>'control-label')); ?>

				<?php echo Form::input('embed', Input::post('embed', isset($customjewel) ? $customjewel->embed : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Embed')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Laborcost', 'laborcost', array('class'=>'control-label')); ?>

				<?php echo Form::input('laborcost', Input::post('laborcost', isset($customjewel) ? $customjewel->laborcost : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Laborcost')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Weight', 'weight', array('class'=>'control-label')); ?>

				<?php echo Form::input('weight', Input::post('weight', isset($customjewel) ? $customjewel->weight : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Weight')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Gemsize', 'gemsize', array('class'=>'control-label')); ?>

				<?php echo Form::input('gemsize', Input::post('gemsize', isset($customjewel) ? $customjewel->gemsize : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Gemsize')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Numberofgems', 'numberofgems', array('class'=>'control-label')); ?>

				<?php echo Form::input('numberofgems', Input::post('numberofgems', isset($customjewel) ? $customjewel->numberofgems : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Numberofgems')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>