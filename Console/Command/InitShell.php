<?php
class InitShell extends AppShell {

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
			if (file_exists($link . $basename)) {
				unlink($link . $basename);
			}

			$relativePath = $this->_relativePath($link, $filename);
			$this->out('target: ' . $relativePath, 1, Shell::VERBOSE);
			$this->out('link: ' . $link . $basename, 1, Shell::VERBOSE);

			if (symlink($relativePath, $link . $basename)) {
				$this->out('success: ' . $basename);
			} else {
				$this->out('error: ' . $basename);
			}
		}
	}

	protected function _relativePath($base, $target) {
		$base   = explode(DS, $base);
		$target = explode(DS, $target);
		$result = array();
		$same = true;

		foreach ($base as $key => $_base) {
			if ($same && $_base === $target[$key]) {
				unset($target[$key]);
				continue;
			}
			if (!$same) {
				$result[] = '..';
			}
			$same = false;
		}

		return implode(DS, $result) . DS . implode(DS, $target);
	}

}