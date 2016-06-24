<?php
require_once __DIR__.'/../core.php';

if(!isset($_POST['name'])){
	die(json_encode(array('error'=>true,'message'=>'Missing Armor Name')));
}

/*CODETEST*/
if(!isset($_POST['type']))
{die(json_encode(array('error'=>true,'message'=>'Missing Type')));}

/*Check to see that armor type is in getTypeLabels
TODO: doublecheck array search methods*/
if(!in_array($_POST['type'],Armor::getTypeLabels()){
	die(json_encode(array('error'=>true,'message'=>'Type is not a valid Armor Type')));
}
	
Storage::removeInventory($_POST['name'],$_POST['type']);


echo json_encode(array('error'=>false,'message'=>'Armor Removed Successfully'));