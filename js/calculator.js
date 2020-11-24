// calcurate fee
document.addEventListener("DOMContentLoaded", function() {

    // $("#orderTotal").click(function () {
    //     calculatePrice();
    // });

    // function calculatePrice () {
    //     var price = $('#price').val();
    //     console.log(price);

    //     var guest = $('#guest').val();
    //     console.log(guest);

    //     // how long stay
    //     // reference: https://stackoverflow.com/questions/38701847/how-can-i-convert-a-date-into-an-integer
    //     var checkinData = $('#checkin').val();
    //     var checkin = Number(new Date(checkinData));
    //     console.log(checkin);
    //     var checkoutData = $('#checkout').val();
    //     var checkout = Number(new Date(checkoutData));
    //     console.log(checkout);
    //     var totalStay = (checkout - checkin)/86400000;
    //     console.log(totalStay);

    //     // sub total
    //     var subtotal = $('#subtotal'); 
    //     var subtotalPrice = price * totalStay;
    //     console.log(subtotalPrice);
    //     subtotal.val("$"+ subtotalPrice);

    //     // tax (5%)
    //     var tax =$('#tax');
    //     var taxPrice = subtotalPrice * 0.05;
    //     console.log(taxPrice);
    //     tax.val("$"+ taxPrice);

    //     // total
    //     var total =$('#total');
    //     var totalPrice = subtotalPrice + taxPrice;
    //     console.log(totalPrice);
    //     total.val("$"+ totalPrice);
    // };

    // reference: https://stackoverflow.com/questions/5947501/jquery-auto-calculation-based-on-field
    $(function() {
        var price = $('#price').val();
        console.log(price);

        var guest = $('#guest').val();
        console.log(guest);

        // how long stay
        // reference: https://stackoverflow.com/questions/38701847/how-can-i-convert-a-date-into-an-integer
        var checkinData = $('#checkin').val();
        var checkin = Number(new Date(checkinData));
        console.log(checkin);
        var checkoutData = $('#checkout').val();
        var checkout = Number(new Date(checkoutData));
        console.log(checkout);
        var totalStay = (checkout - checkin)/86400000;
        console.log(totalStay);

        // sub total
        var subtotal = $('#subtotal'); 
        var subtotalPrice = price * totalStay;
        console.log(subtotalPrice);
        subtotal.val("$"+ subtotalPrice);

        // tax (5%)
        var tax =$('#tax');
        var taxPrice = subtotalPrice * 0.05;
        console.log(taxPrice);
        tax.val("$"+ taxPrice);

        // total
        var total =$('#total');
        var totalPrice = subtotalPrice + taxPrice;
        console.log(totalPrice);
        total.val("$"+ totalPrice);

        // $(document).ready(function() { 
            
        // });

        // sub total
        $('#subtotal').change(function(){
            $('#subtotal').val("$"+ subtotalPrice);
        });

        // tax
        $('#tax').change(function(){
            $('#tax').val("$"+ taxPrice);
        });

        // total
        $('#total').change(function(){
            $('#total').val("$"+ totalPrice);
        });
    });
});

