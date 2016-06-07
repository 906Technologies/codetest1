<?php
require_once __DIR__.'/../core.php';

$outfit = new Outfit();

if(isset($_POST['Head'])){
	$outfit->setHead(Storage::getInventory($_POST['Head']));
}
if(isset($_POST['Chest'])){
	$outfit->setChest(Storage::getInventory($_POST['Chest']));
}
if(isset($_POST['Hands'])){
	$outfit->setHands(Storage::getInventory($_POST['Hands']));
}
if(isset($_POST['Legs'])){
	$outfit->setLegs(Storage::getInventory($_POST['Legs']));
}
if(isset($_POST['Feet'])){
	$outfit->setFeet(Storage::getInventory($_POST['Feet']));
}

Storage::saveOutfit($outfit);

echo json_encode(array('error'=>false,'message'=>'Outfit Saved Successfully'));