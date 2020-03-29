<?php
namespace NoMess\Core;


class PDOFactory{

	public static function getMysqlConnection() {
		global $DataBase;
		$db = new \PDO('mysql:host=' . $DataBase['host'] . ';dbname=' . $DataBase['dbname'] . '', $DataBase['user'], $DataBase['password'], array(
				\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
		));
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		return $db;
	}
}