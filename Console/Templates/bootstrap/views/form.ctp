<div class="row-fluid">
	<div class="span9">
		<?php echo "<?php echo \$this->BootstrapForm->create('{$modelClass}', array('class' => 'form-horizontal'));?>\n";?>
			<fieldset>
				<legend><?php echo "<?php echo __('" . Inflector::humanize($action) . " %s', __('" . $singularHumanName . "')); ?>"; ?></legend>
<?php
				echo "\t\t\t\t<?php\n";
				$id = null;
				foreach ($fields as $field) {
					if (strpos($action, 'add') !== false && $field == $primaryKey) {
						continue;
					} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
						if ($field == $primaryKey) {
							$id = "\t\t\t\techo \$this->BootstrapForm->hidden('{$field}');\n";
						} else {
							if($this->templateVars['schema'][$field]['null'] == false){
								$required = ", array(\n\t\t\t\t\t'required' => 'required',\n\t\t\t\t\t'helpInline' => '<span class=\"label label-important\">' . __('Required') . '</span>&nbsp;')\n\t\t\t\t";
							} else {
								$required = null;
							}
							echo "\t\t\t\techo \$this->BootstrapForm->input('{$field}'{$required});\n";
						}
					}
				}
				echo $id;
				unset($id);
				if (!empty($associations['hasAndBelongsToMany'])) {
					foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
						echo "\t\t\t\techo \$this->BootstrapForm->input('{$assocName}');\n";
					}
				}
				echo "\t\t\t\t?>\n";
				echo "\t\t\t\t<?php echo \$this->BootstrapForm->submit(__('Submit'));?>\n";
?>
			</fieldset>
		<?php
			echo "<?php echo \$this->BootstrapForm->end();?>\n";
		?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo "<?php echo __('Actions'); ?>"; ?></li>
<?php if (strpos($action, 'add') === false): ?>
			<li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>";?></li>
<?php endif;?>
			<li><?php echo "<?php echo \$this->Html->link(__('List %s', __('" . $pluralHumanName . "')), array('action' => 'index'));?>";?></li>
<?php
	$done = array();
	foreach ($associations as $type => $data) {
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
				echo "\t\t\t<li><?php echo \$this->Html->link(__('List %s', __('" . Inflector::humanize($details['controller']) . "')), array('controller' => '{$details['controller']}', 'action' => 'index')); ?></li>\n";
				echo "\t\t\t<li><?php echo \$this->Html->link(__('New %s', __('" . Inflector::humanize(Inflector::underscore($alias)) . "')), array('controller' => '{$details['controller']}', 'action' => 'add')); ?></li>\n";
				$done[] = $details['controller'];
			}
		}
	}
?>
		</ul>
		</div>
	</div>
</div>