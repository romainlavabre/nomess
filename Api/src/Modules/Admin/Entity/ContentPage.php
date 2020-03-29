<?php
/*
 * @eclipse-formatter:off
 */
namespace App\Modules\Admin\Entity;

use NoMess\Core\EntityManager;


class ContentPage extends EntityManager implements \JsonSerializable{

	private $_id, 
			$_idPage, 
			$_idBlock, 
			$_content, 
			$_valid;


	// Getter --------------------------------------------------------------------
	public function getId() {
		return $this->_id;
	}

	public function getIdPage() {
		return $this->_idPage;
	}

	public function getIdBlock() {
		return $this->_idBlock;
	}

	public function getContent() {
		return $this->_content;
	}

	public function getValid() {
		return $this->_valid;
	}

	// Setter --------------------------------------------------------------------
	public function setId($setter) {
		$this->_id = $setter;
	}

	public function setIdPage($setter) {
		$this->_idPage = $setter;
	}

	public function setIdBlock($setter) {
		$this->_idBlock = $setter;
	}

	public function setContent($setter) {
		$this->_content = $setter;
	}

	public function setValid($setter) {
		$this->_valid = $setter;
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