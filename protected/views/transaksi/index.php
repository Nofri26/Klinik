<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Transaksis',
);

$this->menu=array(
	array('label'=>'Create Transaksi', 'url'=>array('create')),
	array('label'=>'Manage Transaksi', 'url'=>array('admin')),
);
?>

<h1>Transaksis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
