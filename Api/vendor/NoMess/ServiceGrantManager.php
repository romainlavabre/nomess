<?php
/*
 * @eclipse-formatter:off
 */
namespace NoMess\Core;


class ServiceGrantManager extends AppManager{

	// Verifie si les valeurs du tableau existe, on peut exclure une création d'erreur (par la clé)
	public function checkData(array $tabData, array $exclude = null) {
		foreach($tabData as $key => $value){
			if(empty($value)){
				if($exclude != null){
					$exc = true;
					foreach($exclude as $key2 => $value2){
						if($key == $key2){
							$exc = false;
							break;
						}
					}

					if($exc == true){
						return "Merci de remplir tous les champs";
					}
				}
			}
		}

		return null;
	}
}