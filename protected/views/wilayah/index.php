<?php
/* @var $this WilayahController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wilayahs',
);

$this->menu=array(
	array('label'=>'Create Wilayah', 'url'=>array('create')),
	array('label'=>'Manage Wilayah', 'url'=>array('admin')),
);
?>

<h1>Wilayahs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
