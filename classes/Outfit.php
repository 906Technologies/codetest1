<?php

class Outfit{
	
	/**
	 *
	 * @var Head 
	 */
	private $head = null;
	
	/**
	 *
	 * @var Chest 
	 */
	private $chest = null;
	
	/**
	 *
	 * @var Hands 
	 */
	private $hands = null;
	
	/**
	 *
	 * @var Legs 
	 */
	private $legs = null;
	
	/**
	 *
	 * @var Feet
	 */
	private $feet = null;
	
	/**
	 *
	 * @var Shoulders
	 */	
	private $shoulders = null;
	
	public function getHead() {
		return $this->head;
	}

	public function getChest() {
		return $this->chest;
	}

	public function getHands() {
		return $this->hands;
	}

	public function getLegs() {
		return $this->legs;
	}

	public function getFeet() {
		return $this->feet;
	}
	
	public function getShoulders()
	{return $this->shoulders;}
	
	public function setHead(Head $head = null) {
		$this->head = $head;
		return $this;
	}

	public function setChest(Chest $chest = null) {
		$this->chest = $chest;
		return $this;
	}

	public function setHands(Hands $hands = null) {
		$this->hands = $hands;
		return $this;
	}

	public function setLegs(Legs $legs = null) {
		$this->legs = $legs;
		return $this;
	}

	public function setFeet(Feet $feet = null) {
		$this->feet = $feet;
		return $this;
	}
	
	public function setShoulders(Shoulders $shoulders = null)
	{
		$this->shoulders = $shoulders;
		return $shoulders;
	}
	
	public function serialize(){
		return array(
			Head::getLabel() => ($this->getHead()) ? $this->getHead()->serialize() : null,
			Chest::getLabel() => ($this->getChest()) ? $this->getChest()->serialize() : null,
			Hands::getLabel() => ($this->getHands()) ? $this->getHands()->serialize() : null,
			Legs::getLabel() => ($this->getLegs()) ? $this->getLegs()->serialize() : null,
			Feet::getLabel() => ($this->getFeet()) ? $this->getFeet()->serialize() : null,
			Shoulders::getLabel() => ($this->getShoulders()) ? $this->getShoulders()->serialize():null
		);
	}
	
	public function __sleep()
    {
        return array('head', 'chest', 'hands', 'legs', 'feet', 'shoulders');
    }
	
	
}