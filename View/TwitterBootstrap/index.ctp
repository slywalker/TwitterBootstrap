<section id="alerts">
	<h2>Alerts</h2>
	<?php echo $this->Session->flash('notice'); ?>
	<?php echo $this->Session->flash('success'); ?>
	<?php echo $this->Session->flash('error'); ?>
</section>

<section id="forms">
	<h2>Forms</h2>
	<?php echo $this->BootstrapForm->create(false, array(
		'url' => '#',
		'class' => 'form-horizontal',
	)); ?>

		<fieldset>
			<legend>Controls Bootstrap supports</legend>

			<?php echo $this->BootstrapForm->input('sample1', array(
				'label' => 'Text input',
				'class' => 'input-xlarge',
				'after' => 'In addition to freeform text, any HTML5 text-based input appears like so.',
			)); ?>

			<?php echo $this->BootstrapForm->input('sample2', array(
				'type' => 'checkbox',
				'label' => 'Checkbox',
				'opt-label' => 'Option one is this and that—be sure to include why it’s great',
			)); ?>

			<?php echo $this->BootstrapForm->input('sample3', array(
				'label' => 'Select list',
				'options' => array(
					0 => 'something',
					1 => '1',
					2 => '2',
					3 => '3',
					4 => '4',
					5 => '5',
				),
			)); ?>

			<?php echo $this->BootstrapForm->input('sample4', array(
				'label' => 'Multicon-select',
				'multiple' => true,
				'options' => array(
					1 => '1',
					2 => '2',
					3 => '3',
					4 => '4',
					5 => '5',
				),
			)); ?>

			<?php echo $this->BootstrapForm->input('sample5', array(
				'type' => 'file',
				'label' => 'File input',
			)); ?>

			<?php echo $this->BootstrapForm->input('sample6', array(
				'type' => 'textarea',
				'label' => 'Textarea',
				'class' => 'input-xlarge',
				'rows' => '3',
				'cols' => false,
			)); ?>

			<?php echo $this->BootstrapForm->inlineInputs('Inline inputs', array(
				'first_name' => array(
					'class' => 'input-small',
					'placeholder' => 'First Name',
				),
				'&nbsp;',
				'last_name' => array(
					'class' => 'input-small',
					'placeholder' => 'Last Name',
				),
			)); ?>

			<?php echo $this->BootstrapForm->submit('Save changes'); ?>

		</fieldset>

	<?php echo $this->BootstrapForm->end(); ?>
</section>

<section id="paginate">
	<h2>Paginate</h2>
	<?php $this->request->params['paging']['Example'] = array(
		'page' => 2,
		'current' => 20,
		'count' => 100,
		'prevPage' => true,
		'nextPage' => true,
		'pageCount' => 5,
		'order' => array(),
		'limit' => 20,
		'options' => array(),
		'paramType' => 'named',
	); // test params ?>
	<?php echo $this->BootstrapPaginator->pagination(array('model' => 'Example')); ?>
	<?php echo $this->BootstrapPaginator->pager(array('model' => 'Example')); ?>
</section>

<section id="breadcrumb">
	<?php echo $this->BootstrapHtml->breadcrumb(array(
		$this->Html->link('one', '/one'),
		$this->Html->link('two', '/two'),
		'three',
	)); ?>
</section>