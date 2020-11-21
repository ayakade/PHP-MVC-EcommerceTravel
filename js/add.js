// validation for add new accommodation at admin
document.addEventListener("DOMContentLoaded", function() {
    var Validate = function() {
        var validate = this;
        validate.element = document.getElementById("add");

        validate.element.addEventListener("submit", function(event) {
            
            var error = false;
            var fieldGroups = document.getElementsByClassName("required"); 
            
            for(var i=0; i<fieldGroups.length; i++)
            {	
                if(error)
                {
                    event.preventDefault();
                } 
                
                var field = fieldGroups[i].querySelector("input, texearea, image");
                console.log(field);
                var fieldValue = field.value;

                if (fieldValue == "")
                {
                    fieldGroups[i].classList.add("error");
                    error = true;
                } else {
                    fieldGroups[i].classList.remove("error");
                }
            } // end of for(var i=0; i<fieldGroups.length; i++)
            
        }) // end of validate.element.addEventListener("submit", function(event)

    } // end of var Validate

    new Validate();
});