<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'pasien-form',
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'nama'); ?>
		<?php echo $form->textField($model, 'nama', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'tanggal_lahir'); ?>
		<?php
		// Menggunakan widget datepicker untuk memilih tanggal
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'tanggal_lahir',
			'language' => 'en', // Ganti dengan kode bahasa yang sesuai
			'options' => array(
				'showAnim' => 'fold',
				'dateFormat' => 'yy-mm-dd',
			),
			'htmlOptions' => array(
				'size' => '10',
			),
		));
		?>
		<?php echo $form->error($model, 'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'wilayah_id'); ?>
		<?php
		// Menggunakan widget dropdownlist untuk memilih wilayah
		echo $form->dropDownList(
			$model,
			'wilayah_id',
			CHtml::listData(Wilayah::model()->findAll(), 'id', 'nama'), // Ganti model dan kolom yang sesuai
			array('prompt' => 'Pilih Wilayah')
		);
		?>
		<?php echo $form->error($model, 'wilayah_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->