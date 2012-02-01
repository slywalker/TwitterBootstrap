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
		);
	}

Usage
-----

Load CSS

	<?php echo $this->BootstrapHtml->css(); ?> load bootstrap.min.css

Load JS

	<?php echo $this->BootstrapHtml->script(); ?> load bootstrap.min.js

Output form input as Bootstrap format

	<?php echo $this->BootstrapForm->cretate('User'); ?>
		<?php echo $this->BootstrapForm->input('name'); ?>
		<?php echo $this->BootstrapForm->inlineInputs('name', array(
			'first_name' => array('class' => 'small'),
			'&nbsp;',
			'last_name' => array('class' => 'small'),
		)); ?>
		<?php echo $this->BootstrapForm->submit('Submit'); ?>
	<?php echo $this->BootstrapForm->end(); ?>

Output SessionHelper::flash as Bootstrap format

	// SomethingsController
	$this->Session->setFlash(__('The something has been saved'), 'alert', array(
		'plugin' => 'TwitterBootstrap',
		'class' => 'alert-success'
	));
	$this->Session->setFlash(__('The something could not be saved. Please, try again.'), 'alert', array(
		'plugin' => 'TwitterBootstrap',
		'class' => 'alert-error'
	));

	// View
	<?php echo $this->Session->flash(); ?>

Output Paginate as Bootstrap format

	<?php echo $this->element('pagination', array(), array('plugin' => 'TwitterBootstrap')); ?>

Breadcrumb

	<?php echo $this->BootstrapHtml->breadcrumb(array(
		$this->Html->link('one', '/one'),
		$this->Html->link('two', '/two'),
		'three',
	)); ?>