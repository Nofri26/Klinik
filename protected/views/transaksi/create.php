<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */

$this->breadcrumbs=array(
	'Transaksis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Transaksi', 'url'=>array('index')),
	array('label'=>'Manage Transaksi', 'url'=>array('admin')),
);
?>

<h1>Create Transaksi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>