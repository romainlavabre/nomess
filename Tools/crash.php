<?php
ini_set('display_errors', '1');
class Test implements JsonSerializable{

    private $attr1;

    private $attr2;

    private $attr3;

    public $attr4;

    public function __construct()
    {
        $this->attr1 = "salut";
        $this->attr2 = "Bonjour";
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

$test = new Test();
$enc = json_encode($test);
$dec = json_decode($enc, true);

echo $dec[0];

