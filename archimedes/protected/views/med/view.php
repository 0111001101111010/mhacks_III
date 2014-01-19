<?php
/* @var $this MedController */
/* @var $model Med */

$this->breadcrumbs=array(
	'Meds'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Med', 'url'=>array('index')),
	array('label'=>'Create Med', 'url'=>array('create')),
	array('label'=>'Update Med', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Med', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Med', 'url'=>array('admin')),
);
?>

<h1>View Med #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'brand',
		'name',
		'administration_type',
		'type',
		'dosage',
		'frequency',
		'intervals',
		'create_user',
		'create_time',
		'update_user',
		'update_time',
	),
)); ?>
