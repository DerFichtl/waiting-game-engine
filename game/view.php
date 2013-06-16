<? if(! $bodyOnly): ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Waiting Game Engine</title>
		<meta charset='utf-8'> 
		<link rel="stylesheet" href="game/game.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
		<script src="game.js"></script>
	</head>
	<body>

<? endif; ?>
	
		<div id="game">
			
			<header>
				<h1>Waiting Game Engine</h1>
				<p><a target="_blank" href="https://github.com/DerFichtl/waiting-game-engine">
					View source code on GitHub</a></p>
			</header>
			
			<? if($this->_actions): ?>
				<section id="actions">
					<h2>Actions:</h2>
					<? foreach($this->_actions as $actionId => $action):?>
						<? if($this->checkAction($action)): ?>
							<button><?=$actionId?></button>
						<? endif; ?>
					<? endforeach; ?>
				</section>
			<? endif; ?>
				
			<? if($this->items): ?>
				<section id="items">
					<h2>Items:</h2>
					<ul>
						<? foreach($this->items as $item => $count):?>
							<li><?=$item?>: <?=$count?></li>
						<? endforeach; ?>
					</ul>
				</section>
			<? endif; ?>
			
			<section id="status">
				<h2>Status:</h2>
				<ul>
					<li>Level: <?=$this->level?></li>
					<li>Exp: <?=$this->experience?></li>
					<li>Money: <?=number_format($this->money/100, 2, ',', '')?></li>
				</ul>
				<ul>
					<? foreach($this->status as $status => $count):?>
						<li><?=$status?>: <?=$count?></li>
					<? endforeach; ?>
				</ul>
			</section>

			<section id="history">
				<ul>
					<? foreach(array_reverse($this->history) as $action):?>
						<li><?=$action['text']?> <span>Exp: <?=$action['addExperience']?></span></li>
					<? endforeach; ?>
				</ul>
			</section>
			
		</div>
		
<? if(! $bodyOnly): ?>		

	</body>
</html>

<? endif; ?>

