var inputbox = '';
var numberOfGames = document.getElementsByClassName('flex-1-container').length;

$(document).ready(function(){
  $("#games-search").keyup(function(){
		inputbox = document.getElementById('games-search').value;
		updateResults();
	});
})

function updateResults() {
	var count = 0;
	var games = document.getElementsByClassName("flex-1-container");
	for (var i = 0; i < games.length; i++) {
		var $game = $(games[i]);
		var gameTitle = $game.find('.title').text();
		var gameSubtitle = $game.find('.subtitle').text();
		var gameSemester = $game.find('.semester').text();
		gameTitle = gameTitle.toLowerCase();
		gameSubtitle = gameSubtitle.toLowerCase();
		gameSemester = gameSemester.toLowerCase();
		inputbox = inputbox.toLowerCase();

		if (gameTitle.indexOf(inputbox) === -1 &&
				 gameSubtitle.indexOf(inputbox) === -1 &&
				 gameSemester.indexOf(inputbox) === -1 &&
				 inputbox !== '') {
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
		var $game = $(document.getElementsByClassName('flex-1-container'));
		if ( $('#no-results')) { 
			$( '#no-results').remove();
		}
	}  else {
		if ($('#no-results').length > 0) {
			$('#no-results').remove();
		}
	}


}

updateResults();
