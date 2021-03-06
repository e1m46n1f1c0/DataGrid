<?php

use \Mesour\DataGrid\DibiDataSource;

$container = require_once __DIR__ . '/../bootstrap.php';

class DibiDataSourceTest extends \Test\DataSourceTestCase {

	CONST FULL_USER_COUNT = 20;

	/**
	 * @var \DibiConnection
	 */
	private $db;

	function __construct(Nette\DI\Container $container) {
		parent::__construct($container);
		$this->db = $this->getByType('\DibiConnection');
	}

	public function testTotalCount() {
		$source = new DibiDataSource($this->db->select('*')->from('user')->toDataSource());

		$this->matchTotalCount($source);
	}

	public function testLimit() {
		$source = new DibiDataSource($this->db->select('*')->from('user')->toDataSource());

		$this->matchLimit($source);
	}

	public function testOffset() {
		$source = new DibiDataSource($this->db->select('*')->from('user')->toDataSource());

		$this->matchOffset($source);
	}

	public function testWhere() {
		$source = new DibiDataSource($this->db->select('*')->from('user')->toDataSource());

		$source->where('[action] = ?', 1);

		$this->matchWhere($source);
	}

	public function testEmpty() {
		$source = new DibiDataSource($this->db->select('*')->from('empty')->toDataSource());

		$this->matchEmpty($source);
	}

	public function testCheckers() {
		$source = new DibiDataSource($this->db->select('*')->from('empty')->toDataSource());

		//todo: Works with MySQL but not with Sqlite3
		//$this->matchCheckers($source);
	}

	public function testCustom() {
		$source = new DibiDataSource($this->db->select('*')->from('empty')->toDataSource());

		//todo: Works with MySQL but not with Sqlite3
		//$this->matchCheckers($source);
	}

	public function testCustomOr() {
		$source = new DibiDataSource($this->db->select('*')->from('empty')->toDataSource());

		//todo: Works with MySQL but not with Sqlite3
		//$this->matchCheckersOr($source);
	}

}

$test = new DibiDataSourceTest($container);
$test->run();