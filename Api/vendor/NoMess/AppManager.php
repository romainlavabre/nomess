<?php
/*
 * @eclipse-formatter:off
 */
namespace NoMess\Core;

class AppManager{

	private $_attribut = array();

	public function getTable($name, $dir = '') {
		$className = "App\\Tables\\" . $dir . ucfirst($name) . 'Table';
		return new $className($this->getDataBase());
	}

	public function getSession($param) {
		return $_SESSION[$param];
	}

	public function setSession($attribut, $value, $delete = false) {
		if($delete === true){
			unset($_SESSION[$attribut]);
		}

		$_SESSION[$attribut] = $value;
	}

	public function setAttribut($key, $value) {
		$this->_attribut[$key] = $value;
	}

	// Retourne le tableau d'attribut
	public function getAttribut() {
		return $this->_attribut;
	}

	public function reportLog($content) {
		global $Log;
		file_put_contents($Log, $content, FILE_APPEND);
	}

	public function redirect(string $url) : void
	{
		header('location' . ROOT . $url);
	}
	
	private function getDataBase() {
		return PDOFactory::getMysqlConnection();
	}
}