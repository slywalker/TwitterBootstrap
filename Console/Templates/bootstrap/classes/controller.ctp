<?php
echo "<?php\n";
echo "App::uses('{$plugin}AppController', '{$pluginPath}Controller');\n";
?>
/**
 * <?php echo $controllerName; ?> Controller
 *
<?php
if (!$isScaffold) {
	$defaultModel = Inflector::singularize($controllerName);
	echo " * @property {$defaultModel} \${$defaultModel}\n";
	if (!empty($components)) {
		foreach ($components as $component) {
			echo " * @property {$component}Component \${$component}\n";
		}
	}
}
?>
 */
class <?php echo $controllerName; ?>Controller extends <?php echo $plugin; ?>AppController {

/**
 *  Layout
 *
 * @var string
 */
	public $layout = 'bootstrap';

<?php if ($isScaffold): ?>
/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;
<?php else: ?>
<?php
if (!is_array($helpers)) {
	$helpers = array();
}
$helpers += array(
	'TwitterBootstrap.BootstrapHtml',
	'TwitterBootstrap.BootstrapForm',
	'TwitterBootstrap.BootstrapPaginator'
);
if (count($helpers)):
	echo "/**\n * Helpers\n *\n * @var array\n */\n";
	echo "\tpublic \$helpers = array(";
	for ($i = 0, $len = count($helpers); $i < $len; $i++):
		if ($i != $len - 1):
			echo "'" . Inflector::camelize($helpers[$i]) . "', ";
		else:
			echo "'" . Inflector::camelize($helpers[$i]) . "'";
		endif;
	endfor;
	echo ");\n";
endif;

if (!is_array($components)) {
	$components = array();
}
$components += array('Session');
if (count($components)):
	echo "/**\n * Components\n *\n * @var array\n */\n";
	echo "\tpublic \$components = array(";
	for ($i = 0, $len = count($components); $i < $len; $i++):
		if ($i != $len - 1):
			echo "'" . Inflector::camelize($components[$i]) . "', ";
		else:
			echo "'" . Inflector::camelize($components[$i]) . "'";
		endif;
	endfor;
	echo ");\n";
endif;

echo $actions;

endif; ?>

}
