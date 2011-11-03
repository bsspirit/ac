<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-5 last">
		<div id="sidebar">
		<?php 
			$this->widget('application.widgets.sideWidget',array(
				'pages'=>$this->menu,
			));
		?>
		</div>
	</div>
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>