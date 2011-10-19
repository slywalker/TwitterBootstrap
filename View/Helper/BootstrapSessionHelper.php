<?php
App::uses('SessionHelper', 'View/Helper');

class BootstrapSessionHelper extends SessionHelper {

	public function flash($key = 'flash', $attrs = array()) {
		$out = false;

		if (CakeSession::check('Message.' . $key)) {
			$flash = CakeSession::read('Message.' . $key);
			$message = $flash['message'];
			unset($flash['message']);

			if (!empty($attrs)) {
				$flash = array_merge($flash, $attrs);
			}

			$tmpVars = $flash['params'];
			$tmpVars['message'] = $message;
			$tmpOptions = array('plugin' => 'TwitterBootstrap');
			$out = $this->_View->element('alert', $tmpVars, $tmpOptions);

			CakeSession::delete('Message.' . $key);
		}
		return $out;
	}

}