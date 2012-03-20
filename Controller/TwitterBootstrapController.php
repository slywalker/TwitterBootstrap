<?php
App::uses('AppController', 'Controller');

class TwitterBootstrapController extends AppController {

	public $uses = array();

	public $layout = 'bootstrap';

	public $components = array('Session');

	public $helpers = array(
		'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
		'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
		'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
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