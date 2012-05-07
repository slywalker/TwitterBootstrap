<?php
App::uses('AppShell', 'Console/Command');

class MakeShell extends AppShell {

	public function main() {
		$pluginPath = dirname(dirname(dirname(__FILE__))) . DS;
		$bootstrapPath = $pluginPath . 'Vendor' . DS . 'bootstrap' . DS;
		$wwwRoot = WWW_ROOT;
		$bootstrapLess = $wwwRoot . 'css/lib/bootstrap.less';
		$bootstrapResponsiveLess = $wwwRoot . 'css/lib/responsive.less';
		$command = "cd {$bootstrapPath} && ";
		$command .= "make bootstrap BOOTSTRAP_LESS='{$bootstrapLess}' BOOTSTRAP_RESPONSIVE_LESS='{$bootstrapResponsiveLess}' && ";
		$command .= "cp -R bootstrap/* {$wwwRoot} && ";
		$command .= "rm -rf bootstrap";
		exec($command, $output);
		$this->out($output);
	}

}