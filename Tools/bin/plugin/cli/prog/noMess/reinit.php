<?php
require 'fonction-Installer.php';

$comfirme = rdl("Êtes vous certain de vouloir réinitialiser la configuration ? [oui: o | non: Enter]: ");

$api = '../Api/';
if(!is_null($comfirme)){
	$tabCopyFile = array(
			'file/config-dev.php' => $api . 'config/config-dev.php',
			'file/config-prod.php' => $api . 'config/config-prod.php',
			'file/config-plugin.php' => $api . 'config/config-plugin.php',
			'file/config.php' => $api . 'config/config.php',
			'file/log-dev.txt' => $api . 'var/log/log-dev.txt',
			'file/log-prod.txt' => $api . 'var/log/log-prod.txt',
			'file/error.log' => $api . 'var/log/error.log',
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
