<?php

// Array ------------------------------------------------------------------------------
function arrayByKey($key, array $array) {
	foreach($array as $keyArray => $value){
		if($keyArray === $key){
			return $value;
		}
	}

	return null;
}

function arrayByValue($value, $tab, $method = null) {
	foreach($tab as $value2){

		if($method !== null){
			if(trim($value2->$method()) === trim($value)){
				return $value2;
			}
		}else{
			if($value === $value2){
				return $value2;
			}
		}
	}

	return null;
}

// String --------------------------------------------------------------------------------
function searchStrByDelim(string $str, string $startDel, string $endDel = NULL, int $nbrOc = 1): ?string {
	if($endDel === NULL){
		$endDel = $startDel;
	}

	$find = 1;
	$content = NULL;
	$tabstr = str_split($str);
	$pass = FALSE;
	$findEndDel = FALSE;

	for($i = 0; $i < count($tabstr); $i++){

		if(is_null($content)){
			if($tabstr[$i] === $startDel && $nbrOc === $find){
				$content = "";
			}else if($tabstr[$i] === $startDel){
				if($pass === TRUE){
					$find++;
					$pass = FALSE;
				}else{
					$pass = TRUE;
				}
			}
		}else{
			if($tabstr[$i] !== $endDel){
				$content = $content . $tabstr[$i];
			}else{
				$findEndDel = TRUE;
				break;
			}
		}
	}

	if($findEndDel === TRUE){
		return $content;
	}else{
		return NULL;
	}
}

function rmCharByStr(string $char, string $str, int $nbrOc, bool $byStart = TRUE): string {
	$tabChar = str_split($str);
	$j = 1;

	if($byStart === TRUE){
		for($i = 0; $i < count($tabChar); $i++){
			if($tabChar[$i] === $char){
				if($nbrOc === $j){
					$tabChar[$i] = "";
					break;
				}else{
					$j++;
				}
			}
		}
	}else{
		for($i = count($tabChar) - 1; $i > 0; $i--){
			if($tabChar[$i] === $char){
				if($nbrOc === $j){
					$tabChar[$i] = "";
					break;
				}else{
					$j++;
				}
			}
		}
	}

	return implode($tabChar);
}

function copyDirRecursive($pathDirSrc, $pathDirDest): void {

	function controlDir(string $path, array $tab): bool {
		foreach($tab as $value){
			if($value === $path){
				return true;
			}
		}

		return false;
	}

	$tabGeneral = scandir($pathDirSrc);

	$tabDirWait = array();

	$dir = $pathDirSrc;

	$noPass = count(explode('/', $dir));

	do{
		$stop = false;

		do{
			$tabGeneral = scandir($dir);
			$dirFind = false;

			for($i = 0; $i < count($tabGeneral); $i++){
				if(is_dir($dir . $tabGeneral[$i] . '/') && $tabGeneral[$i] !== '.' && $tabGeneral[$i] !== '..'){
					if(!controlDir($dir . $tabGeneral[$i] . '/', $tabDirWait)){
						$dir = $dir . $tabGeneral[$i] . '/';
						$dirFind = true;
						break;
					}
				}
			}

			if(!$dirFind){
				$tabDirWait[] = $dir;
				$tabEx = explode('/', $dir);
				unset($tabEx[count($tabEx) - 2]);
				$dir = implode('/', $tabEx);
			}

			if(count(explode('/', $dir)) < $noPass){
				$stop = true;
				break;
			}
		}
		while($dirFind === true);
	}
	while($stop === false);

	$tabDest = explode('/', $pathDirSrc);

	foreach($tabDirWait as $valDir){

		$tabSrc = explode('/', $valDir);

		$racSrc = null;
		$findSrc = false;
		foreach($tabSrc as $valSrc){


			if($tabDest[count($tabDest) - 2] === $valSrc){
				$racSrc = $valSrc;
				$findSrc = true;
			}else if($findSrc === true){
				$racSrc = $racSrc . '/' . $valSrc;
			}
		}

		@mkdir($pathDirDest . $racSrc, 0777, true);

		$newPath = $pathDirDest . $racSrc . '/';

		$tabToCopy = scandir($valDir);

		foreach($tabToCopy as $value){
			if(!is_dir($valDir . $value) && $value !== '.' && $value !== '..'){
				if(copy($valDir . $value, $newPath . $value)){
					echo "Copie de " . $valDir . $value . " vers " . $pathDirDest . $value . "...\n";
				}else{
					echo "Echec: Le fichier " . $valDir . $value . " n'a pas pu être copié vers " . $pathDirDest . $value . "\n";
				}
			}
		}
	}
}

// File--------------------------------------------------------------------------------------------------
function addToXML($file, $path, string $child, ?string $value, ?array $attribute) {
	if(!is_null($value)){
		if(!is_null($path)){
			$file->$path->addChild($child, $value);
		}else{
			$file->addChild($child, $value);
		}
	}else{
		$file->addChild($child, "");
	}

	if(!is_null($attribute)){
		if(!is_null($path)){
			$path = $path . '->' . $child;
		}else{
			$path = $child;
		}

		foreach($attribute as $key => $value){
			$file->$path->addAttribute($key, $value);
		}
	}

	return $file;
}

function updateToXML($file, $value) {
	$file = $value;

	return $file;
}

function formatterXML($xml, $path) {
	$dom = new DOMDocument('1.0');
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	$dom->loadXML($xml->asXML()); // $xml est mon objet en provenance de SimpleXML !
	$formatedXML = $dom->saveXML();

	$h = fopen($path, 'w+');
	fwrite($h, $formatedXML);
	fclose($h);
}


