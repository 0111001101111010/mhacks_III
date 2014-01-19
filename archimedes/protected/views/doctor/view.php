<?php
/* @var $this DoctorController */
/* @var $model Doctor */

$this->breadcrumbs=array(
	'Doctors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Doctor', 'url'=>array('index')),
	array('label'=>'Create Doctor', 'url'=>array('create')),
	array('label'=>'Update Doctor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Doctor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Doctor', 'url'=>array('admin')),
);
?>

<h1>View Doctor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'phone_number',
		'email',
		'address',
		'city',
		'state',
		'zip_code',
		'create_user',
		'create_time',
		'update_user',
		'update_time',
	),
)); ?>

<h1>Appointments</h1>

<?php
$gridColumns = array(
	array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
	array('name'=>'doctor', 'header'=>'Doctor'),
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
//$patient = new Patient();

$this->widget('bootstrap.widgets.TbGridView', array(
        'type' => 'striped bordered condensed',
        'dataProvider' => $gridDataProvider,
        'template' => "{items}",
        //'filter' => $patient->search(),
        'columns' => $gridColumns,
    ));
