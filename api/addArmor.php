<?php
require_once __DIR__.'/../core.php';

if(!isset($_POST['type'])){
	die(json_encode(array('error'=>true,'message'=>'Missing Armor Type')));
}

$armor = Armor::createArmor($_POST['type']);
$armor->setName($_POST['name'])->setValue($_POST['value']);

Storage::addInventory($armor);


echo json_encode(array('error'=>false,'message'=>'Armor Added Successfully'));
