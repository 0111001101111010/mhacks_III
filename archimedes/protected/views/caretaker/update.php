<?php
/* @var $this CaretakerController */
/* @var $model Caretaker */

$this->breadcrumbs=array(
	'Caretakers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Caretaker', 'url'=>array('index')),
	array('label'=>'Create Caretaker', 'url'=>array('create')),
	array('label'=>'View Caretaker', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Caretaker', 'url'=>array('admin')),
);
?>

<h1>Update Caretaker <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>