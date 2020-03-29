<?php

namespace App\Modules\Admin\Service;


use NoMess\Core\ServiceManager;

class ServiceReadStat extends ServiceManager{
	
	/**
	 * Retourne les modules de statistiques
	 *
	 * @return array|null
	 */
	public function treatment(): ?array 
	{
		$tabArray = array();
		@$file = simplexml_load_file("Api/src/Lib/newweb-stat/stat.xml");
		
		foreach($file->entity as $value){
			$tabArray[(string)$value->attributes()['id']] = (string)$value;
		}
		
		return $tabArray;
	}
}