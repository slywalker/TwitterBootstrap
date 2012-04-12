<?php
$id = $this->fetch('modalId');
$title = $this->fetch('modalTitle');
$footer = $this->fetch('modalFooter');
?>
<div class="modal" id="<?php echo $id; ?>">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3><?php echo $title; ?></h3>
	</div>
	<div class="modal-body">
		<?php echo $this->fetch('content'); ?>
	</div>
<?php if ($footer): ?>
	<div class="modal-footer">
		<?php echo $footer; ?>
	</div>
<?php endif; ?>
</div>