
<?php echo $this->Form->create(false, array(
	'url' => '#',
	'class' => 'form-horizontal',
)); ?>

	<fieldset>
		<legend>Controls Bootstrap supports</legend>

		<?php echo $this->BootstrapForm->input('sample1', array(
			'label' => 'Text input',
			'class' => 'input-xlarge',
			'after' => 'In addition to freeform text, any HTML5 text-based input appears like so.',
		)) ?>

		<?php echo $this->BootstrapForm->input('sample2', array(
			'type' => 'checkbox',
			'label' => 'Checkbox',
			'opt-label' => 'Option one is this and that—be sure to include why it’s great',
		)) ?>

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
		)) ?>

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
		)) ?>

		<?php echo $this->BootstrapForm->input('sample5', array(
			'type' => 'file',
			'label' => 'File input',
		)) ?>

		<?php echo $this->BootstrapForm->input('sample6', array(
			'type' => 'textarea',
			'label' => 'Textarea',
			'class' => 'input-xlarge',
			'rows' => '3',
			'cols' => false,
		)) ?>

		<?php echo $this->BootstrapForm->submit('Save changes'); ?>

	</fieldset>

<?php echo $this->Form->end(); ?>