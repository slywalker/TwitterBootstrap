<?php
App::uses('HtmlHelper', 'View/Helper');
App::uses('Inflector', 'Utility');

class BootstrapHtmlHelper extends HtmlHelper {

	const ICON_PREFIX = 'icon-';

	const GLYPH_PREFIX = 'glyph-';

	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		if (!empty($settings['configFile'])) {
			$this->loadConfig($settings['configFile']);
		} else {
			$this->loadConfig('TwitterBootstrap.html5_tags');
		}
	}

	public function beginRow($fluid = true) {
		$clss = 'row';

		if($fluid) {
			$clss .= '-fluid';
		}

		return "\n" . '<div class="'.$clss.'">';
	}

	public function endRow() {
		return "\n</div>";
	}

	public function glyphLink($title, $url = null, $options = array(), $confirmMessage = false) {
		$options['glyph'] = true;

		return $this->link($title, $url, $options, $confirmMessage);
	}

	public function icon($class, $useGlyph = false) {
		$class = explode(' ', $class);
		foreach ($class as &$_class) {
			if ($_class) {
				$_class = ($useGlyph ? self::GLYPH_PREFIX : self::ICON_PREFIX) . $_class;
			} else {
				unset($_class);
			}
		}
		return '<i class="' . implode(' ', $class) . '"></i>';
	}

	public function link($title, $url = null, $options = array(), $confirmMessage = false) {
		$default = array('icon' => null, 'escape' => true, 'glyph' => false);
		$options = array_merge($default, (array)$options);
		if ($options['icon']) {
			if ($options['escape']) {
				$title = h($title);
			}
			$title = $this->icon($options['icon'], $options['glyph']) . ' ' . $title;
			$options['escape'] = false;
			unset($options['icon'], $options['glyph']);
		}
		return parent::link($title, $url, $options, $confirmMessage);
	}

	public function css($url = null, $rel = null, $options = array()) {
		if (empty($url)) {
			$url = 'bootstrap.min.css';
			$pluginRoot = dirname(dirname(DIRNAME(__FILE__)));
			$pluginName = end(explode(DS, $pluginRoot));
			$url = '/' . Inflector::underscore($pluginName) . '/css/' . $url;
		}
		return parent::css($url, $rel, $options);
	}

	public function bootstrapCss($url = 'bootstrap.min.css', $rel = null, $options = array()) {
		$pluginRoot = dirname(dirname(DIRNAME(__FILE__)));
		$pluginName = end(explode(DS, $pluginRoot));

		$url = '/' . Inflector::underscore($pluginName) . '/css/' . $url;
		return parent::css($url, $rel, $options);
	}

	public function script($url = null, $options = array()) {
		if (empty($url)) {
			$url = 'bootstrap.min.js';
			$pluginRoot = dirname(dirname(DIRNAME(__FILE__)));
			$pluginName = end(explode(DS, $pluginRoot));
			$url = '/' . Inflector::underscore($pluginName) . '/js/' . $url;
		}
		return parent::script($url, $options);
	}

	public function bootstrapScript($url = 'bootstrap.min.js', $options = array()) {
		$pluginRoot = dirname(dirname(DIRNAME(__FILE__)));
		$pluginName = end(explode(DS, $pluginRoot));

		$url = '/' . Inflector::underscore($pluginName) . '/js/' . $url;
		return parent::script($url, $options);
	}

	public function breadcrumb($items, $options = array()) {
		$default = array(
			'class' => 'breadcrumb',
		);
		$options = array_merge($default, (array)$options);

		$count = count($items);
		$li = array();
		for ($i = 0; $i < $count - 1; $i++) {
			$text = $items[$i];
			$text .= '&nbsp;<span class="divider">/</span>';
			$li[] = parent::tag('li', $text);
		}
		$li[] = parent::tag('li', end($items), array('class' => 'active'));
		return parent::tag('ul', implode("\n", $li), $options);
	}

}