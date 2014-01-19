<?php
/* @var $this CaretakerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Caretakers',
);

$this->menu=array(
	array('label'=>'Create Caretaker', 'url'=>array('create')),
	array('label'=>'Manage Caretaker', 'url'=>array('admin')),
);
?>

<h1>Caretakers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
