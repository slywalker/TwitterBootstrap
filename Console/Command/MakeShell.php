<?php
App::uses('AppShell', 'Console/Command');

class MakeShell extends AppShell {

	public function main() {
		$dir = WWW_ROOT;
		$jsFiles = array('js/lib/bootstrap-tooltip.js');
		foreach (glob($dir . 'js/lib/*.js') as $file) {
			$filePath = 'js/lib/' . basename($file);
			if (!in_array($filePath, $jsFiles)) {
				$jsFiles[] = $filePath;
			}
		}
		$jsFiles = implode(' ', $jsFiles);
		$command = <<< EOT
cd {$dir};
lessc css/lib/bootstrap.less > css/bootstrap.css;
lessc --compress css/lib/bootstrap.less > css/bootstrap.min.css;
lessc css/lib/responsive.less > css/responsive.css;
lessc --compress css/lib/responsive.less > css/responsive.min.css;
cat {$jsFiles} > js/bootstrap.js;
uglifyjs -nc js/bootstrap.js > js/bootstrap.min.tmp.js;
echo "/**\n* Bootstrap.js by @fat & @mdo\n* Copyright 2012 Twitter, Inc.\n* http://www.apache.org/licenses/LICENSE-2.0.txt\n*/" > js/copyright.js;
cat js/copyright.js js/bootstrap.min.tmp.js > js/bootstrap.min.js;
rm js/copyright.js 	js/bootstrap.min.tmp.js;
EOT;
		exec($command);
		$this->out('Make css/bootstrap.css');
		$this->out('Make css/bootstrap.min.css');
		$this->out('Make css/bootstrap-responsive.css');
		$this->out('Make css/bootstrap-responsive.min.css');
		$this->out('Make js/bootstrap.min.js');
	}

}