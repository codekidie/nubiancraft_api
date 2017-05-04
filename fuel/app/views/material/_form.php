<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Materialname', 'materialname', array('class'=>'control-label')); ?>

				<?php echo Form::input('materialname', Input::post('materialname', isset($material) ? $material->materialname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Materialname')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Materialimage', 'materialimage', array('class'=>'control-label')); ?>

				<?php echo Form::input('materialimage', Input::post('materialimage', isset($material) ? $material->materialimage : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Materialimage')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Material', 'material', array('class'=>'control-label')); ?>

				<?php echo Form::input('material', Input::post('material', isset($material) ? $material->material : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Material')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Cost', 'cost', array('class'=>'control-label')); ?>

				<?php echo Form::input('cost', Input::post('cost', isset($material) ? $material->cost : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Cost')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>