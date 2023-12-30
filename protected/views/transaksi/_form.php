<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'transaksi-form',
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'pasien_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'pasien_id',
			CHtml::listData(Pasien::model()->findAll(), 'id', 'nama'), // Ganti model dan kolom yang sesuai
			array('prompt' => 'Pilih Pasien')
		); ?>
		<?php echo $form->error($model, 'pasien_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'tindakan_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'tindakan_id',
			CHtml::listData(Tindakan::model()->findAll(), 'id', 'nama'), // Ganti model dan kolom yang sesuai
			array('prompt' => 'Pilih Tindakan')
		); ?>
		<?php echo $form->error($model, 'tindakan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'obat_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'obat_id',
			CHtml::listData(Obat::model()->findAll(), 'id', 'nama'), // Ganti model dan kolom yang sesuai
			array('prompt' => 'Pilih Obat')
		); ?>
		<?php echo $form->error($model, 'obat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'jumlah'); ?>
		<?php echo $form->textField($model, 'jumlah'); ?>
		<?php echo $form->error($model, 'jumlah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'total_harga'); ?>
		<?php echo $form->textField($model, 'total_harga', array('size' => 10, 'maxlength' => 10)); ?>
		<?php echo $form->error($model, 'total_harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->