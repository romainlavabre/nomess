<?php
/*
 * @eclipse-formatter:off
 */
namespace NoMess\Core;


class EntityManager{

	/**
	 * Hydrate l'entité
	 *
	 * @param array $donnees
	 * @return void
	 */
	public function hydrate(array $donnees) : void
	{
		foreach($donnees as $key => $value){
			$method = 'set' . ucfirst($key);

			if(method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

	public function __destruct() {}
}