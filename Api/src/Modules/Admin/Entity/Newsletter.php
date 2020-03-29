<?php
/*
 * @eclipse-formatter:off
 */
namespace App\Modules\Admin\Entity;

use NoMess\Core\EntityManager;

class Newsletter extends EntityManager implements \JsonSerializable{
	private $_id,
			$_email;
	
	//Getter----------------------
	/**
	 * @return integer
	 */
	public function getId() : int
	{
		return $this->_id;
	}
		
	/**
	 * @return string
	 */
	public function getEmail() : string
	{
		return $this->_email;
	}
	
	//Setter ---------------------
	/**
	 * @param int $id
	 * @return void
	 */
	public function setId(int $id) : void
	{
		$this->_id = $id;
	}
	
	/**
	 * @param string $email
	 * @return void
	 */
	public function setEmail(string $email) : void
	{
		$this->_email = $email;
	}

	/**
	 *
	 * @return array
	 */
	public function jsonSerialize() : array
    {
        return get_object_vars($this);
    }
}