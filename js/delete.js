// conform before delete a booking
document.addEventListener("DOMContentLoaded", function() { 
    var deletes = document.getElementsByClassName("delete");
    for (var i=0; i<deletes.length; i++) 
    {
        deletes[i].addEventListener("click", function(){
            var confirmDelete = confirm('Are you sure to delete?');

            // if cancel
            if(!confirmDelete) {
                preventDefault();  // stops the link from being followed
            }
        })
    }
});