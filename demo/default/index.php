<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();

require_once __DIR__.'/../../src/Game.php';
$game = new Game('default', __DIR__);

if(isset($_GET['a']) && ! empty($_GET['a'])) {
	$game->load();
	$game->handle($_GET['a']);
} else {
	/** START NEW GAME **/
	$game->start();
	$game->draw(false);
}