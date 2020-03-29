<?php
// You can set up your BASE_URL
$BASE_URL = "app/back/module/";

$PathAutoload = array(
		$BASE_URL . "sample/entity/",
		$BASE_URL . "sample/service/"
);

// Abstract PHPMailer
// Config phpMailer Général
$mailer['host'] = "";
$mailer['port'] = 25; // Default
$mailer['emailFrom'] = "";
$mailer['nameFrom'] = "";
$mailer['username'] = "";
$mailer['password'] = "";
$mailer['encode'] = "utf-8"; // Default value
                             // Forgot Passsord
$mailer['objectForgotPassword'] = "";
$mailer['msg'] = ""; // Voir doc
                     // Contact web
$mailer["objectContact"] = "";
$mailer['for'] = "";


?>