<?php
/* @var $this MedController */
/* @var $model Med */

$this->breadcrumbs=array(
	'Meds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Med', 'url'=>array('index')),
	array('label'=>'Create Med', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('med-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Meds</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'med-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'brand',
		'name',
		'administration_type',
		'type',
		'dosage',
		/*
		'frequency',
		'intervals',
		'create_user',
		'create_time',
		'update_user',
		'update_time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
