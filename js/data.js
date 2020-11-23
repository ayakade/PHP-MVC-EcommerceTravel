// get data 
document.addEventListener("DOMContentLoaded", function() {
	$(function(){
		//console.log("here");
		$(".fieldgroup input").on("submit",function() {
			//alert("keypressed");

			// hit the server
			var checkin = $('#checkin').val(); // what is typed in input field
            console.log(checkin);
            var checkout = $('#checkout').val(); // what is typed in input field
            console.log(checkout);
            var guest = $('#guest').val(); // what is typed in input field
            console.log(guest);
            var subtotal = $('#subtotal').val(); // what is typed in input field
            console.log(subtotal);
            var tax = $('#tax').val(); // what is typed in input field
            console.log(tax);
            var total = $('#total').val(); // what is typed in input field
			console.log(total);

			// send to the server
			$.ajax({
				url: "index.php?controller=public&action=goCheckout&checkin="+checkin+"&checkout="+checkout+"guest="+guest+"&subtotal="+subtotal+"&tax="+tax+"&total="+total, // pass the word
				success: function(response) {
                    
				},
				error: function(){
					console.log("Oops something went wrong. Try again!");
				}
			})
		})
	});
});