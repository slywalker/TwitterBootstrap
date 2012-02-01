<?php
App::uses('AppController', 'Controller');

class TwitterBootstrapController extends AppController {

	public $uses = array();

	public $components = array('Session');

	public $helpers = array(
		'TwitterBootstrap.BootstrapHtml',
		'TwitterBootstrap.BootstrapForm',
	);

	public function index() {
		$this->Session->setFlash(__('Alert message testing...'), 'alert', array(
			'plugin' => 'TwitterBootstrap',
			'class' => 'alert-success'
		));
	}

}