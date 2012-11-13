<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('BootstrapFormHelper', 'TwitterBootstrap.View/Helper');

/**
 * BootstrapPaginatorHelper Test Case
 *
 */
class BootstrapFormHelperTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->BootstrapForm = new BootstrapFormHelper($View);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BootstrapForm);

		parent::tearDown();
	}

/**
 * testCreate
 *
 * @return void
 */
	public function testCreate() {
		$form = $this->BootstrapForm->create();
		$expected = '<form action="/" id="Form" method="post" accept-charset="utf-8">' .
			'<div style="display:none;"><input type="hidden" name="_method" value="POST"></div>';
		$this->assertSame($expected, $form);
	}

/**
 * testSubmit
 *
 * @return void
 */
	public function testSubmit() {
		$form = $this->BootstrapForm->submit('Submit');
		$expected = '<div class="form-actions">' .
			'<button type="submit" class="btn">Submit</button></div>';
		$this->assertSame($expected, $form);
	}

/**
 * testInput
 *
 * @return void
 */
	public function testInput() {
		$form = $this->BootstrapForm->input('foo');
		$expected = '<div><label for="foo" class="control-label">Foo</label>' .
			'<div class="controls"><input name="data[foo]" type="text" id="foo">' .
			'</div></div>';
		$this->assertSame($expected, $form);
	}

/**
 * testInputHelpInline
 *
 * @return void
 */
	public function testInputHelpInline() {
		$form = $this->BootstrapForm->input('foo', array('helpInline' => 'help inline text'));
		$expected = '<div><label for="foo" class="control-label">Foo</label>' .
			'<div class="controls"><input name="data[foo]" type="text" id="foo">' .
			'<span class="help-inline">help inline text</span></div></div>';
		$this->assertSame($expected, $form);

		$form = $this->BootstrapForm->input('foo', array('helpInline' => array(
			'help inline 1',
			'help inline 2'
		)));
		$expected = '<div><label for="foo" class="control-label">Foo</label>' .
			'<div class="controls"><input name="data[foo]" type="text" id="foo">' .
			'<span class="help-inline">help inline 1</span> ' .
			'<span class="help-inline">help inline 2</span></div></div>';
		$this->assertSame($expected, $form);
	}

/**
 * testInputHelpBlock
 *
 * @return void
 */
	public function testInputHelpBlock() {
		$form = $this->BootstrapForm->input('foo', array('helpBlock' => 'help block text'));
		$expected = '<div><label for="foo" class="control-label">Foo</label>' .
			'<div class="controls"><input name="data[foo]" type="text" id="foo">' .
			'<p class="help-block">help block text</p></div></div>';
		$this->assertSame($expected, $form);

		$form = $this->BootstrapForm->input('foo', array('helpBlock' => array(
			'help block 1',
			'help block 2'
		)));
		$expected = '<div><label for="foo" class="control-label">Foo</label>' .
			'<div class="controls"><input name="data[foo]" type="text" id="foo">' .
			'<p class="help-block">help block 1</p>' .
			'<p class="help-block">help block 2</p></div></div>';
		$this->assertSame($expected, $form);
	}

/**
 * testInputCheckbox
 *
 * @return void
 */
	public function testInputCheckbox() {
		$form = $this->BootstrapForm->input('foo', array('type' => 'checkbox', 'label' => 'Foo'));
		$expected = '<div><input type="hidden" name="data[foo]" id="foo_" value="0">' .
			'<div class="controls"><label for="foo" class="checkbox">' .
			'<input type="checkbox" name="data[foo]" value="1" id="foo">Foo</label></div></div>';
		$this->assertSame($expected, $form);
	}

/**
 * testInputRadio
 *
 * @return void
 */
	public function testInputRadio() {
		$form = $this->BootstrapForm->input('foo', array(
			'type' => 'radio',
			'label' => 'Foo',
			'options' => array(1 => 'One', 2 => 'Two', 3 => 'Three')
		));
		$expected = '<div><label for="foo" class="control-label">Foo</label>' .
			'<input type="hidden" name="data[foo]" id="foo_" value=""><div class="controls">' .
			'<label class="radio"><input type="radio" name="data[foo]" id="Foo1" value="1">One</label>' . "\n" .
			'<label class="radio"><input type="radio" name="data[foo]" id="Foo2" value="2">Two</label>' . "\n" .
			'<label class="radio"><input type="radio" name="data[foo]" id="Foo3" value="3">Three</label>' .
			'</div></div>';
		$this->assertSame($expected, $form);
	}

/**
 * testInputSelect
 *
 * @return void
 */
	public function testInputSelect() {
		$form = $this->BootstrapForm->input('foo', array(
			'type' => 'select',
			'label' => 'Foo',
			'options' => array(1 => 'One', 2 => 'Two', 3 => 'Three')
		));
		$expected = '<div><label for="foo" class="control-label">Foo</label>' .
			'<div class="controls"><select name="data[foo]"  id="foo">' . "\n" .
			'<option value="1">One</option>' . "\n" .
			'<option value="2">Two</option>' . "\n" .
			'<option value="3">Three</option>' . "\n" .
			'</select></div></div>';
		$this->assertSame($expected, $form);
	}

}
