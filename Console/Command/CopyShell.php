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
		$this->copy_less();
		$this->copy_img();
		$this->copy_js();
	}

	protected function _copy($options) {
		$this->out('Copy from ' . $options['from'] . ' to ' . $options['to']);
		if ($this->Folder->copy($options)) {
			$this->out('Success.');
		} else {
			$this->out('Error!');
		}
	}

	public function copy_less() {
		$from = $this->bootstrapPath . self::LESS_DIR;
		$to = WWW_ROOT . 'css' . DS . 'lib';
		$this->_copy(compact('from', 'to'));
	}

	public function copy_img() {
		$from = $this->bootstrapPath . self::IMG_DIR;
		$to = WWW_ROOT . 'img';
		$this->_copy(compact('from', 'to'));
	}

	public function copy_js() {
		$from = $this->bootstrapPath . self::JS_DIR;
		$to = WWW_ROOT . 'js' . DS . 'lib';
		$this->_copy(compact('from', 'to'));
	}

}