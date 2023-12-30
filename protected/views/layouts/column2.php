<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div id="content">
				<?php echo $content; ?>
			</div><!-- content -->
		</div>
		<div class="col-md-3">
			<div id="sidebar">
				<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title' => 'Operations',
				));
				$this->widget('zii.widgets.CMenu', array(
					'items' => $this->menu,
					'htmlOptions' => array('class' => 'operations list-group'),
					'itemCssClass' => 'list-group-item',
				));
				$this->endWidget();
				?>
			</div><!-- sidebar -->
		</div>
	</div>
</div>

<?php $this->endContent(); ?>