<?php
/* @var $this MedController */
/* @var $model Med */

$this->breadcrumbs=array(
	'Meds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Med', 'url'=>array('index')),
	array('label'=>'Manage Med', 'url'=>array('admin')),
);
?>

<h1>Create Med</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>