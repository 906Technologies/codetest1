<?php
abstract class Armor{
	protected $name;
	
	protected $value;
	
	public static function getTypeLabels(){
		return array(
			0 => Head::getLabel(),
			1 => Chest::getLabel(),
			2 => Hands::getLabel(),
			3 => Legs::getLabel(),
			4 => Feet::getLabel(),
		);
	}
	
	public static function createArmor($type){
		switch ($type) {
			case 0:
				return new Head();
				break;
			case 1:
				return new Chest();
				break;
			case 2:
				return new Hands();
				break;
			case 3:
				return new Legs();
				break;
			case 4:
				return new Feet();
				break;
		}
	}
	
	public static function getLabel(){
		return null;
	}
	
	public function getName() {
		return $this->name;
	}

	public function getValue() {
		return $this->value;
	}

	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	public function setValue($value) {
		$this->value = $value;
		return $this;
	}
	
	public function serialize(){
		return array(
			'name' => $this->getName(),
			'value' => $this->getValue(),
			'type' => static::getLabel()
		);
	}
	
	public function __sleep()
    {
        return array('name', 'value');
    }
	
}

