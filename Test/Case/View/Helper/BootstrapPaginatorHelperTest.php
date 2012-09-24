<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('BootstrapPaginatorHelper', 'TwitterBootstrap.View/Helper');

/**
 * BootstrapPaginatorHelper Test Case
 *
 */
class BootstrapPaginatorHelperTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->BootstrapPaginator = new BootstrapPaginatorHelper($View);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BootstrapPaginator);

		parent::tearDown();
	}

/**
 * testNumbersEmpty
 *
 * @return void
 */
	public function testNumbersEmpty() {
		$this->BootstrapPaginator->request->params['paging']['Post'] = array(
			'page' => 1,
			'current' => 0,
			'count' => 0,
			'prevPage' => false,
			'nextPage' => false,
			'pageCount' => 1,
			'order' => null,
			'limit' => 20,
			'options' => array(
				'page' => 1,
				'conditions' => array()
			),
			'paramType' => 'named'
		);
		$numbers = $this->BootstrapPaginator->numbers(array('model' => 'Post'));
		$this->assertSame('', $numbers);
	}

/**
 * testNumbersSimple
 *
 * @return void
 */
	public function testNumbersSimple() {
		$this->BootstrapPaginator->request->params['paging']['Post'] = array(
			'page' => 1,
			'current' => 20,
			'count' => 100,
			'prevPage' => false,
			'nextPage' => true,
			'pageCount' => 5,
			'order' => null,
			'limit' => 20,
			'options' => array(
				'page' => 1,
				'conditions' => array()
			),
			'paramType' => 'named'
		);

		$expected = '<li class="current disabled"><a href="#">1</a></li>' .
			'<li><a href="/index/page:2">2</a></li>' .
			'<li><a href="/index/page:3">3</a></li>' .
			'<li><a href="/index/page:4">4</a></li>' .
			'<li><a href="/index/page:5">5</a></li>';

		$numbers = $this->BootstrapPaginator->numbers(array('model' => 'Post'));
		$this->assertSame($expected, $numbers);
	}

/**
 * testNumbersElipsis
 *
 * @return void
 */
	public function testNumbersElipsis() {
		$this->BootstrapPaginator->request->params['paging']['Post'] = array(
			'page' => 10,
			'current' => 20,
			'count' => 1000,
			'prevPage' => true,
			'nextPage' => true,
			'pageCount' => 200,
			'order' => null,
			'limit' => 20,
			'options' => array(
				'page' => 1,
				'conditions' => array()
			),
			'paramType' => 'named'
		);

		$expected = '<li><a href="/index/page:1">1</a></li>' .
			'<li class="disabled"><a href="#">…</a></li>' .
			'<li><a href="/index/page:6">6</a></li>' .
			'<li><a href="/index/page:7">7</a></li>' .
			'<li><a href="/index/page:8">8</a></li>' .
			'<li><a href="/index/page:9">9</a></li>' .
			'<li class="current disabled"><a href="#">10</a></li>' .
			'<li><a href="/index/page:11">11</a></li>' .
			'<li><a href="/index/page:12">12</a></li>' .
			'<li><a href="/index/page:13">13</a></li>' .
			'<li><a href="/index/page:14">14</a></li>' .
			'<li class="disabled"><a href="#">…</a></li>' .
			'<li><a href="/index/page:200">200</a></li>';

		$numbers = $this->BootstrapPaginator->numbers(array(
			'model' => 'Post',
			'modulus' => 8,
			'first' => 1,
			'last' => 1,
		));
		$this->assertSame($expected, $numbers);
	}

}
