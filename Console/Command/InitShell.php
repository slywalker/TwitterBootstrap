<?php
class InitShell extends Shell {

	public function main() {
		$pluginRoot = dirname(dirname(__DIR__));
		$target = $pluginRoot . DS . 'Vendor' . DS . 'TwitterBootstrap' . DS . 'js' . DS;
		$link = $pluginRoot . DS . 'webroot' . DS . 'js' . DS;
		$this->_symlinks($target, $link, '*.js');

		$target = $pluginRoot . DS . 'Vendor' . DS . 'TwitterBootstrap' . DS;
		$link = $pluginRoot . DS . 'webroot' . DS . 'css' . DS;
		$this->_symlinks($target, $link, '*.css');
	}

	protected function _symlinks($target, $link, $fileReg) {
		if (!is_dir($link)) {
			mkdir($link);
		}
		foreach (glob($target . $fileReg) as $filename) {
			$basename = basename($filename);
			$this->out('target: ' . $filename, 1, Shell::VERBOSE);
			$this->out('link: ' . $link . $basename, 1, Shell::VERBOSE);
			if (file_exists($link . $basename)) {
				unlink($link . $basename);
			}
			if (symlink($filename, $link . $basename)) {
				$this->out('success: ' . $basename);
			} else {
				$this->out('error: ' . $basename);
			}
		}
	}
}