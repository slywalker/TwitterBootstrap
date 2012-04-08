<div class="row-fluid">
	<div class="span9">
		<h2><?php echo "<?php echo __('List %s', __('{$pluralHumanName}'));?>";?></h2>

		<p>
			<?php echo "<?php echo \$this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>\n";?>
		</p>

		<table class="table">
			<tr>
<?php  foreach ($fields as $field):?>
				<th><?php echo "<?php echo \$this->BootstrapPaginator->sort('{$field}');?>";?></th>
<?php endforeach;?>
				<th class="actions"><?php echo "<?php echo __('Actions');?>";?></th>
			</tr>
<?php
echo "\t\t<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
echo "\t\t\t<tr>\n";
	foreach ($fields as $field) {
		$isKey = false;
		if (!empty($associations['belongsTo'])) {
			foreach ($associations['belongsTo'] as $alias => $details) {
				if ($field === $details['foreignKey']) {
					$isKey = true;
					echo "\t\t\t\t<td>\n\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t\t</td>\n";
					break;
				}
			}
		}
		if ($isKey !== true) {
			echo "\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
		}
	}

	echo "\t\t\t\t<td class=\"actions\">\n";
	echo "\t\t\t\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
 	echo "\t\t\t\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
 	echo "\t\t\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
	echo "\t\t\t\t</td>\n";
echo "\t\t\t</tr>\n";

echo "\t\t<?php endforeach; ?>\n";
?>
		</table>

		<?php echo "<?php echo \$this->BootstrapPaginator->pagination(); ?>\n"; ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo "<?php echo __('Actions'); ?>"; ?></li>
			<li><?php echo "<?php echo \$this->Html->link(__('New %s', __('" . $singularHumanName . "')), array('action' => 'add')); ?>";?></li>
<?php
			$done = array();
			foreach ($associations as $type => $data) {
				foreach ($data as $alias => $details) {
					if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
						echo "\t\t\t<li><?php echo \$this->Html->link(__('List %s', __('" . Inflector::humanize($details['controller']) . "')), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
						echo "\t\t\t<li><?php echo \$this->Html->link(__('New %s', __('" . Inflector::humanize(Inflector::underscore($alias)) . "')), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
						$done[] = $details['controller'];
					}
				}
			}
?>
		</ul>
		</div>
	</div>
</div>