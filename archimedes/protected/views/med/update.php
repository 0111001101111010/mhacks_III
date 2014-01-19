<?php
/* @var $this MedController */
/* @var $model Med */

$this->breadcrumbs=array(
	'Meds'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Med', 'url'=>array('index')),
	array('label'=>'Create Med', 'url'=>array('create')),
	array('label'=>'View Med', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Med', 'url'=>array('admin')),
);
?>

<h1>Update Med <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>