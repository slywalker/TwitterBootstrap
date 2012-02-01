TwitterBootstrap Plugin for CakePHP2
====================================

About Bootstrap, from Twitter

[Bootstrap, from Twitter](http://twitter.github.com/bootstrap/)

[twitter/bootstrap - GitHub](https://github.com/twitter/bootstrap)

How to install
--------------

Download files from [Bootstrap, from Twitter](http://twitter.github.com/bootstrap/)
Move files to Plugin/TwitterBootstrap/webroot/

Controller/AppController.php

	<?php
	class AppController extends Controller {
		public $helpers = array(
			'Session', 'Html', 'Form',
			'TwitterBootstrap.BootstrapHtml',
			'TwitterBootstrap.BootstrapForm',
			'TwitterBootstrap.BootstrapSession'
		);
	}

Usage
-----

Load CSS

	<?php echo $this->BootstrapHtml->css(); ?>

Load JS

	<?php echo $this->BootstrapHtml->script(); ?> all script

or

	<?php echo $this->BootstrapHtml->script('bootstrap-alerts.js'); ?>

Output form input as Bootstrap format

	<?php echo $this->BootstrapForm->input('name'); ?>
	<?php echo $this->BootstrapForm->inlineInputs('name', array(
		'first_name' => array('class' => 'small'),
		'&nbsp;',
		'last_name' => array('class' => 'small'),
	)); ?>
	<?php echo $this->BootstrapForm->submit('Submit'); ?>

Output SessionHelper::flash as Bootstrap format

	// SomethingsController
	$this->Session->setFlash(__('The something has been saved'), 'default', array('class' => 'success'));
	$this->Session->setFlash(__('The something could not be saved. Please, try again.'), 'default', array('class' => 'error'));

	// View
	<?php echo $this->BootstrapSession->flash(); ?>

Output Paginate as Bootstrap format

	<?php echo $this->element('pagination', array(), array('plugin' => 'TwitterBootstrap')); ?>

Breadcrumb

	<?php echo $this->BootstrapHtml->breadcrumb(array(
		$this->Html->link('one', '/one'),
		$this->Html->link('two', '/two'),
		'three',
	)); ?>