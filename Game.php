<?php

require_once 'game/Story.php';

Class Game {
	
	protected $startDate = 0;
	protected $lastLoopTime = 0;
	
	protected $runtime = 0;
	protected $experience = 0;
	protected $level = 1;
	protected $money = 1;
	protected $history = array();
	protected $items = array();
	protected $status = array();
	
	protected $_labels = array(
		'experience' => 'Experience',
		'runtime' => 'Runtime',
	);
	
	protected $_actions = array();
	protected $_levels = array();
	
	public function __construct() {
		$this->loadActions();
	}
	
	protected function loadActions() {
		$story = new Story();
		$this->_actions = $story->getActions();
		$this->_levels = $story->getLevels();
	}
	
	public function start() {	
		$this->reset();
		$this->startDate = time();
		$this->lastLoopTime = $this->startDate;
		$this->experience = 0;
		$this->status = array();
		
		$story = new Story();
		$this->history = $story->getPrehistory();
		$this->money = $story->getStartMoney();
		
		$this->save();
	}
	
	public function handle($action) {
		
		if(isset($this->_actions[$action])) {
			$actionName = $action;
			$action = $this->_actions[$action];
			
			if($this->checkAction($action)) {
				
				if(! isset($this->status[$actionName])) {
					$this->status[$actionName] = 0;
				}
				$this->status[$actionName]++;
				
				if (isset($action['needMoney'])) {
					$this->money -= $action['needMoney'];	
				}
				
				$this->experience += $action['addExperience'];
				$this->history[] = $action['texts'][rand(0, count($action['texts'])-1)];
				$this->setItems($action);
			}
			
			$this->save();
			$this->draw();
			
		} else {
			
			$needLoops = time()-$this->lastLoopTime;
			for($i=0; $i<$needLoops; $i++) {
				$this->loop();	
			}
			
			$this->save();
			$this->draw();
		}	
	}
	
	protected function checkAction($action) {
		$result = true;	
		
		if($this->level < $action['needLevel']) {
			$result = false;
		}
				
		if(isset($action['needMoney']) && $this->money < $action['needMoney']) {
			$result = false;
		}		
		
		if(isset($action['needItems']) && ! empty($action['needItems'])) {
			foreach($action['needItems'] as $item => $count) {
				if(! isset($this->items[$item]) || $this->items[$item] < $count) {
					$result = false;
				}
			}	
		}
		
		if(isset($action['needStatus']) && ! empty($action['needStatus'])) {
			foreach($action['needStatus'] as $status => $count) {
				if(! isset($this->status[$status]) || $this->status[$status] < $count) {
					$result = false;
				}
			}	
		}
			
		return $result;
	}
	
	protected function setItems($action) {
		
		if(isset($action['needItems'])) {
			foreach($action['needItems'] as $item => $count) {
				$this->items[$item] -= $count;
			}	
		}
		
		if(isset($action['addItems'])) {
			foreach($action['addItems'] as $item => $count) {	
				if(! isset($this->items[$item])) {
					$this->items[$item] = 0; 
				}
				$this->items[$item] += $count;
			}
		}
		
		if(isset($action['needStatus'])) {
			foreach($action['needStatus'] as $status => $count) {
				$this->status[$status] -= $count;
			}	
		}
	}
	
	public function loop() {
		
		$this->runtime = time()-$this->startDate;
		$this->money += $this->level*$this->level;
		
		$this->setLevel();
		
		$this->lastLoopTime = time();
	}
	
	protected function setLevel() {
		foreach($this->_levels as $benchmark => $level) {
			if($this->experience >= $benchmark) {
				$this->level = $level;
			} else {
				break;
			}
		}		
	}
	
	public function draw($bodyOnly = true) {

		ob_start();
			include 'game/view.php';
			$html = ob_get_contents();
		ob_end_clean();
		
		echo $html;
	}
	
	public function reset() {
		unset($_SESSION['GAME']);
	}
	
	public function load() {
		foreach(get_class_vars(__CLASS__) as $field => $value) {
			if(strpos($field, '_') === 0) {
				continue;
			}
			$this->$field = $_SESSION['GAME'][$field];	
		}
	}
	
	public function save() {
		foreach(get_class_vars(__CLASS__) as $field => $value) {
			if(strpos($field, '_') === 0) {
				continue;
			}
			$_SESSION['GAME'][$field] = $this->$field;	
		}
	}
}
