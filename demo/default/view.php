<?php if(! $bodyOnly): ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Waiting Game Engine</title>
		<meta charset='utf-8'> 
		<link rel="stylesheet" href="default-game/game.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
		<script src="game.js"></script>
	</head>
	<body>

<?php endif; ?>
	
		<div id="game">
			
			<header>
				<h1>Waiting Game Engine</h1>
				<p><a target="_blank" href="https://github.com/DerFichtl/waiting-game-engine">
					View source code on GitHub</a></p>
			</header>
			
			<?php if($this->_actions): ?>
				<section id="actions">
					<h2>Actions:</h2>
					<?php foreach($this->_actions as $actionId => $action):?>
						<?php if($this->checkAction($action)): ?>
							<button><?=$actionId?></button>
						<?php endif; ?>
					<?php endforeach; ?>
				</section>
			<?php endif; ?>
				
			<?php if($this->items): ?>
				<section id="items">
					<h2>Items:</h2>
					<ul>
						<?php foreach($this->items as $item => $count):?>
							<li><?=$item?>: <?=$count?></li>
						<?php endforeach; ?>
					</ul>
				</section>
			<?php endif; ?>
			
			<section id="status">
				<h2>Status:</h2>
				<ul>
					<li>Level: <?=$this->level?></li>
					<li>Exp: <?=$this->experience?></li>
					<li>Money: <?=number_format($this->money, 2, ',', '')?></li>
				</ul>
				<ul>
					<?php foreach($this->status as $status => $count):?>
						<li><?=$status?>: <?=$count?></li>
					<?php endforeach; ?>
				</ul>
			</section>

			<section id="history">
				<ul>
					<?php foreach(array_reverse($this->history) as $action):?>
						<li>
                            <?=$action['text']?>
                            <?php if(isset($action['randomItem'])): ?>
                                <br />You got <?=$action['randomItem']?>
                            <?php endif; ?>
                            <span>Exp: <?=$action['addExperience']?></span>
                        </li>
					<?php endforeach; ?>
				</ul>
			</section>
			
		</div>
		
<?php if(! $bodyOnly): ?>		

	</body>
</html>

<?php endif; ?>

