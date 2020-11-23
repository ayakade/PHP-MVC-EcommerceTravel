// calcurate fee
document.addEventListener("DOMContentLoaded", function() {

    $("#orderTotal").click(function () {
        calculatePrice();
    });

    function calculatePrice () {
        var price = $('#price').val();
        console.log(price);

        var guest = $('#guest').val();
        console.log(guest);

        // how long stay
        var checkin = $('#checkin').val();
        console.log(checkin);
        var checkout = $('#checkout').val();
        console.log(checkout);
        var difference = checkout - checkin;
        console.log(difference);

        // var totalStay = (checkout - checkin)/86400000;
        // console.log(totalStay);

        

        // // sub total
        // var subtotal = $('#subtotal'); 
        // var subtotalPrice = price * tatalStay;
        // console.log(subtotalPrice);
        // subtotal.val("$"+ subtotalPrice);

        // // // tax
        // var tax =$('#tax');
        // var taxPrice = subtotalPrice * 0.05;
        // console.log(taxPrice);
        // tax.val("$"+ taxPrice);

        // // // total
        // var total =$('#total');
        // var totalPrice = subtotalPrice + taxPrice;
        // console.log(totallPrice);
        // total.val("$"+ totalPrice);

    };
});

