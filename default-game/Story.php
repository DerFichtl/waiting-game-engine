<?php

/**
 * This is the Waiting Game Test Story ... 
 * look at the actions so see what's possible and how.
 * 
 * - Action can cost money
 * - Action can cost one or more items
 * - Action can add one or more items
 * - Action can increase or decrease experience
 * - Action can done if level is reached
 * - Raise level on experience
 * - Multiple texts for an action (random)
 */
Class Story {
	
	protected $_startMoney = 90;
	
	protected $_prehistory = array(
		'text' => 'Wait what happens ... <br />Get items, make money, gain experience. The combination counts!',
		'addExperience' => 0
	);
	
	// experience => level number
	protected $_levels = array(
		0 => 1,
		100 => 2,
		500 => 3,
		2500 => 4,
		5000 => 5,
		10000 => 6,
		15000 => 7,
	);
	
	protected $_actions = array(




		/*
		'Action/Item Name' => array(
			'texts' => array(
				'Text 1',
				'Text 2',
			),
			'needItems' => array(
				'Item 1' => 1,
				'Item 2' => 4,
			),
			'addItems' => array(
				'Item 1' => 1,
				'Item 2' => 4,
			),
			'needLevel' => 2,
			'needMoney' => 0,
			'addMoney' => 0,
			'addExperience' => 150,
		),
		*/

	);
	
	
	public function getActions() {
		return $this->_actions;
	}


	public function getLevels() {
		return $this->_levels;
	}

	
	public function getPrehistory() {
		return $this->_prehistory;
	}

	
	public function getStartMoney() {
		return $this->_startMoney;
	}

}
	