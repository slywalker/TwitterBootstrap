<?php
App::uses('AppShell', 'Console/Command');
App::uses('Folder', 'Utility');

class CopyShell extends AppShell {

	const IMG_DIR = 'img';

	const JS_DIR = 'js';

	const LESS_DIR = 'less';

	public $pluginPath = null;

	public $bootstrapPath = null;

	public $Folder = null;

	public function initialize() {
		$this->pluginPath = dirname(dirname(dirname(__FILE__))) . DS;
		$this->bootstrapPath = $this->pluginPath . 'Vendor' . DS . 'bootstrap' . DS;
		$this->Folder = new Folder($this->bootstrapPath);
		parent::initialize();
	}

	public function main() {
		$this->copyLess();
		$this->copyImg();
		$this->copyJs();
	}

	protected function _copy($options) {
		$default = array(
			'from' => null,
			'to' => null,
			'skip' => array('tests', 'README.md'),
		);
		$options += $default;
		$this->out('Copy from ' . $options['from'] . ' to ' . $options['to']);
		if ($this->Folder->copy($options)) {
			$this->out('Success.');
		} else {
			$this->out('Error!');
		}
	}

	public function copyLess() {
		$from = $this->bootstrapPath . self::LESS_DIR;
		$to = WWW_ROOT . 'css' . DS . 'lib';
		$this->_copy(compact('from', 'to'));
	}

	public function copyImg() {
		$from = $this->bootstrapPath . self::IMG_DIR;
		$to = WWW_ROOT . 'img';
		$this->_copy(compact('from', 'to'));
	}

	public function copyJs() {
		$from = $this->bootstrapPath . self::JS_DIR;
		$to = WWW_ROOT . 'js' . DS . 'lib';
		$this->_copy(compact('from', 'to'));
	}

}