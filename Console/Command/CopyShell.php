<?php
App::uses('AppShell', 'Console/Command');
App::uses('Folder', 'Utility');

class CopyShell extends AppShell {

	const IMG_DIR = 'img';

	const JS_DIR = 'js';

	const LESS_DIR = 'less';

	protected $_Theme = null;

	protected $_Action = null;

	public $pluginPath = null;

	public $bootstrapPath = null;

	public $Folder = null;

	public function getOptionParser() {
		$options = array(
			'theme' => array(
				'short' => 't',
				'help' => __('Set theme to place Bootstrap files in.'),
				'boolean' => false
			),
			'webroot' => array(
				'short' => 'w',
				'help' => __('Set file output to webroot Theme dir (use with theme option).'),
				'boolean' => true
			)
		);

		return ConsoleOptionParser::buildFromArray(array(
			'command' => 'copy',
			'description' => __('TwitterBootstrap Copy Shell Help.'),
			'options' => array(
				'theme' => $options['theme'],
				'webroot' => $options['webroot']
			),
			'subcommands' => array(
				'all' => array(
					'help' => __('Copies Less, Js & Img source from Bootstrap submodule in plugin Vendor dir'),
					'parser' => array(
						'description' => array(__('files will be placed in webroot of App or named Theme')),
						'options' => array(
							'theme' => $options['theme'],
							'webroot' => $options['webroot']
						),
					)
				),
				'less' => array(
					'help' => __('Copies Less source from Bootstrap submodule in plugin Vendor dir'),
					'parser' => array(
						'description' => array(__('files will be placed in webroot/css/lib/ of App or named Theme')),
						'options' => array(
							'theme' => $options['theme'],
							'webroot' => $options['webroot']
						),
					)
				),
				'img' => array(
					'help' => __('Copies Img source from Bootstrap submodule in plugin Vendor dir'),
					'parser' => array(
						'description' => array(__('files will be placed in webroot/img/ of App or named Theme')),
						'options' => array(
							'theme' => $options['theme'],
							'webroot' => $options['webroot']
						),
					)
				),
				'js' => array(
					'help' => __('Copies Js source from Bootstrap submodule in plugin Vendor dir'),
					'parser' => array(
						'description' => array(__('files will be placed in webroot/js/lib of App or named Theme')),
						'options' => array(
							'theme' => $options['theme'],
							'webroot' => $options['webroot']
						),
					)
				)
			)
		));
	}

	public function initialize() {
		$this->pluginPath = dirname(dirname(dirname(__FILE__))) . DS;
		$this->bootstrapPath = $this->pluginPath . 'Vendor' . DS . 'bootstrap' . DS;
		$this->Folder = new Folder($this->bootstrapPath);
		parent::initialize();
	}

	public function main() {
		if (isset($this->params['theme'])) {
			$this->_Theme = $this->params['theme'];
		}

		$this->_Action = isset($this->args[0]) ? $this->args[0] : 'all';
		switch ($this->_Action) {
			case 'js':
				$this->copyJs();
				break;
			case 'less':
				$this->copyLess();
				break;
			case 'img':
				$this->copyImg();
				break;
			default:
				$this->copyLess();
				$this->copyImg();
				$this->copyJs();
				break;
		}
	}

	protected function _copy($options) {
		$default = array(
			'from' => null,
			'to' => null,
			'skip' => array('tests', 'README.md'),
		);
		$options += $default;

		$this->out('<comment>From: ' . str_replace(APP, '', $options['from']) . "\n" .
			 'To: ' . str_replace(APP, '', $options['to']) . '</comment>', 1, Shell::VERBOSE);

		if ($this->Folder->copy($options)) {
			$this->out('<info>' . __('Success.', 'TwitterBootstrap') . '</info>');
		} else {
			$this->out('<error>' . __('Error!', 'TwitterBootstrap') . '</error>');
		}
	}

	public function copyLess() {
		$from = $this->bootstrapPath . self::LESS_DIR;
		$to = '';
		if ($this->_Theme && !isset($this->params['webroot'])) {
			$to = APP . 'View' . DS . 'Themed' . DS . $this->_Theme . DS . 'webroot' . DS . 'css' . DS . 'lib';
		} elseif ($this->_Theme && isset($this->params['webroot'])) {
			$to = WWW_ROOT . 'theme' . DS . $this->_Theme . DS . 'css' . DS . 'lib';
		} else {
			$to = WWW_ROOT . 'css' . DS . 'lib';
		}
		$this->out('<info>Copying Less</info>');
		$this->_copy(compact('from', 'to'));
	}

	public function copyImg() {
		$from = $this->bootstrapPath . self::IMG_DIR;
		$to = '';
		if ($this->_Theme && !isset($this->params['webroot'])) {
			$to = APP . 'View' . DS . 'Themed' . DS . $this->_Theme . DS . 'webroot' . DS . 'img';
		} elseif ($this->_Theme && isset($this->params['webroot'])) {
			$to = WWW_ROOT . 'theme' . DS . $this->_Theme . DS . 'img';
		} else {
			$to = WWW_ROOT . 'img';
		}
		$this->out('<info>Copying Images</info>');
		$this->_copy(compact('from', 'to'));
	}

	public function copyJs() {
		$from = $this->bootstrapPath . self::JS_DIR;
		$to = '';
		if ($this->_Theme && !isset($this->params['webroot'])) {
			$to = APP . 'View' . DS . 'Themed' . DS . $this->_Theme . DS . 'webroot' . DS . 'js' . DS . 'lib';
		} elseif ($this->_Theme && isset($this->params['webroot'])) {
			$to = WWW_ROOT . 'theme' . DS . $this->_Theme . DS . 'js' . DS . 'lib';
		} else {
			$to = WWW_ROOT . 'js' . DS . 'lib';
		}
		$this->out('<info>Copying Javascript</info>');
		$this->_copy(compact('from', 'to'));
	}

}