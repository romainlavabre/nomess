<?php

namespace App\Modules\Admin\Service;


use NoMess\Core\ServiceManager;
use App\Modules\Admin\Entity\ContentPage;

class ServiceUpdateXmlSection extends ServiceManager
{

	/**
	 * Mets à jour la section du fichier XML 
	 *
	 * @param ContentPage $section
	 * @return void
	 */
	public function treatment(ContentPage $section) : string
	{
		if($file = simplexml_load_file('Api/src/Lib/var-content/' . $section->getIdPage() . '.xml')){
			$i = 0;

			foreach($file->section as $value){
				if((string)$value->attributes()[0] === $section->getIdBlock()){
					$file->section[$i] = $section->getContent();
					$file->asXML('Api/src/Lib/var-content/' . $section->getIdPage() . '.xml');


					return 'Section mise à jour';
				}

				$i++;
			}

		}
			
		return 'Erreur (code 2): echec de la mise à jour de la section';
		
	}
}