<?php
/* @var $this WilayahController */
/* @var $model Wilayah */

$this->breadcrumbs=array(
	'Wilayahs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Wilayah', 'url'=>array('index')),
	array('label'=>'Create Wilayah', 'url'=>array('create')),
	array('label'=>'Update Wilayah', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Wilayah', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wilayah', 'url'=>array('admin')),
);
?>

<h1>View Wilayah #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>
