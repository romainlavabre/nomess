<?php
namespace App\Tables;


use NoMess\Core\AppManager;
use App\Modules\Sample\Entity\Sample;

class SampleTable extends AppManager{

	/**
	 * Instance de PDO
	 *
	 * @var \PDO
	 */
	private $db;

	public function __construct(\PDO $db) {
		$this->db = $db;
	}

	public function read() {
		$sample = new Sample();

		return null;
	}

	public function create() {
		return null;
	}

	public function update() {
		return null;
	}

	public function delete() {
		return null;
	}
}