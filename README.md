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

Install as git submodule
-------------------------------------

git submodule add https://github.com/slywalker/TwitterBootstrap.git app/Plugin/TwitterBootstrap

Usage (Using as alias of core helper)
-------------------------------------

Load CSS

	<?php echo $this->Html->css(); ?> load bootstrap.min.css

Load JS

	<?php echo $this->Html->script(); ?> load bootstrap.min.js

Output form input as Bootstrap format

	<?php echo $this->Form->create('Sample', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<legend>Extending form controls</legend>
			<?php echo $this->Form->input('field1', array(
				'label' => 'Prepended text',
				'type' => 'text',
				'class' => 'span2',
				'prepend' => '@',
				'helpBlock' => 'Here\'s some help text',
			)); ?>
			<?php echo $this->Form->input('field2', array(
				'label' => 'Appended text',
				'type' => 'text',
				'class' => 'span2',
				'append' => '.00',
				'helpInline' => 'Here\'s more help text',
			)); ?>
			<?php echo $this->Form->input('field3', array(
				'label' => 'Append and prepend',
				'type' => 'text',
				'class' => 'span2',
				'prepend' => '$',
				'append' => '.00',
			)); ?>
			<?php echo $this->Form->input('field4', array(
				'label' => 'Append with button',
				'type' => 'text',
				'class' => 'span2',
				'append' => array('Go!', array('wrap' => 'button', 'class' => 'btn')),
			)); ?>
			<?php echo $this->Form->input('field5', array(
				'label' => 'Inline checkboxes',
				'type' => 'select',
				'multiple' => 'checkbox inline',
				'options' => array('1', '2', '3'),
			)); ?>
			<?php echo $this->Form->input('field6', array(
				'label' => 'Checkboxes',
				'type' => 'select',
				'multiple' => 'checkbox',
				'options' => array(
					'1' => 'Option one is this and that—be sure to include why it\'s great',
					'2' => 'Option two can also be checked and included in form results',
					'3' => 'Option three can—yes, you guessed it—also be checked and included in form results',
				),
				'helpBlock' => '<strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.',
			)); ?>
			<?php echo $this->Form->input('field7', array(
				'label' => 'Radio buttons',
				'type' => 'radio',
				'options' => array(
					'1' => 'Option one is this and that—be sure to include why it\'s great',
					'2' => 'Option two can is something else and selecting it will deselect option one',
				),
			)); ?>
			<div class="form-actions">
				<?php echo $this->Form->submit('Save changes', array(
					'div' => false,
					'class' => 'btn btn-primary',
				)); ?>
				<button class="btn">Cancel</button>
			</div>
		</fieldset>
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