<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs = array(
	'Pasiens' => array('index'),
	'Manage',
);

$this->menu = array(
	array('label' => 'List Pasien', 'url' => array('index')),
	array('label' => 'Daftarkan Pasien', 'url' => array('create')),
	array('label' => 'Grafik Pasien Wilayah', 'url' => array('grafikPasienWilayah')), // Tambahkan menu untuk grafik
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pasien-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pasiens</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'pasien-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'nama',
		'nik',
		'tanggal_lahir',
		array(
			'name' => 'wilayah_id',
			'value' => '$data->wilayah->nama',
		),
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>