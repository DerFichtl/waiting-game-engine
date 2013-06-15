var game = function(){
	return {
		init: function() {
			window.setInterval(this.loop, 1000);
		},
		loop: function() {
			$.get('?a=loop', function(res){
				$('body').html(res);
				game.initLoop();
			});
		},
		initLoop: function(){
			$('button').click(function(evt){
				
				evt.preventDefault();
				$.get('?a=' + $(evt.target).text(), function(res){
					
					$('body').html(res);
					game.initLoop();
				
				});
			});
		}
	}
}();

game.init();
