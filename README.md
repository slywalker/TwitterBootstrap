#TwitterBootstrap Plugin for CakePHP2.x

About Bootstrap, from Twitter

[Bootstrap, from Twitter](http://twitter.github.com/bootstrap/)

[twitter/bootstrap - GitHub](https://github.com/twitter/bootstrap)

This v1.2.0 supports Bootstrap v2.0.2

##Install
Add gitsubmodule

	$ git submodule add git://github.com/slywalker/TwitterBootstrap.git app/Plugin/TwitterBootstrap
	$ git submodule update --init --recursive

or download this plugin [Downloads · slywalker/TwitterBootstrap](https://github.com/slywalker/TwitterBootstrap/downloads), and move into app/Plugin/

###Can you use command "lessc" and "uglifyjs" ?

####Yes!

copy files less, js and img into webroot

	$ cd /your/app/path
	$ cake twitter_bootstrap.copy

make css/bootstrap.min.css, css/bootstrap-responsive.min.css and js/bootstrap.min.js

	$ cd /your/app/path
	$ cake twitter_bootstrap.make

####No...

Download files from [Bootstrap, from Twitter](http://twitter.github.com/bootstrap/), and move files to app/Plugin/TwitterBootstrap/webroot/

##Configuration

Add your app/Config/bootstrap.php

	CakePlugin::load('TwitterBootstrap');


Controller/AppController.php

	<?php
	class AppController extends Controller {

		public $helpers = array(
			'Session',
			'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
			'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
			'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
		);

	}

##Usage

View/Layout/default.ctp

	<?php echo $this->Html->css('bootstrap.min'); ?>
	<?php echo $this->Html->css('bootstrap-responsive.min'); ?>

Load JS

	<?php echo $this->Html->script('bootstrap.min'); ?>

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

You can see more sample. access http://{webroot}/twitter_bootstrap

##License

The MIT License (MIT)

Copyright (c) 2012 Yasuo Harada

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.