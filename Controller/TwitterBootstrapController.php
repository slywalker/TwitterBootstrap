<?php
App::uses('AppController', 'Controller');

class TwitterBootstrapController extends AppController {

	public $uses = array();

	public $components = array('Session');

	public $helpers = array(
		'TwitterBootstrap.BootstrapHtml',
		'TwitterBootstrap.BootstrapForm',
		'TwitterBootstrap.BootstrapPaginator',
	);

	public function index() {
		$this->Session->setFlash(__('Alert notice message testing...'), 'alert', array(
			'plugin' => 'TwitterBootstrap',
		), 'notice');
		$this->Session->setFlash(__('Alert success message testing...'), 'alert', array(
			'plugin' => 'TwitterBootstrap',
			'class' => 'alert-success'
		), 'success');
		$this->Session->setFlash(__('Alert error message testing...'), 'alert', array(
			'plugin' => 'TwitterBootstrap',
			'class' => 'alert-error'
		), 'error');
	}

}