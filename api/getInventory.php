<?php
require_once __DIR__.'/../core.php';

$armors = Storage::getAllInventory();

$inventory = array();

foreach($armors as $armor){
	$inventory[] = $armor->serialize();
}


echo json_encode(array('error'=>false,'inventory'=> $inventory));