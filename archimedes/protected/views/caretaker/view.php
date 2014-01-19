<?php
/* @var $this CaretakerController */
/* @var $model Caretaker */

$this->breadcrumbs=array(
	'Caretakers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Caretaker', 'url'=>array('index')),
	array('label'=>'Create Caretaker', 'url'=>array('create')),
	array('label'=>'Update Caretaker', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Caretaker', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Caretaker', 'url'=>array('admin')),
);
?>

<h1>View Caretaker #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'username',
		'password',
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
