<?php
/* @var $this PatientController */
/* @var $model Patient */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Patient', 'url'=>array('index')),
	array('label'=>'Create Patient', 'url'=>array('create')),
	array('label'=>'Update Patient', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Patient', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Patient', 'url'=>array('admin')),
);
?>

<h1>View Patient #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_specific_client',
		'first_name',
		'last_name',
		'phone_number',
		'email',
		'address',
		'city',
		array(               // related city displayed as a link
            'label'=>'State',
            'type'=>'raw',
            'value'=>CHtml::encode($model->state0->name),
                                 
        ),
		'zip_code',
		//'create_user',
		//'create_time',
		//'update_user',
		//'update_time',
	),
)); ?>

<h1>Appointments</h1>

<!-- NEW APPOINTMENT MODAL -->
<?php echo CHtml::link('New',  array("/appointment/create?patient_id={$model->id}"),
	array(
		'class'=>'btn btn-success',
	));
?>

<!-- END NEW APPOINTMENT -->


<?php
$gridColumns = array(
	array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
	array('name'=>'doctor', 'header'=>'Doctor', 'value'=>$model->doctor0->last_name),
	array('name'=>'date', 'header'=>'Date'),
	array('name'=>'time', 'header'=>'Time'),
	array('name'=>'location', 'header'=>'Location'),
	array(
		'htmlOptions' => array('nowrap'=>'nowrap'),
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'viewButtonUrl'=>null,
		'updateButtonUrl'=>null,
		'deleteButtonUrl'=>null,
	)
);
//var_dump($gridDataProvider);
$patient = new Patient();

$this->widget('bootstrap.widgets.TbGridView', array(
        'type' => 'striped bordered condensed',
        'dataProvider' => $gridDataProvider,
        'template' => "{items}",
        //'filter' => $patient->search(),
        'columns' => $gridColumns,
    ));
    
?>

<h1>Prescriptions</h1>
<div class='row-fluid'>
			<?php $medsform = $this->beginWidget('CActiveForm', array(
				'id'=>'meds_form',
				'htmlOptions'=>array('class'=>'form form-horizontal'),
				'enableAjaxValidation'=>false,
			)); ?>
			<?php echo CHtml::hiddenField('patient_id', $model->id); ?>
			<?php echo CHtml::hiddenField('med_id', ''); ?>
			<div class="input-append">
				<?php
					$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'med_name',
					'model'=>$model,
					//'attribute'=>'customer_name',
					'source'=>$this->createUrl('med/search'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
					            'showAnim'=>'fold',
					            'select'=>"js:function( event, ui ) {
					                $('#med_id').val(ui.item.id);
					                $('#med_name').val('');

					            }",
					            'change'=>"js:function( event, ui ){
					            	$('#med_id').val(ui.item.id);
					            	$('#med_name').val('');
					            }",
					),
					'htmlOptions'=>array('class'=>'span12', 'placeholder'=>'Start typing the name'),
					));
				?>
				<?php echo CHtml::htmlButton('+', array('onclick'=>'assignMed();', 'class'=>'btn btn-default')); ?>
				<?php $this->endWidget(); ?>
		</div>

<?php
$medColumns = array(
	array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
	array('name'=>'brand', 'header'=>'Brand'),
	array('name'=>'name', 'header'=>'Name'),
	//array('name'=>'time', 'header'=>'Time'),
	//array('name'=>'location', 'header'=>'Location'),
	array(
		'htmlOptions' => array('nowrap'=>'nowrap'),
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'viewButtonUrl'=>null,
		'updateButtonUrl'=>null,
		'deleteButtonUrl'=>null,
	)
);
//var_dump($gridDataProvider);
//$patient = new Patient();

$this->widget('bootstrap.widgets.TbGridView', array(
        'type' => 'striped bordered condensed',
        'id'=>'meds-grid',
        'dataProvider' => $medsDataProvider,
        'template' => "{items}",
        //'filter' => $patient->search(),
        'columns' => $medColumns,
    ));
    
?>

<!-- DIalog -->

	<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'dialogAppointment',
		'options'=>array(
			'title'=>'New Appointment',
			'autoOpen'=>false,
			'model'=>true,
			'width'=>600,
			'height'=>500,
		),
	)); ?>
	<div class="divForForm"></div>
	<?php $this->endWidget(); ?>
<!-- Dialog -->



<script>
	function assignMed()
	{
		var data = $('#meds_form').serialize();
		$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->createAbsoluteUrl("patient/assignmed");?>',
			data: data,
			success: function(data)
			{
				/*$('#assignedMeds').append("<div class='alert alert-info span2'><button type='button' onclick='deassignMed(" + data.id + ")' class='close' data-dismiss='alert'>×</button>" + data.name + "</div>");*/
				$.fn.yiiGridView.update('meds-grid');
			},
			error: function()
			{
				alert("An error has occurred. Med was not assigned.");
			},
			dataType: 'json',
		})
	}

	function deassignMed(id)
	{
		var data = "med_id="+id+"&patient_id=" + '<?php echo $model->id?>';

		$.ajax({

			type: 'GET',
			url: '<?php echo Yii::app()->createAbsoluteUrl("patient/deassignmed");?>',
			data: data,
			success: function(data)
			{
				$('#alert' + id).alert('close');

			},
			error: function()
			{
				alert("An error has occurred. Med was no deassigned.");

			},
			dataType: 'json',
		});
	}

		
</script>