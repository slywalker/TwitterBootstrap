<?php
App::uses('PaginatorHelper', 'View/Helper');

class BootstrapPaginatorHelper extends PaginatorHelper {

	public function pagination($options = array()) {
		$default = array(
			'units' => array('first', 'prev', 'numbers', 'next', 'last'),
			'div' => 'pagination pagination-centered',
		);
		$options += $default;

		$units = $options['units'];
		unset($options['units']);
		$class = $options['div'];
		unset($options['div']);

		$out = array();
		foreach ($units as $unit) {
			if ($unit === 'numbers') {
				$out[] = $this->{$unit}($options);
			} else {
				$out[] = $this->{$unit}(null, $options);
			}
		}
		return $this->Html->div($class, $this->Html->tag('ul', implode("\n", $out)));
	}

	public function pager($options = array()) {
		$default = array(
			'ul' => 'pager',
			'prev' => 'Previous',
			'next' => 'Next',
			'disabled' => 'hide',
		);
		$options += $default;

		$class = $options['ul'];
		unset($options['ul']);
		$prev = $options['prev'];
		unset($options['prev']);
		$next = $options['next'];
		unset($options['next']);

		$out = array();
		$out[] = $this->prev($prev, array_merge($options, array('class' => 'previous')));
		$out[] = $this->next($next, array_merge($options, array('class' => 'next')));

		return $this->Html->tag('ul', implode("\n", $out), compact('class'));
	}

	public function prev($title, $options = array()) {
		$default = array(
			'title' => '<',
			'tag' => 'li',
			'model' => $this->defaultModel(),
			'class' => null,
			'disabled' => 'disabled',
		);
		$options += $default;
		if (empty($title)) {
			$title = $options['title'];
		}
		unset($options['title']);

		$disabled = $options['disabled'];
		$params = (array) $this->params($options['model']);
		if ($disabled === 'hide' && !$params['prevPage']) {
			return null;
		}
		unset($options['disabled']);

		return parent::prev($title, $options, $this->link($title), array_merge($options, array(
			'escape' => false,
			'class' => $disabled,
		)));
	}

	public function next($title, $options = array()) {
		$default = array(
			'title' => '>',
			'tag' => 'li',
			'model' => $this->defaultModel(),
			'class' => null,
			'disabled' => 'disabled',
		);
		$options += $default;
		if (empty($title)) {
			$title = $options['title'];
		}
		unset($options['title']);

		$disabled = $options['disabled'];
		$params = (array) $this->params($options['model']);
		if ($disabled === 'hide' && !$params['nextPage']) {
			return null;
		}
		unset($options['disabled']);

		return parent::next($title, $options, $this->link($title), array_merge($options, array(
			'escape' => false,
			'class' => $disabled,
		)));
	}

	public function numbers($options = array()) {
		$default = array(
			'tag' => 'li',
			'model' => $this->defaultModel(),
			'class' => null,
			'modulus' => '11',
		);
		$options += $default;
		$modulus = $options['modulus'];

		$params = (array) $this->params($options['model']);
		extract($params);

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

		$out = array();
		for ($i = $start; $i < $end; $i++) {
			$url = array('page' => $i);
			$class = null;
			if ($i == $page) {
				$url = array();
				$class = 'active';
			}
			$out[] = $this->Html->tag('li', $this->link($i, $url, $options), compact('class'));
		}
		return implode("\n", $out);
	}

	public function first($title, $options = array()) {
		$default = array(
			'title' => '<<',
			'tag' => 'li',
			'after' => null,
			'model' => $this->defaultModel(),
			'separator' => null,
			'ellipsis' => null,
			'class' => null,
		);
		$options += $default;
		if (empty($title)) {
			$title = $options['title'];
		}
		unset($options['title']);

		return (parent::first($title, $options)) ?: $this->Html->tag(
			$options['tag'],
			$this->link($title, array(), $options),
			array('class' => 'disabled')
		);
	}

	public function last($title, $options = array()) {
		$default = array(
			'title' => '>>',
			'tag' => 'li',
			'after' => null,
			'model' => $this->defaultModel(),
			'separator' => null,
			'ellipsis' => null,
			'class' => null,
		);
		$options += $default;
		if (empty($title)) {
			$title = $options['title'];
		}
		unset($options['title']);

		$params = (array) $this->params($options['model']);

		return (parent::last($title, $options)) ?: $this->Html->tag(
			$options['tag'],
			$this->link($title, array(), $options),
			array('class' => 'disabled')
		);
	}

}
