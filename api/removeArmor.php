<?php
require_once __DIR__.'/../core.php';

if(!isset($_POST['name'])){
	die(json_encode(array('error'=>true,'message'=>'Missing Armor Name')));
}

Storage::removeInventory($_POST['name']);


echo json_encode(array('error'=>false,'message'=>'Armor Removed Successfully'));