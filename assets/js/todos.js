/*  check off specific to dos by clicking  */
$("ul").on("click", "li", function() {
	$(this).toggleClass("completed");
	// toggle removes the completed - on/off

	//ajax post request
	$.post('done.php', //php file processes requests
		{id: $(this).attr('id')}, // first, get id of (this) and property to cahnge (.attr) -- pasa sa backend
		function(data,status){
		});

});  



//creating new task
$('#newTask').keypress(function(event) {

	/*console.log(event.which);*/

	if (event.which ==13) {

		var todoText = $(this).val();
		console.log(todoText);

		$(this).val('');

		//this is ajax request
		$.post('create.php', //will process update of json file
			{task: todoText},
			function(data, status) {
				//console.log(data);
				$('ul').append('<li id="'+ data + '"><span><i class="fa fa-trash"></i></span>' + todoText + '</li>');

			});
		
	}


});


//deleting a task
$('ul').on('click', 'span', function(event) {

	//remove list item from DOM (front end)
	$(this).parent().fadeOut(500, function() {
		$(this).remove();
	});


	//console.log($(this).parent().attr('id')); // retrieve id of item to be deleted

	//ajax request to update JSON (backend)
	$.post('delete.php', {id: $(this).parent().attr('id') }, function(data, status){


		//console.log(data);
	});

	event.stopPropagation();



});