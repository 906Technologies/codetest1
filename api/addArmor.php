<?php
require_once __DIR__.'/../core.php';

if(!isset($_POST['type'])){
	die(json_encode(array('error'=>true,'message'=>'Missing Armor Type')));
}
/*Check to see if there is a name
CODETEST: addArmor start*/
if(!isset($_POST['name'])){
	die(json_encode(array('error'=>true,'message'=>'Missing Armor Name')));

/*Check to see that there is a value and that it is > 0*/
if(!isset($_POST['value']) || $_POST['value'] < 0){
	die(json_encode(array('error'=>true,'message'=>'Missing Armor Value or Value is not > 0')));
}

/*If name is set check to see that there are no armors of the same name and type.
CODETEST: addArmor end*/
if(Storage::checkInventory($_POST['name'],$_POST['type'])){
	die(json_encode(array('error'=>true,'message'=>'Armor has same name and type as armor that already exists')));
}
	
$armor = Armor::createArmor($_POST['type']);
$armor->setName($_POST['name'])->setValue($_POST['value']);

Storage::addInventory($armor);


echo json_encode(array('error'=>false,'message'=>'Armor Added Successfully'));
