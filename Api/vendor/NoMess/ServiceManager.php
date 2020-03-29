<?php
namespace NoMess\Core;


class ServiceManager extends AppManager{

	private $_attribut = array(
			'error' => null,
			'success' => null
	);

	public function setAttribut($key, $value) {
		$this->_attribut[$key] = $value;
	}

	// Retourne le tableau d'attribut
	public function getAttribut() {
		return $this->_attribut;
	}

	public function __destruct() {}
}