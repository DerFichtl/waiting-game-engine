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
 * - Random Items
 */
Class Story {
	
	protected $_startMoney = 1000;

    protected $_loopMoney = 1; // add money factor per loop

	protected $_prehistory = array(
		'text' => 'You are sitting in your shiny new sol-glider,<br />everything is polished and ready for take off ...',
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

        'Check your glider' => array(
            'texts' => array(
                'You get off your cockpit and walk around your glider, everything seems ok.',
            ),
            'addItems' => array(
                'Flawless Checklist' => 1
            ),
            'needLevel' => 1,
            'addExperience' => 10,
        ),

        'Check the Everstream' => array(
            'texts' => array(
                'You open a terminal and check the Everstream for opportunities ...',
            ),
            'addRandomItem' => array(
                'Delivery Job Offer' => 1,
                'Assassination Job Offer' => 1,
                'Mining Job Offer' => 1,
                'Spam Message' => 1,
            ),
            'needLevel' => 1,
            'addExperience' => 10,
        ),

        'Station cakewalk' => array(
            'texts' => array(
                'You jump out of your glider and walk around the space station ...',
            ),
            'addRandomItem' => array(
                'Delivery Job Offer' => 1,
                'Trade Job Offer' => 1,
            ),
            'needStatus' => array(
                'Take off' => 0,
            ),
            'needLevel' => 1,
            'addExperience' => 10,
        ),

        'Acquire clearance' => array(
            'texts' => array(
                'Ready for take off? You got your clearance certificate.',
            ),
            'addItems' => array(
                'Clearance Cert' => 1,
            ),
            'needItems' => array(
                'Flawless Checklist' => 1,
            ),
            'needMoney' => 100,
            'needLevel' => 1,
            'addExperience' => 50,
        ),

        'Take off' => array(
            'texts' => array(
                'Take off',
            ),
            'needItems' => array(
                'Clearance Cert' => 1,
            ),
            'needLevel' => 2,
            'addExperience' => 100,
        ),

        'Land on Station' => array(
            'texts' => array(
                'Land on Station',
            ),
            'needStatus' => array(
                'Take off' => 1,
            ),
            'needItems' => array(),
            'needMoney' => 100,
            'needLevel' => 1,
            'addExperience' => 100,
        ),

        'Buy mining laser' => array(
            'texts' => array(
                'You talked to your local ship dealer and bought a cheap mining laser.',
            ),
            'needStatus' => array(
                'Take off' => 0,
            ),
            'addItems' => array(
                'Mining Laser' => 1,
            ),
            'needLevel' => 2,
            'addExperience' => 10,
            'needMoney' => 500,
        ),

        'Mining Job' => array(
            'texts' => array(
                'You finished your mining job successful and returned to home station.',
            ),
            'needStatus' => array(
                'Take off' => 1,
            ),
            'needItems' => array(
                'Mining Job Offer' => 1,
                'Mining Laser' => 1,
            ),
            'needLevel' => 2,
            'addExperience' => 100,
            'addMoney' => 1000,
        ),

        'Delivery Job' => array(
            'texts' => array(
                'You finished your delivery job successful and returned to home station.',
            ),
            'needStatus' => array(
                'Take off' => 1,
            ),
            'needItems' => array(
                'Delivery Job Offer' => 1,
            ),
            'needLevel' => 2,
            'addExperience' => 100,
            'addMoney' => 500,
        ),

        'Assassination Job' => array(
            'texts' => array(
                'You finished your assassination job successful and returned to home station.',
            ),
            'needStatus' => array(
                'Take off' => 1,
            ),
            'needItems' => array(
                'Assassination Job Offer' => 1,
                'Shield Booster' => 1,
                'Laser Cannon' => 1,
            ),
            'needLevel' => 2,
            'addExperience' => 100,
            'addMoney' => 2000,
        ),


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
            'addRandomItem' => array(
                'Item 1' => 1,
                'Item 2' => 4,
            ),
            'needStatus' => array(
                'Action' => '>1',
                'Action' => '<2',
                'Action' => '=3',
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

    public function getLoopMoney(Game $game) {
        return $this->_loopMoney * $game->level;
    }
}
	