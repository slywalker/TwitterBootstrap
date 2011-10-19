<?php
if (!isset($class)) {
	$class = 'warning';
}
if (!isset($close)) {
	$close = true;
}
?>
<div class="alert-message <?php echo $class; ?>" data-alert="close">
<?php if ($close): ?>
	<a class="close" href="#">×</a>
<?php endif; ?>
	<p><?php echo $message; ?></p>
</div>