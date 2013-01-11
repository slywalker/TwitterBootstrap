<?php
App::uses('TwitterBootstrapAppShell', 'TwitterBootstrap.Console/Command');

class MakeShell extends TwitterBootstrapAppShell {

	const BOOTSTRAP_LESS = 'css/less/bootstrap.less';

	const RESPONSIVE_LESS = 'css/less/responsive.less';

	public function main() {
		$bootstrapLess = WWW_ROOT . self::BOOTSTRAP_LESS;
		$responsiveLess = WWW_ROOT . self::RESPONSIVE_LESS;

		$command = "cd {$this->bootstrapPath} && ";
		$command .= "make bootstrap BOOTSTRAP_LESS='{$bootstrapLess}' BOOTSTRAP_RESPONSIVE_LESS='{$responsiveLess}' && ";
		$command .= "cp -R bootstrap/* " . WWW_ROOT . " && ";
		$command .= "rm -rf bootstrap";

		exec($command, $output);
		$this->out($output);
	}

}