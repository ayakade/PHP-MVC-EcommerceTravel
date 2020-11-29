// city suggestion 
document.addEventListener("DOMContentLoaded", function() {
	$(function(){
		//console.log("here");
		$(".fieldgroup input").on("keyup",function() {
			//alert("keypressed");

			// hit the server
			var searchTerm = $(this).val(); // what is typed in input field
			console.log($(this).val());

			// send to the server
			$.ajax({
				url: "index.php?controller=public&action=suggest&searchterm="+searchTerm, // pass the word
				success: function(response) {
					//console.log(response);
					// put the similar words from db into suggest
					$(".suggest").html(response); 
					bind();
				},
				error: function(){
					console.log("Oops something went wrong. Try again!");

				}
			})
		})
	});

	//needs delay timer keyup so its better
	var bind = function(){
		$("li").unbind("click")

		// when click the suggest word pass it to input field
		$("li").on("click", function(){
			$(".location").val($(this).html());
			//we get the value of "this" innerHTML to go inside the input field "location" on click.
			$(".suggest").hide();
		}) 
	}

	bind();
});