<?php
App::uses('FormHelper', 'View/Helper');
App::uses('Set', 'Utility');

class BootstrapFormHelper extends FormHelper {

	public $helpers = array('Html');
	
	public function input($name, $options = array()) {
		$default = array(
			'label' => null,
			'before' => null, // to convert .input-prepend
			'after' => null, // to convert .help-block
			'div' => array(),
		);
		$options = Set::merge($default, $options);

		if ($options['after']) {
			$options['after'] = $this->_after($options['after']);
		}
		if ($options['before']) {
			$options = $this->_prepend($options);
		}
		
		if (isset($options['type']) && $options['type'] === 'checkbox') {
			if (!isset($options['opt-label'])) {
				$options['opt-label'] = $options['label'];
				$options['label'] = FALSE;
			}
			if (isset($options['group-label'])) {
				$options['label'] = $options['group-label'];
			}
		}
		
		if (!empty($options['label'])) {
			if (!is_array($options['label'])) {
				$options['label'] = array('text' => $options['label']);
			}
			
			if (empty($options['label']['class'])) {
				$options['label']['class'] = 'control-label';
			}
		}
		
		$_ = $this->_input($name, $options, $hidden);
		
		return $hidden . $this->_clearfix($name, $_, array(
			'label' => $options['label'],
			'div' => $options['div'],
			'type' => isset($options['type']) ? $options['type'] : NULL,
		));
	}

	public function inlineInputs($name, $inputs, $options = array()) {
		$default = array(
			'label' => null,
			'after' => null, // to convert .help-block
			'div' => array(),
		);
		$options = Set::merge($default, $options);

		$out = array();
		foreach ($inputs as $_name => $_options) {
			if (is_array($_options)) {
				$_options['label'] = false;
				$_options['error'] = false;
				$out[] = $this->_input($_name, $_options);
			} else {
				$out[] = $_options;
			}
		}
		if (parent::error($name)) {
			$out[] = $this->Html('span', parent::error($name), array(
				'class' => 'help-inline',
			));
		}
		if ($options['after']) {
			$out[] = $this->_after($options['after']);
		}

		return $this->_clearfix($name, implode("\n", $out), $options);
	}

	public function submit($caption = null, $options = array()) {
		$default = array(
			'type' => 'submit',
			'div' => array('class' => 'form-actions'),
			'class' => 'btn primary',
			'data-loading-text' => __d('TwitterBootstrap', 'Submiting...'),
		);
		$options += $default;
		$divOptions = $options['div'];
		unset($options['div']);

		$out = $this->Html->tag('button', $caption, $options);
		$out = $this->Html->tag('div', $out, $divOptions);
		return $out;
	}

	protected function _input($name, $options, &$hidden = '') {
		$default = array(
			'type' => null,
			'error' => null,
		);
		$options = Set::merge($default, $options);
		
		$options['label'] = $options['div'] = $options['legend'] = false;
		if ($options['error'] !== false) {
			$options['error'] = array(
				'attributes' => array(
					'wrap' => 'span',
					'class' => 'help-inline',
				),
			);
		}

		if ($options['type'] === 'checkbox') {
			$options['label'] = empty($options['opt-label']) ? FALSE : $options['opt-label'];
			$input = $this->_checkbox($name, $options);
		} else {
			$input = parent::input($name, $options);
			if (!empty($options['multiple']) && $options['multiple'] === 'checkbox') {
				$input  = $options['after'] . $this->_multipleCheckbox($input, $options, $hidden); 
			}
			elseif ($options['type'] === 'radio') {
				$input = $this->_radio($input, $options, $hidden);
			}
		}
		return $input;
	}

	protected function _clearfix($name, $input, $options) {
		$default = array(
			'label' => null,
			'div' => array(
				'class' => 'controls',
			),
		);
		$options = Set::merge($default, $options);

		$out = array();
		if ($options['label'] !== false) {
			$text = $options['label']['text'];
			if ($options['type'] === 'checkbox') {
				unset($options['label']['text']);
				$options['label']['for'] = '';
			}
			$out[] = parent::label(FALSE, $text, $options['label']);
		}
		$out[] = $this->Html->div($options['div']['class'], $input, $options['div']);

		$clearfix = 'control-group';
		if (parent::error($name)) {
			$clearfix .= ' error';
		}
		return $this->Html->div($clearfix, implode("\n", $out));
	}

	protected function _after($after) {
		if (!is_array($after)) {
			$after = array('text' => $after);
		}
		$afterDefault = array(
			'text' => '',
			'wrap' => 'span',
			'class' => 'help-block',
		);
		$after += $afterDefault;
		return $this->Html->tag($after['wrap'], $after['text'], array(
			'class' => $after['class'],
		));
	}

	protected function _prepend($options) {
		$before = $options['before'];
		$before = $this->Html->tag('span', $before, array('class' => 'add-on'));
		$options['before'] = '<div class="input-prepend">' . $before;
		$options['after'] .= '</div>';
		return $options;
	}

	protected function _checkbox($name, $options) {
		$input = parent::input($name, $options);
		$input = $this->Html->tag('label', $input, array('class'=>'checkbox'));
		return $input;
	}

	protected function _radio($out, $options, &$hidden) {
		if (!preg_match_all('/(<input type="radio"[^>]+>)(((?!<input).)*)/m', $out, $matches)) {
			return $out;
		}

		$hidden = '';
		if (preg_match('/<input type="hidden"[^>]+>/m', $out, $match)) {
			$hidden = $match[0];
		}

		$error = '';
		if (preg_match('/<span class="' . $options['error']['attributes']['class'] . '"[^>]*>[^<]*<\/span>/m', $out, $match)) {
			$error = '<p>' . $match[0] . '</p>';
		}

		$lines = array();
		foreach ($matches[0] as $key => $value) {
			$line = $matches[1][$key] . $matches[2][$key];
			$lines[] = $this->Html->tag('label', $line, array('class'=>'radio'));
		}

		$out  = '';
		$out .= implode("\n", $lines);
		$out .= $error;
		return $out;
	}

	protected function _multipleCheckbox($out, $options, &$hidden) {
		if (!preg_match_all('/<div[^>]+>(<input type="checkbox"[^>]+>)(<label[^>]+)>([^<]*)(<\/label>)<\/div>/m', $out, $matches)) {
			return $out;
		}

		if (!preg_match('/<input type="hidden"[^>]+>/m', $out, $match)) {
			return $out;
		}
		$hidden = $match[0];

		$error = '';
		if (preg_match('/<span class="' . $options['error']['attributes']['class'] . '"[^>]*>[^<]*<\/span>/m', $out, $match)) {
			$error = '<p>' . $match[0] . '</p>';
		}

		$lines = array();
		foreach ($matches[0] as $key => $value) {
			$line = $matches[2][$key]  . ' class="checkbox">' . $matches[1][$key];
			$line .= $matches[3][$key] . $matches[4][$key];
			$lines[] = $line;
		}

		$out = '';
		$out .= implode("\n", $lines);
		$out .= $error;
		return $out;
	}

}