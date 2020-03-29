<?php

namespace App\Modules\Admin\Service;


use NoMess\Core\ServiceManager;

class ServiceAddView extends ServiceManager{
	
	/**
	 * Ajoute une vue aux statistiques
	 *
	 * @param string $entity Identifiant du module (entity ex: accueil)
	 * @return void
	 */
	public function treatment(string $entity): void 
	{
		@$file = simplexml_load_file("Api/src/Lib/newweb-stat/stat.xml");
		
		$i = 0;
		foreach($file->entity as $value){
			if((string)$value->attributes()[0] === $entity){
				$total = (int)$value + 1;
				$file->entity[$i] = $total;
			}
			
			$i++;
		}
		
		$file->asXML("Api/src/Lib/newweb-stat/stat.xml");
	}
}