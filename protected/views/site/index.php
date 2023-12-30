<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div class="jumbotron">
	<h1>Selamat datang di <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
	<p class="lead">Klinik Sehat - Layanan Kesehatan Terbaik untuk Anda</p>
</div>

<div class="row">
	<div class="col-md-6">
		<h2>Layanan Kesehatan Unggul</h2>
		<p>Di Klinik Sehat, kami menyediakan layanan kesehatan berkualitas tinggi. Tim medis kami yang berpengalaman siap membantu Anda dalam menjaga dan meningkatkan kesehatan.</p>
		<p><a class="btn btn-primary" href="<?php echo $this->createUrl('site/page', array('view' => 'layanan')); ?>" role="button">Lihat Layanan &raquo;</a></p>
	</div>
	<div class="col-md-6">
		<h2>Jadwal Praktik dan Pendaftaran</h2>
		<p>Cek jadwal praktik dokter kami dan daftarkan diri Anda secara online. Kami memberikan kemudahan akses untuk memastikan Anda mendapatkan perawatan yang tepat waktu.</p>
		<p><a class="btn btn-info" href="<?php echo $this->createUrl('site/page', array('view' => 'jadwal')); ?>" role="button">Jadwal dan Pendaftaran &raquo;</a></p>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h2>Tentang Klinik Sehat</h2>
		<p>Kenali lebih dekat Klinik Sehat dan nilai-nilai kami dalam memberikan pelayanan kesehatan. Kami berkomitmen untuk memberikan perawatan yang ramah dan profesional.</p>
		<p><a class="btn btn-success" href="<?php echo $this->createUrl('site/page', array('view' => 'tentang')); ?>" role="button">Pelajari Lebih Lanjut &raquo;</a></p>
	</div>
</div>