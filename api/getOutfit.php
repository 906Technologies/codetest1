<?php
require_once __DIR__.'/../core.php';

$outfit = Storage::getOutfit();

$data = null;
if($outfit){
	$data = $outfit->serialize();
}


echo json_encode(array('error'=>false,'outfit'=> $data));
