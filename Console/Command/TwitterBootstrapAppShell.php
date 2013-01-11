<?php
App::uses('AppShell', 'Console/Command');
App::uses('Folder', 'Utility');

class TwitterBootstrapAppShell extends AppShell {

	const IMG_DIR = 'img';

	const JS_DIR = 'js';

	const LESS_DIR = 'less';

	protected $_Theme = null;

	protected $_Action = null;

	public $pluginName = 'TwitterBootstrap';

	public $pluginPath = null;

	public $bootstrapPath = null;

	public $Folder;

	public function startup() {
		$this->_welcome();
		$this->out('TwitterBootstrap Shell');
		$this->hr();

		$this->pluginPath = App::pluginPath($this->pluginName);

		$paths = array_unique(
			array_merge(
				App::path('Vendor', $this->pluginName),
				App::path('Vendor')
			)
		);

		foreach ($paths as $path) {
			$dir = 'twitter' . DS . 'bootstrap' . DS;
			if (
				is_dir($path . $dir . self::IMG_DIR) &&
				is_dir($path . $dir . self::JS_DIR) &&
				is_dir($path . $dir . self::LESS_DIR)
			) {
				$this->bootstrapPath = $path . $dir;
				break;
			}

			$dir = 'bootstrap' . DS;
			if (
				is_dir($path . $dir . self::IMG_DIR) &&
				is_dir($path . $dir . self::JS_DIR) &&
				is_dir($path . $dir . self::LESS_DIR)
			) {
				$this->bootstrapPath = $path . $dir;
				break;
			}
		}
		if (!$this->bootstrapPath) {
			$this->out('<error>Bootstrap files were not found.</error>');
			exit(0);
		}

		$this->Folder = new Folder($this->bootstrapPath);
	}

}