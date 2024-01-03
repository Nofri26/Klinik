<?php
/* @var $this PasienController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
	'Pasiens',
);

$this->menu = array(
	array('label' => 'Daftarkan Pasien', 'url' => array('create')),
	array('label' => 'Manage Pasien', 'url' => array('admin')),
	array('label' => 'Grafik Pasien Wilayah', 'url' => array('grafikPasienWilayah'))
);
?>

<h1>Pasiens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>