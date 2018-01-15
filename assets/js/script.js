// check off specific to dos by clicking

$(document).ready(function(){
	$("ul").on("click", "li", function(){
		$(this).toggleClass('completed');
		//ajax post request
		$.post('done.php',
			{id: $(this).attr('id') },
			function(data, status) {
				
			});
		});
//creating new task
$('#newTask').keypress(function(event){
	// console.log(event.which) //check the event number of ENTER
	if (event.which == 13) { //user pressed enter
		var todoText = $(this).val();
		// console.log(todoText);
		$.post('create.php',
			{task:todoText},
			function(data, status){
				// console.log(data);
				$('ul').append("<li id='"+data+"'><span><i class='fa fa-trash'></i></span> "+todoText+"</li>")

		});		
		$(this).val('');
	}
});


//deleting new task

$('ul').on('click', 'span', function(){

	//remove list item from DOM
	$(this).parent().fadeOut(500, function(){ // this = span
		$(this).remove(); // this = li
	});

	//ajax request to update JSON
	$.post('delete.php', 
		{id: $(this).parent().attr('id')},
		function(data, status){
			console.log(data);
	});
});


	$("li").hover(function(){
	    $(this).css({'transform' : 'translate(10%, 0)', 'background-color' : 'rgba(255, 255, 255, 0.7)'});
	    $(this).find('.fa-trash').css({'display' : 'inline-block', 'transform': 'translate(10%, 0)'})
	    }, function() {
		  $(this).css({'transform' : 'translate(0, 0)', 'background-color' : 'rgba(255, 255, 255, 0)'});
		  $(this).find('.fa-trash').css({'display':'none', 'transform': 'translate(0, 0)'})
	});
});