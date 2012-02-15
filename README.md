TwitterBootstrap Plugin for CakePHP 2.0
=======================================

About Bootstrap, from Twitter

[Bootstrap, from Twitter](http://twitter.github.com/bootstrap/)

[twitter/bootstrap - GitHub](https://github.com/twitter/bootstrap)

I hope that "Bootstrap, from Twitter" will become the default design in CakePHP 2.1

How to install
--------------

Download files from [Bootstrap, from Twitter](http://twitter.github.com/bootstrap/)
Move files to app/Plugin/TwitterBootstrap/webroot/

Controller/AppController.php

	<?php
	class AppController extends Controller {

		// Usig as plugin's helper
		public $helpers = array(
			'Session', 'Html', 'Form',
			'TwitterBootstrap.BootstrapHtml',
			'TwitterBootstrap.BootstrapForm',
			'TwitterBootstrap.BootstrapPaginator',
		);

		// Using as alias of core helper
		public $helpers = array(
			'Session',
			'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
			'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
			'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
		);
	}

Copy app/Plugin/TwitterBootstrap/View/Layouts/bootstrap.ctp to app/View/Layouts/bootstrap.ctp

Usage (Using as alias of core helper)
-------------------------------------

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


License
-------

The MIT License (MIT)

Copyright (c) 2012 Yasuo Harada

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.