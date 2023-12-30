<?php
/* @var $this TransaksiController */
/* @var $data Transaksi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pasien_id')); ?>:</b>
	<?php echo CHtml::encode($data->pasien->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tindakan_id')); ?>:</b>
	<?php echo CHtml::encode($data->tindakan->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obat_id')); ?>:</b>
	<?php echo CHtml::encode($data->obat->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_harga')); ?>:</b>
	<?php echo CHtml::encode($data->total_harga); ?>
	<br />


</div>