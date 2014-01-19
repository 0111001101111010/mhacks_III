<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'appointment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'patient'); ?>
		<?php $model->patient = $_GET['patient_id']; ?>
		<?php echo $form->hiddenField($model,'patient'); ?>
		<?php //echo $form->error($model,'patient'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doctor'); ?>
		<?php echo $form->dropDownList($model,'doctor', CHtml::listData(Doctor::model()->findAll(), 'id', 'last_name'), array('empty'=>'Select doctor')); ?>
		<?php echo $form->error($model,'doctor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'model' => $model,
				    'attribute' => 'date',
					'options' => array(
					        'showOn' => 'both',             // also opens with a button
					        'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
					        'showOtherMonths' => true,      // show dates in other months
					        'selectOtherMonths' => true,    // can seelect dates in other months
					        'changeYear' => true,           // can change year
					        'changeMonth' => true,          // can change month
					        'yearRange' => '2000:2099',     // range of year
					        'minDate' => '2000-01-01',      // minimum date
					        'maxDate' => '2099-12-31',      // maximum date
					        'showButtonPanel' => true,      // show button panel
					    ),				    
				    'htmlOptions' => array(
				        'size' => '10',         // textField size
				        'maxlength' => '10',    // textField maxlength
				    ),
				));
				?>
		<?php echo $form->error($model,'date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php
		
		$this->widget(
		    'bootstrap.widgets.TbTimePicker',
		    array(
		        'model' =>$model,
		        'attribute' => 'time',
		    )
		);
		
		?>
		<?php
		/*
			$form = $this->beginWidget(
			    'bootstrap.widgets.TbActiveForm',
			    array('type' => 'vertical')
			);
			echo $form->timepickerRow(
			    $model,
			    'time'
				);
			$this->endWidget();
			*/
		?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textField($model,'comments',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_user'); ?>
		<?php echo $form->textField($model,'create_user'); ?>
		<?php echo $form->error($model,'create_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_user'); ?>
		<?php echo $form->textField($model,'update_user'); ?>
		<?php echo $form->error($model,'update_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->