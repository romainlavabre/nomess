<?php
namespace App\Tables;


use App\Modules\Sample\Entity\Sample;

class SampleTable 
{

	/**
	 * Instance de PDO
	 *
	 * @var \PDO
	 */
	private $database;

	public function __construct(\PDO $db) {
		$this->database = $db;
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