<?php
App::uses('FormHelper', 'View/Helper');
App::uses('Set', 'Utility');

class BootstrapFormHelper extends FormHelper {

	const FORM_SEARCH = 'form-search';

	const FORM_INLINE = 'form-inline';

	const FORM_HORIZONTAL = 'form-horizontal';

	const CLASS_GROUP = 'control-group';

	const CLASS_INPUTS = 'controls';

	const CLASS_ACTION = 'form-actions';

	const CLASS_BUTTON = 'btn';

	const CLASS_ERROR = 'error';

	public $helpers = array('Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'));

	protected $_isHorizontal = false;

	protected $_Opts = array();

	public function uneditable($fieldName, $options = array(), $before = false) {
		if ($before) {
			$class = explode(' ', $this->_extractOption('class', $options));
			if (in_array('uneditable-input', $class)) {
				$this->_Opts[$fieldName] = $options;
				$options['type'] = 'uneditable';
			}
			return $options;
		} else {
			return $this->Html->tag('span', $options['value'], $options['class']);
		}
	}

	public function addon($fieldName, $options = array(), $before = false) {
		if ($before) {
			$prepend = $this->_extractOption('prepend', $options);
			$append = $this->_extractOption('append', $options);
			if ($prepend || $append) {
				$this->_Opts[$fieldName] = $options;
				$options['type'] = 'addon';
			}
			return $options;
		} else {
			$type = $this->_extractOption('type', $this->_Opts[$fieldName]);

			$default = array('wrap' => 'span', 'class' => 'add-on');
			$divOptions = array();
			foreach (array('prepend', 'append') as $addon) {
				$$addon = null;
				$option = (array)$this->_extractOption($addon, $options);
				if ($option) {
					if (!is_array($option[0])) {
						$option = array($option);
					}
					foreach ($option as $_option) {
						array_push($_option, array());
						list($text, $addonOptions) = $_option;
						$addonOptions += $default;

						$wrap = $addonOptions['wrap'];
						unset($addonOptions['wrap']);

						$$addon .= $this->Html->tag($wrap, $text, $addonOptions);
					}

					unset($options[$addon]);
					$divOptions = $this->addClass($divOptions, 'input-' . $addon);
				}
			}
			$out = $prepend . $this->{$type}($fieldName, $options) . $append;
			return $this->Html->tag('div', $out, $divOptions);
		}
	}

	public function checkbox($fieldName, $options = array()) {
		$label = $this->_extractOption('label', $this->_Opts[$fieldName]);
		if (!is_array($label)) {
			$label = array('text' => $label);
		}
		$after = $this->_extractOption('after', $this->_Opts[$fieldName]);

		if ($this->_isHorizontal) {
			$label['text'] = $after;
			$label['class'] = null;
		}

		$label = $this->addClass($label, 'checkbox');
		$text = $label['text'];
		unset($label['text']);
		$out = parent::checkbox($fieldName, $options) . $text;
		return $this->label($fieldName, $out, $label);
	}

	protected function _setOptions($fieldName, $options) {
		if ('textarea' === $options['type']) {
			$options += array('cols' => false, 'rows' => '3');
		}
		if ('checkbox' === $options['type']) {
			if ($this->_isHorizontal) {
				$options['after'] = null;
			} else {
				$options['label'] = false;
			}
		}
		return $options;
	}

	public function radio($fieldName, $radioOptions = array(), $options = array()) {
		$options['legend'] = false;
		$options['separator'] = "\n";
		$out = parent::radio($fieldName, $radioOptions, $options);
		$out = $this->_restructureLabel($out, array('class' => 'radio'));
		return $out;
	}

	public function select($fieldName, $options = array(), $attributes = array()) {
		$multiple = $this->_extractOption('multiple', $attributes);
		$checkbox = explode(' ', $multiple);
		$attributes['multiple'] = $checkbox[0];
		$out = parent::select($fieldName, $options, $attributes);
		if ('checkbox' === $checkbox[0]) {
			$out = $this->_restructureLabel($out, array('class' => $multiple));
		}
		return $out;
	}

	protected function _restructureLabel($out, $options = array()) {
		$out = explode("\n", $out);
		foreach ($out as $key => &$_out) {
			$input = strip_tags($_out, '<input><img>');
			if ($input) {
				$_out = $this->Html->tag('label', $input, $options);
			}
		}
		return implode("\n", $out);
	}

	public function create($model = null, $options = array()) {
		$class = explode(' ', $this->_extractOption('class', $options));
		$inputDefaults = $this->_extractOption('inputDefaults', $options, array());

		if (in_array(self::FORM_HORIZONTAL, $class)) {
			$this->_isHorizontal = true;
		}

		if (in_array(self::FORM_SEARCH, $class) || in_array(self::FORM_INLINE, $class)) {
			$options['inputDefaults'] = Set::merge($inputDefaults, array('div' => false, 'label' => false));
		} else {
			$options['inputDefaults'] = Set::merge($inputDefaults, array('div' => self::CLASS_GROUP));
		}

		return parent::create($model, $options);
	}

	public function submit($caption = null, $options = array()) {
		$default = array(
			'type' => 'submit',
			'class' => self::CLASS_BUTTON,
			'div' => self::CLASS_ACTION,
			'icon' => null,
		);
		$options = array_merge($default, $this->_inputDefaults, $options);
		if ($options['div'] !== false && $this->_isHorizontal) {
			$options['div'] = self::CLASS_ACTION;
		}
		if ($options['icon']) {
			$caption = $this->Html->icon($options['icon']) . ' ' . $caption;
			unset($options['icon']);
		}
		$div = $this->_extractOption('div', $options);
		unset($options['div']);
		$out = $this->button($caption, $options);
		return (false === $div) ? $out : $this->Html->div($div, $out);
	}

	public function input($fieldName, $options = array()) {
		$options = array_merge(
			array('format' => array('before', 'label', 'between', 'input', 'error', 'after')),
			$this->_inputDefaults,
			$options
		);
		$this->_Opts[$fieldName] = $options;

		$type = $this->_extractOption('type', $options);
		$options = $this->_getType($fieldName, $options);

		$hidden = null;
		if ('hidden' === $options['type']) {
			$options['div'] = false;
			$options['label'] = false;
		} else {
			$options = $this->uneditable($fieldName, $options, true);
			$options = $this->addon($fieldName, $options, true);
			$options = $this->_setOptions($fieldName, $options);
			$options = $this->_controlGroupStates($fieldName, $options);
			$options = $this->_buildAfter($options);

			$hidden = $this->_hidden($fieldName, $options);
			if ($hidden) {
				$options['hiddenField'] = false;
			}
		}

		if (is_null($type) && empty($this->_Opts[$fieldName]['type'])) {
			unset($options['type']);
		}

		$disabled = $this->_extractOption('disabled', $options, false);
		if ($disabled) {
			$options = $this->addClass($options, 'disabled');
		}

		$div = $this->_extractOption('div', $options);
		$options['div'] = false;

		$before = $this->_extractOption('before', $options);
		$options['before'] = null;

		$label = $this->_extractOption('label', $options);
		if (false !== $label) {
			if (!is_array($label)) {
				$label = array('text' => $label);
			}
			if (false !== $div) {
				$class = $this->_extractOption('class', $label, 'control-label');
				$label = $this->addClass($label, $class);
			}
			$text = $label['text'];
			unset($label['text']);
			$label = $this->label($fieldName, $text, $label);
		}
		$options['label'] = false;

		$between = $this->_extractOption('between', $options);
		$options['between'] = null;

		$input = parent::input($fieldName, $options);
		$divControls = $this->_extractOption('divControls', $options, self::CLASS_INPUTS);
		$input = $hidden . ((false === $div) ? $input : $this->Html->div($divControls, $input));

		$out = $before . $label . $between . $input;
		return (false === $div) ? $out : $this->Html->div($div, $out);
	}

	protected function _getType($fieldName, $options) {
		if (!isset($options['type'])) {
			$this->setEntity($fieldName);
			$modelKey = $this->model();
			$fieldKey = $this->field();

			$options['type'] = 'text';
			if (isset($options['options'])) {
				$options['type'] = 'select';
			} elseif (in_array($fieldKey, array('psword', 'passwd', 'password'))) {
				$options['type'] = 'password';
			} elseif (isset($options['checked'])) {
				$options['type'] = 'checkbox';
			} elseif ($fieldDef = $this->_introspectModel($modelKey, 'fields', $fieldKey)) {
				$type = $fieldDef['type'];
				$primaryKey = $this->fieldset[$modelKey]['key'];
			}

			if (isset($type)) {
				$map = array(
					'string' => 'text', 'datetime' => 'datetime',
					'boolean' => 'checkbox', 'timestamp' => 'datetime',
					'text' => 'textarea', 'time' => 'time',
					'date' => 'date', 'float' => 'number',
					'integer' => 'number'
				);

				if (isset($this->map[$type])) {
					$options['type'] = $this->map[$type];
				} elseif (isset($map[$type])) {
					$options['type'] = $map[$type];
				}
				if ($fieldKey == $primaryKey) {
					$options['type'] = 'hidden';
				}
			}
			if (preg_match('/_id$/', $fieldKey) && $options['type'] !== 'hidden') {
				$options['type'] = 'select';
			}

			if ($modelKey === $fieldKey) {
				$options['type'] = 'select';
			}
		}
		return $options;
	}

	protected function _buildAfter($options) {
		$outInline = array();
		$inlines = (array)$this->_extractOption('helpInline', $options, array());
		if ($inlines) {
			unset($options['helpInline']);
		}
		foreach ($inlines as $inline) {
			$outInline[] = $this->help($inline, array('type' => 'inline'));
		}
		$outInline = implode(' ', $outInline);

		$outBlock = array();
		$blocks = (array)$this->_extractOption('helpBlock', $options, array());
		if ($blocks) {
			unset($options['helpBlock']);
		}
		foreach ($blocks as $block) {
			$outBlock[] = $this->help($block, array('type' => 'block'));
		}
		$outBlock = implode('', $outBlock);

		$options['after'] = $outInline . $outBlock . $this->_extractOption('after', $options);
		return $options;
	}

	protected function _controlGroupStates($fieldName, $options) {
		$div = $this->_extractOption('div', $options);
		if (false !== $div) {
			$inlines = (array)$this->_extractOption('helpInline', $options, array());
			foreach ($options as $key => $value) {
				if (in_array($key, array('warning', 'success'))) {
					unset($options[$key]);
					array_unshift($inlines, $value);
					$options = $this->addClass($options, $key, 'div');
				}
			}
			if ($inlines) {
				$options['helpInline'] = $inlines;
			}
		}
		if ($this->error($fieldName)) {
			$error = $this->_extractOption('error', $options, array());
			if (false !== $error) {
				$options['error'] = array_merge($error, array(
					'attributes' => array(
						'wrap' => 'span',
						'class' => 'help-inline error-message',
					),
				));
			}
			if (false !== $div) {
				$options = $this->addClass($options, self::CLASS_ERROR, 'div');
			}
		}
		return $options;
	}

	protected function _hidden($fieldName, $options) {
		$type = $options['type'];
		if (!in_array($type, array('checkbox', 'radio', 'select'))) {
			return null;
		}
		$multiple = $this->_extractOption('multiple', $options);
		$multiple = current(explode(' ', $multiple));
		if ('select' === $type && !$multiple) {
			return null;
		}
		$hiddenField = $this->_extractOption('hiddenField', $options, true);
		if (!$hiddenField) {
			return null;
		}

		$out = null;
		if ('checkbox' === $type || !isset($options['value']) || $options['value'] === '') {
			$options['secure'] = false;
			$options = $this->_initInputField($fieldName, $options);

			$style = ('select' === $type && 'checkbox' !== $multiple) ? null : '_';
			$hiddenOptions = array(
				'id' => $options['id'] . $style,
				'name' => $options['name'],
				'value' => '',
			);

			if ('checkbox' === $type) {
				$hiddenOptions['value'] = ($hiddenField !== true ? $hiddenField : '0');
				$hiddenOptions['secure'] = false;
			}
			if (isset($options['disabled']) && $options['disabled'] == true) {
				$hiddenOptions['disabled'] = 'disabled';
			}
			$out = $this->hidden($fieldName, $hiddenOptions);
		}
		return $out;
	}

	public function help($text, $options = array()) {
		$classMap = array(
			'inline' => array('wrap' => 'span', 'class' => 'help-inline'),
			'block' => array('wrap' => 'p', 'class' => 'help-block'),
		);
		$options += array('type' => 'inline');
		$options += $this->_extractOption($options['type'], $classMap, array());
		unset($options['type']);
		$wrap = $options['wrap'];
		unset($options['wrap']);
		return $this->Html->tag($wrap , $text, $options);
	}
}
