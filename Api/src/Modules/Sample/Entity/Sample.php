<?php
namespace App\Modules\Sample\Entity;


use NoMess\Core\EntityManager;

class Sample extends EntityManager implements \JsonSerializable
{

	public function getSample() 
	{
		return null;
	}

	public function jsonSerialize() : array
	{
    	return get_object_vars($this);
	}
}