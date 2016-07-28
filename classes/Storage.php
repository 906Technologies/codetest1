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
	
	/*CODETEST*/
	public static function removeInventory($name,$type){
		foreach(self::getAllInventory() as $key => $armor){
			if($armor->getName() == $name && $armor->getLabel() == $type){
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
	
	/*Function should check $name and $type to see if there 
	is already armor-name and armor-type in inventory
	CODETEST*/
	public static function checkInventory($name,$type)
	{
		foreach(self::getAllInventory() as $key => $armor)
		{
			if($armor->getName() == $name) 
			{
				if($armor->getLabel() == $type)
				{return $armor;}
			}
			continue;
		}
		return null;
	}
	
	
}

