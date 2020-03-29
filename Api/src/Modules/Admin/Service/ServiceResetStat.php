<?php

namespace App\Modules\Admin\Service;


use NoMess\Core\ServiceManager;

class ServiceResetStat extends ServiceManager{
	
	/**
	 * Réinitialise un module de statistiques
	 *
	 * @param array $tabGlob Identifiant du modules de statistique
	 * @return void
	 */
	public function treatment(array $tabGlob) : void 
	{
		$file = simplexml_load_file("Api/src/Lib/newweb-stat/stat.xml");
		
		$i = 0;
		foreach($file->entity as $value){
			if((string)$value->attributes()[0] === $tabGlob['entity']){
				$file->entity[$i] = "0";
			}
			
			$i++;
		}
		
		$file->asXML("Api/src/Lib/newweb-stat/stat.xml");
	}
}