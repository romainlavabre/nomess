<?php
/*
 * @eclipse-formatter:off
 */
namespace NoMess\Core;


class ControllerManager extends AppManager{

	public function controlSession() {
		if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
			return header("Location: " . WEBROOT . "admin");
		}
	}
}
