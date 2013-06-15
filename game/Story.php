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
		'Wait what happens ...
		<br />Get items, make money, gain experience. The combination counts!'
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

		'Buy beer' => array(
			'texts' => array(
				'You bought a beer at the bar.',
				'You ordered a big beer.',
				'"Bring me a beer, Baby!"'
			),
			'addItems' => array(
				'Beer' => 1,
			),
			'needLevel' => 1,
			'needMoney' => 50,
			'addExperience' => 10,
		),
		
		'Drink beer' => array(
			'texts' => array(
				'You drunk a beer',
			),
			'needItems' => array(
				'Beer' => 1,
			),
			'needLevel' => 1,
			'addExperience' => 15,
		),
		
		'Go home you are drunk' => array(
			'texts' => array(
				'You are at home now.',
			),
			'needStatus' => array(
				'Drink beer' => 5,
			),
			'needLevel' => 1,
			'addExperience' => 50,
		),
		
		'Puke' => array(
			'texts' => array(
				'Oh boy, you puke all over the toilette at your favourite pub.',
			),
			'needStatus' => array(
				'Drink beer' => 6,
			),
			'needLevel' => 1,
			'addExperience' => -50,
		),
		
		'Invite' => array(
			'texts' => array(
				'You treat some girls to a beer.',
				'"Hey girls wanna drink this beers with me?"'
			),
			'needItems' => array(
				'Beer' => 3,
			),
			'needLevel' => 2,
			'addExperience' => 100,
		),
		
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
	