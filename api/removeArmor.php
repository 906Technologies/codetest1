<?php
require_once __DIR__.'/../core.php';

if(!isset($_POST['name'])){
	die(json_encode(array('error'=>true,'message'=>'Missing Armor Name')));
}
if(!isset($_POST['type']))
{die(json_encode(array('error'=>true,'message'=>'Missing Type')));}

Storage::removeInventory($_POST['name'],$_POST['type']);


echo json_encode(array('error'=>false,'message'=>'Armor Removed Successfully'));