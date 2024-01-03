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
			array('prompt' => 'Pilih Pasien', 'id' => 'pasien_id', 'onchange' => 'getPasienData();') // Sesuaikan dengan id dropdown
		); ?>
		<?php echo $form->error($model, 'pasien_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'tindakan_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'tindakan_id',
			CHtml::listData(Tindakan::model()->findAll(), 'id', 'nama'), // Ganti model dan kolom yang sesuai
			array('prompt' => 'Pilih Tindakan', 'id' => 'tindakan_id') // Sesuaikan dengan id dropdown
		); ?>
		<?php echo $form->error($model, 'tindakan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'obat_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'obat_id',
			CHtml::listData(Obat::model()->findAll(), 'id', 'nama'), // Ganti model dan kolom yang sesuai
			array('prompt' => 'Pilih Obat', 'id' => 'obat_id') // Sesuaikan dengan id dropdown
		); ?>
		<?php echo $form->error($model, 'obat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'jumlah'); ?>
		<?php echo $form->textField($model, 'jumlah', array('id' => 'jumlah')); ?>
		<?php echo $form->error($model, 'jumlah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'total_harga'); ?>
		<?php echo $form->textField($model, 'total_harga', array('size' => 10, 'maxlength' => 10, 'id' => 'total_harga')); ?>
		<?php echo $form->error($model, 'total_harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	function getPasienData() {
		var pasienId = $("#pasien_id").val();

		$.ajax({
			type: 'GET',
			url: '<?php echo $this->createUrl("transaksi/getPasienData"); ?>',
			data: {
				pasienId: pasienId
			},
			success: function(response) {
				var data = JSON.parse(response.data);

				// Mengakses nilai-nilai dari objek JSON
				var tindakan_id = data.tindakan_id;
				var obat_id = data.obat_id;
				var jumlah = data.jumlah;
				var total_harga = data.total_harga;

				// Mengatur nilai input formulir sesuai dengan data yang diterima
				$("#tindakan_id").val(tindakan_id);
				$("#obat_id").val(obat_id);
				$("#jumlah").val(jumlah);
				$("#total_harga").val(total_harga);

				// Menampilkan hasil dalam konsol atau tempat lain sesuai kebutuhan
				console.log('Tindakan ID:', tindakan_id);
				console.log('Obat ID:', obat_id);
				console.log('Jumlah:', jumlah);
				console.log('Total Harga:', total_harga);
			},
			error: function(xhr, status, error) {
				console.error(error);
			}
		});
	}
</script>