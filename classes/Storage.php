<?php

class Storage{
	
	public static function saveOutfit(Outfit $outfit){
		$_SESSION['outfit'] = $outfit;
	}
	
	public static function getOutfit(){
		if(!isset($_SESSION['outfit'])){
			return null;
		}
		return $_SESSION['outfit'];
	}
	
	public static function getAllInventory(){
		if(!isset($_SESSION['equipment'])){
			$_SESSION['equipment'] = array();
		}
		return $_SESSION['equipment'];
	}
	
	public static function addInventory(Armor $armor){
		if(!isset($_SESSION['equipment'])){
			$_SESSION['equipment'] = array();
		}
		
		$_SESSION['equipment'][] = $armor;
	}
	
	public static function removeInventory($name){
		foreach(self::getAllInventory() as $key => $armor){
			if($armor->getName() == $name){
				unset($_SESSION['equipment'][$key]);
			}
		}
	}
	
	public static function getInventory($name){
		foreach(self::getAllInventory() as $key => $armor){
			if($armor->getName() != $name){
				continue;
			}
			return $armor;
		}
		return null;
	}
	
	
	
}

