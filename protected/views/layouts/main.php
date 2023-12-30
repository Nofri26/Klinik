<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="language" content="en">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container" id="page">

		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo Yii::app()->homeUrl; ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php $this->widget('zii.widgets.CMenu', array(
						'items' => array(
							array('label' => 'Home', 'url' => array('/site/index')),
							array('label' => 'User', 'url' => array('/User/index')),
							array('label' => 'Pasien', 'url' => array('/Pasien/index')),
							array('label' => 'Tindakan', 'url' => array('/Tindakan/index')),
							array('label' => 'Obat', 'url' => array('/Obat/index')),
							array('label' => 'Transaksi', 'url' => array('/Transaksi/index')),
							array('label' => 'Wilayah', 'url' => array('/Wilayah/index')),
							array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
							array('label' => 'Contact', 'url' => array('/site/contact')),
							array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
							array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
						),
						'htmlOptions' => array('class' => 'nav navbar-nav'),
					)); ?>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		<?php if (isset($this->breadcrumbs)) : ?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links' => $this->breadcrumbs,
			)); ?>
		<?php endif ?>

		<?php echo $content; ?>

		<div class="clear"></div>

		<div id="footer">
			<footer class="footer">
				<div class="container">
					<p class="text-muted">Copyright &copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved. <?php echo Yii::powered(); ?></p>
				</div>
			</footer>
		</div><!-- /#footer -->

	</div><!-- /#page -->

	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>