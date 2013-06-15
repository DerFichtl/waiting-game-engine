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
			<h1>Waiting Game Engine</h1>
			
			<section id="status">
				<p>Level: <?=$this->level?></p>
				<p>Exp: <?=$this->experience?></p>
				<p>Money: <?=number_format($this->money/100, 2, ',', '')?></p>
				<ul>
					<? foreach($this->status as $status => $count):?>
						<li><?=$status?>: <?=$count?></li>
					<? endforeach; ?>
				</ul>
			</section>
			
			<section id="items">
				<h2>Items:</h2>
				<ul>
					<? foreach($this->items as $item => $count):?>
						<li><?=$item?>: <?=$count?></li>
					<? endforeach; ?>
				</ul>
			</section>
			
			<section id="actions">
				<h2>Actions:</h2>
				<? foreach($this->_actions as $actionId => $action):?>
					<? if($this->checkAction($action)): ?>
						<button><?=$actionId?></button>
					<? endif; ?>
				<? endforeach; ?>
			</section>
			
			<section id="history">
				<h2>Story so far:</h2>
				<ul>
					<? foreach(array_reverse($this->history) as $part):?>
						<li><?=$part?></li>
					<? endforeach; ?>
				</ul>
			</section>
		</div>
		
<? if(! $bodyOnly): ?>		

	</body>
</html>

<? endif; ?>

