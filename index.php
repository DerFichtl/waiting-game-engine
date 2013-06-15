<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();

require_once 'Game.php';
$game = new Game();

if(isset($_GET['a']) && ! empty($_GET['a'])) {
	$game->load();
	$game->handle($_GET['a']);
} else {
	/** START NEW GAME **/
	$game->start();
	$game->draw(false);
}
