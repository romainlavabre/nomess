<?php
use NoMess\Core\AppManager;

class ContentRooter extends AppManager{

	public static function getContent($page, $section) {
		if(@$file = simplexml_load_file('app/front/module/admin/var-content/' . $page . '.xml')){
			foreach($file->section as $value){ 
				if((string)$value->attributes()[0] === $section){
					return (string)$value;
				} 
			} 
		} 

		$tabContentPage::contentRooter()->getTable('contentPage')->read();

		$tabContentPage->reportLog("XML: Impossible d'afficher la section \"" . $section . "\" de la page \"" . $page . "\"");

		foreach($tabContentPage as $value){
			if($value->getValid() === 1){
				if($value->getIdPage() === $page && $value->getIdBlock() === $section){
					return $value->getContent();
				}
			}
		}

		$tabContentPage->reportLog("Sans Echec: Impossible d'afficher la section \"" . $section . "\" de la page \"" . $page . "\"");
		return "Erreur: Désolé, nous ne pouvons pas afficher cette section";
	}
}