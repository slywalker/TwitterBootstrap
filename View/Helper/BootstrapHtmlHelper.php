<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Inflector', 'Utility');

class BootstrapHtmlHelper extends AppHelper {

	public $helpers = array('Html');

	public function css($url = 'bootstrap.min', $rel = null, $options = array()) {
		$pluginRoot = dirname(dirname(__DIR__));
		$pluginName = end(explode(DS, $pluginRoot));

		$url = '/' . Inflector::underscore($pluginName) . '/css/' . $url;
		return $this->Html->css($url, $rel, $options);
	}

	public function script($url = 'all', $options = array()) {
		$pluginRoot = dirname(dirname(__DIR__));
		$pluginName = end(explode(DS, $pluginRoot));
		$jsPath = $pluginRoot . DS . 'webroot' . DS . 'js' . DS;

		if ($url === 'all') {
			$url = array();
			foreach (glob($jsPath . '*') as $js) {
				$url[] = basename($js);
			}
		}
		$url = (array) $url;
		array_walk($url, function(&$value) use ($pluginName) {
			$value = '/' . Inflector::underscore($pluginName) . '/js/' . $value;
		});
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