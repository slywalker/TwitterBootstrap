<?php
class InitShell extends Shell {

	public function main() {
		$pluginRoot = dirname(dirname(__DIR__));
		$target = $pluginRoot . DS . 'Vendor' . DS . 'TwitterBootstrap' . DS . 'js' . DS;
		$link = $pluginRoot . DS . 'webroot' . DS . 'js' . DS;
		mkdir($link);
		foreach (glob($target . '*.js') as $filename) {
			$this->out('target: ' . $filename, 1, Shell::VERBOSE);
			$this->out('link: ' . $link, 1, Shell::VERBOSE);
			if (symlink($filename, $link . basename($filename))) {
				$this->out('success: ' . basename($filename));
			} else {
				$this->out('error: ' . basename($filename));
			}
		}

		$target = $pluginRoot . DS . 'Vendor' . DS . 'TwitterBootstrap' . DS;
		$link = $pluginRoot . DS . 'webroot' . DS . 'css' . DS;
		$filename = 'bootstrap.min.js';
		mkdir($link);
		$this->out('target: ' . $target . $filename, 1, Shell::VERBOSE);
		$this->out('link: ' . $link . $filename, 1, Shell::VERBOSE);
		if (symlink($target . $filename, $link . $filename)) {
			$this->out('success: ' . $filename);
		} else {
			$this->out('error: ' . $filename);
		}
	}
}