<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Inflector', 'Utility');

class BootstrapHtmlHelper extends AppHelper {

	public $helpers = array('Html');

	public function css($url = 'bootstrap.min.css', $rel = null, $options = array()) {
		$pluginRoot = dirname(dirname(__DIR__));
		$pluginName = end(explode(DS, $pluginRoot));

		$url = '/' . Inflector::underscore($pluginName) . '/css/' . $url;
		return $this->Html->css($url, $rel, $options);
	}

	public function script($url = 'bootstrap.min.js', $options = array()) {
		$pluginRoot = dirname(dirname(__DIR__));
		$pluginName = end(explode(DS, $pluginRoot));

		$url = '/' . Inflector::underscore($pluginName) . '/js/' . $url;
		return $this->Html->script($url, $options);
	}

	public function breadcrumb($items, $options = array()) {
		$default = array(
			'class' => 'breadcrumb',
		);
		$options += $default;

		$count = count($items);
		$li = array();
		for ($i=0; $i < $count - 1; $i++) {
			$text = $items[$i];
			$text .= '&nbsp;<span class="divider">/</span>';
			$li[] = $this->Html->tag('li', $text);
		}
		$li[] = $this->Html->tag('li', end($items), array('class' => 'active'));
		return $this->Html->tag('ul', implode("\n", $li), $options);
	}

}