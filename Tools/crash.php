<?php
ini_set('display_errors', '1');

/*
    Vos crash test...
*/

$tab = array();

$tab['test1']['key1'] = 'value1';

$tab['test1'] = ['key2' => 'value2'];

var_dump($tab);