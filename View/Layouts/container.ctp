<?php $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework'); ?>

<!DOCTYPE html>
<html lang="ja-JP">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>

	<?php echo $this->Html->meta('icon'); ?>

	<?php echo $this->Html->css('/twitter_bootstrap/css/bootstrap.min'); ?>
	<style type="text/css">
		body {padding-top: 50px;}
	</style>

	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<?php echo $this->Html->script(array(
		'/twitter_bootstrap/js/bootstrap-alerts.js',
		'/twitter_bootstrap/js/bootstrap-dropdown.js',
	)); ?>
	<?php echo $scripts_for_layout; ?>
</head>
<body>
	<div class="topbar" data-dropdown="dropdown">
		<div class="fill">
			<div class="container">
				<?php echo $this->Html->link($cakeDescription, 'http://cakephp.org', array(
					'class' => 'brand',
				)); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="page-header">
			<h1><?php echo __($title_for_layout); ?></h1>
		</div>
	</div>
	<div class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $content_for_layout; ?>
	</div>
	<div class="footer">
		<div class="fill">
			<div class="container">
				<p>
					<?php echo $this->Html->link(
						$this->Html->image('cake.power.gif', array(
							'alt'=> $cakeDescription,
						)),
						'http://www.cakephp.org/',
						array(
							'target' => '_blank',
							'escape' => false,
						)
					); ?>
				</p>
			</div>
		</div>
	</div>
	<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
</body>
</html>