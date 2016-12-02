var inputbox = '';
var numberOfMembers = document.getElementsByClassName('flex-1-container').length;

$(document).ready(function(){
  $("#members-search").keyup(function(){
		inputbox = document.getElementById('members-search').value;
		updateResults();
	});
})

function updateResults() {
	var count = 0;
	var members = document.getElementsByClassName("flex-1-container");
	for (var i = 0; i < members.length; i++) {
		var $member = $(members[i]);
		var memberName = $member.find('.member-name').text();
		memberName = memberName.toLowerCase();
		inputbox = inputbox.toLowerCase();

		if (memberName.indexOf(inputbox) === -1 && inputbox !== '') {
			$member.fadeOut();
		} else {
			$member.fadeIn();
			count++;
		}

	}

	if (count < 1) {
		if ($('#no-results').length < 1) {
			$('#all-members').append('<h2 class="box box-shadow" id="no-results">No members located</h2>');
		}
	} else if (count === 1) {
		if ( $('#no-results')) { 
			$( '#no-results').remove();
		}		
	} else {
		if ($('#no-results').length > 0) {
			$('#no-results').remove();
		}
	}
}

updateResults();
