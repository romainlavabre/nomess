<?php

namespace NoMess\Core;


class ControllerManager extends AppManager{

	public function controlSession($index) : void
	{
		if(!isset($_SESSION[$index]) || empty($_SESSION[$index])){
		 	header("Location: " . WEBROOT . "A configurer dans ControllerManager");
		}
	}
}
