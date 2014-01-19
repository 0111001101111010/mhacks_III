<?php
/* @var $this CaretakerController */
/* @var $model Caretaker */

$this->breadcrumbs=array(
	'Caretakers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Caretaker', 'url'=>array('index')),
	array('label'=>'Manage Caretaker', 'url'=>array('admin')),
);
?>

<h1>Create Caretaker</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>