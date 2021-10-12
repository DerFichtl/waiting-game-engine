
Waiting Game Engine
===================

A basic game engine for text based role games ...

* While you wait you get money
* Page will be updated via ajax
* If you reload page you start a new game
* Games are not saved anywhere, just in session
* You can perform actions (if requirements are fulfilled)
* Requirements can be: Money, experience level, items
* An action can add or cost items
* Performed actions are saved as status
* An action can change your status


Features
--------

* Very simple action config in separate story file
* Separate view file and css
* Many possible combinations and interactions


### Actions

* Action can cost money
* Action can cost one or more items
* Action can add one or more items
* Action can increase or decrease experience
* Action can done if level is reached
* Raise level on experience
* Multiple texts for an action (random)


First steps
-----------

Look at the ./demo/default subfolder there are three files:

	game.js     - Simple reloader
	game.css	- Stylesheet for your game
	index.php   - Init the game
	view.php	- PHP/HTML view file with outputs for your game
	Story.php   - All actions and game startup infos

... after download there is a simple test game where you can fly a spaceship.

License
-------

see LICENSE


