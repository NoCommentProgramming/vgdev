var inputbox = '';
var numberOfGames = document.getElementsByClassName('game-box').length;

$(document).ready(function(){
  $("#games-search").keyup(function(){
		inputbox = document.getElementById('games-search').value;
		updateResults();
	});
})

function updateResults() {
	var count = 0;
	var games = document.getElementsByClassName("game-box");
	for (var i = 0; i < games.length; i++) {
		var $game = $(games[i]);
		var gameTitle = $game.find('h2').text();
		gameTitle = gameTitle.toLowerCase();
		inputbox = inputbox.toLowerCase();

		if ((count + 1) % 2 === 0) {
			$game.attr('class', 'box box-shadow transition game-box flex even')
		} else {
			$game.attr('class', 'box box-shadow transition game-box flex')			
		}

		if (gameTitle.indexOf(inputbox) === -1 && inputbox !== '') {
			$game.fadeOut();
		} else {
			$game.fadeIn();
			count++;
		}

	}

	if (count < 1) {
		if ($('#no-results').length < 1) {
			$('#games-page-content').append('<h2 class="box box-shadow" id="no-results">No games located</h2>');
		}
	} else if (count === 1) {
		var $game = $(document.getElementsByClassName('game-box'));
		$game.attr('class', 'box box-shadow transition game-box flex last')		
	}  else {
		if ($('#no-results').length > 0) {
			$('#no-results').remove();
		}
	}
}

updateResults();
