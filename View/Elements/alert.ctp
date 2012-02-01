<?php
if (!isset($class)) {
	$class = false;
}
if (!isset($close)) {
	$close = true;
}
?>
<div class="alert<?php echo ($class) ? ' ' . $class : null; ?>"<?php echo ($close) ? ' data-alert="close"' : null; ?>>
<?php if ($close): ?>
	<a class="close" href="#">×</a>
<?php endif; ?>
	<p><?php echo $message; ?></p>
</div>