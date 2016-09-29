var inputbox = '';
var numberOfMembers = document.getElementsByClassName('member-box').length;

$(document).ready(function(){
  $("#members-search").keyup(function(){
		inputbox = document.getElementById('members-search').value;
		updateResults();
	});
})

function updateResults() {
	var count = 0;
	var members = document.getElementsByClassName("member-box");
	for (var i = 0; i < members.length; i++) {
		var $member = $(members[i]);
		var memberName = $member.find('span').text();
		memberName = memberName.toLowerCase();
		inputbox = inputbox.toLowerCase();

		if ((count + 1) % 2 === 0) {
			$member.attr('class', 'box box-shadow transition member-box flex even')
		} else {
			$member.attr('class', 'box box-shadow transition member-box flex')			
		}

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
		var $member = $(document.getElementsByClassName('member-box'));
		$member.attr('class', 'box box-shadow transition member-box flex last')		
	} else {
		if ($('#no-results').length > 0) {
			$('#no-results').remove();
		}
	}
}

updateResults();
