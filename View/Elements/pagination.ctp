<?php
if (!isset($modules)) {
	$modulus = 11;
}
if (!isset($model)) {
	$models = ClassRegistry::keys();
	$model = Inflector::camelize(current($models));
}
?>
<div class="pagination">
	<ul>
		<?php echo $this->Paginator->first('<<', array('tag' => 'li')); ?>
		<?php echo $this->Paginator->prev('<', array(
			'tag' => 'li',
			'class' => 'prev',
		), $this->Paginator->link('<', array()), array(
			'tag' => 'li',
			'escape' => false,
			'class' => 'prev disabled',
		)); ?>
		<?php
		$page = $this->params['paging'][$model]['page'];
		$pageCount = $this->params['paging'][$model]['pageCount'];
		if ($modulus > $pageCount) {
			$modulus = $pageCount;
		}
		$start = $page - intval($modulus / 2);
		if ($start < 1) {
			$start = 1;
		}
		$end = $start + $modulus;
		if ($end > $pageCount) {
			$end = $pageCount + 1;
			$start = $end - $modulus;
		}
		for ($i = $start; $i < $end; $i++) {
			$url = array('page' => $i);
			$class = null;
			if ($i == $page) {
				$url = array();
				$class = 'active';
			}
			echo $this->Html->tag('li', $this->Paginator->link($i, $url), array(
				'class' => $class,
			));
		}
		?>
		<?php echo $this->Paginator->next('>', array(
			'tag' => 'li',
			'class' => 'next',
		), $this->Paginator->link('>', array()), array(
			'tag' => 'li',
			'escape' => false,
			'class' => 'next disabled',
		)); ?>
		<?php echo str_replace('<>', '', $this->Html->tag('li', $this->Paginator->last('>>', array(
			'tag' => null,
		)), array(
			'class' => 'next',
		))); ?>
	</ul>
</div>