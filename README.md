TwitterBootstrap Plugin for CakePHP2
====================================

About Bootstrap, from Twitter

[Bootstrap, from Twitter](http://twitter.github.com/bootstrap/)

[twitter/bootstrap - GitHub](https://github.com/twitter/bootstrap)

How to install
--------------

Download files from [Bootstrap, from Twitter](http://twitter.github.com/bootstrap/)
Move files to app/Plugin/TwitterBootstrap/webroot/

Controller/AppController.php

	<?php
	class AppController extends Controller {
		public $helpers = array(
			'Session',
			'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
			'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
			'Pagenator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
		);
	}

Copy app/Plugin/TwitterBootstrap/View/Layouts/bootstrap.ctp to app/View/Layouts/bootstrap.ctp

Usage
-----

Load CSS

	<?php echo $this->Html->css(); ?> load bootstrap.min.css

Load JS

	<?php echo $this->Html->script(); ?> load bootstrap.min.js

Output form input as Bootstrap format

	<?php echo $this->Form->cretate('User'); ?>
		<?php echo $this->Form->input('name'); ?>
		<?php echo $this->Form->inlineInputs('name', array(
			'first_name' => array('class' => 'small'),
			'&nbsp;',
			'last_name' => array('class' => 'small'),
		)); ?>
		<?php echo $this->Form->submit('Submit'); ?>
	<?php echo $this->Form->end(); ?>

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

	// Auth
	<?php echo $this->Session->flash('auth', array(
		'element' => 'alert',
		'params' => array('plugin' => 'TwitterBootstrap'),
	)); ?>

Output Paginate as Bootstrap format

	// div.pagination.pagination-centered
	<?php echo $this->Paginator->pagination(); ?>
	// ul.pager
	<?php echo $this->Paginator->pager(); ?>

Breadcrumb

	<?php echo $this->Html->breadcrumb(array(
		$this->Html->link('one', '/one'),
		$this->Html->link('two', '/two'),
		'three',
	)); ?>
