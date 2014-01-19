<?php
/* @var $this MedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Meds',
);

$this->menu=array(
	array('label'=>'Create Med', 'url'=>array('create')),
	array('label'=>'Manage Med', 'url'=>array('admin')),
);
?>

<h1>Meds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
