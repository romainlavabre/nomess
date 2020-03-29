<?php
echo "Lancement de la configuration...\n";

require 'fonction-Installer.php';

$comfirme = rdl("Plusieurs fichier vont être remplacé (index.php, WorkException.php, Response.php), continuer ? [oui: o | non: Enter]: ");


$api = '../Api/';
if(!is_null($comfirme)){
	$tabCopyFile = array(
			'context/Response-dev.php' => $api . 'vendor/NoMess/Response.php',
			'context/WorkException-dev.php' => $api . 'vendor/NoMess/WorkException.php',
			'context/index-dev.php' => '../index.php'
	);

	foreach($tabCopyFile as $key => $value){
		$tabFile = explode("/", $key);
		$tabLength = count($tabFile);

		if(@copy($key, $value)){
			echo "Fichier " . $tabFile[$tabLength - 1] . " réinitialisé\n";
		}else{
			echo "Error: Le fichier " . $tabFile[$tabLength - 1] . " n'a pas pu être créé\n";
			$error[] = "Le fichier " . $tabFile[$tabLength - 1] . " n'a pas pu être créé\n";
		}
	}
}