// calcurate fee
document.addEventListener("DOMContentLoaded", function() {

    $(function() {
        var price = $('#price').val();
        var guest = $('#guest').val();
        // console.log(guest);
         
        // if there's already dates and guest 
        if($('#guest').val()) {
            // how long stay
            // reference: https://stackoverflow.com/questions/38701847/how-can-i-convert-a-date-into-an-integer
            var checkinData = $('#checkin').val();
            var checkin = Number(new Date(checkinData));
            // console.log(checkin);
            var checkoutData = $('#checkout').val();
            var checkout = Number(new Date(checkoutData));
            // console.log(checkout);
            var totalStay = (checkout - checkin)/86400000;
            // console.log(totalStay);

            // sub total
            var subtotal = $('#subtotal'); 
            var subtotalPrice = price * totalStay;
            // console.log(subtotalPrice);
            subtotal.val(subtotalPrice);

            // tax (5%)
            var tax =$('#tax');
            var taxPrice = subtotalPrice * 0.05;
            // console.log(taxPrice);
            tax.val(taxPrice);

            // total
            var total =$('#total');
            var totalPrice = subtotalPrice + taxPrice;
            // console.log(totalPrice);
            total.val(totalPrice);

            // append each price
            var $div = $('.price');
            $div.append(`
                    <div class="row">
                        <label>subtotal</label>
                        <p>$</p><input type="text" id="subtotal" name="subtotal" value="${subtotalPrice}" />
                    </div><!-- .row -->

                    <div class="row">
                        <label>tax</label>
                        <p>$</p><input type="text" id="tax" name="tax" value="${taxPrice}" />
                    </div><!-- .row -->

                    <div class="row">
                        <label>total</label>
                        <p>$</p><input type="text" id="total" name="total" value="${totalPrice}" />
                    </div><!-- .row -->
                    `);
        } else {
            // calculate price when type guest number
            $('#guest').keyup(function() {
                // how long stay
                // reference: https://stackoverflow.com/questions/38701847/how-can-i-convert-a-date-into-an-integer
                var checkinData = $('#checkin').val();
                var checkin = Number(new Date(checkinData));

                var checkoutData = $('#checkout').val();
                var checkout = Number(new Date(checkoutData));

                var totalStay = (checkout - checkin)/86400000;

                // sub total
                var subtotalPrice = price * totalStay;

                // tax (5%)
                var taxPrice = subtotalPrice * 0.05;

                // total
                var totalPrice = subtotalPrice + taxPrice;

                // append each price
                var $div = $('.price');
                $div.append(`
                    <div class="row">
                        <label>subtotal</label>
                        <p>$</p><input type="text" id="subtotal" name="subtotal" value="${subtotalPrice}" />
                    </div><!-- .row -->

                    <div class="row">
                        <label>tax</label>
                        <p>$</p><input type="text" id="tax" name="tax" value="${taxPrice}" />
                    </div><!-- .row -->

                    <div class="row">
                        <label>total</label>
                        <p>$</p><input type="text" id="total" name="total" value="${totalPrice}" />
                    </div><!-- .row -->
                    `);
            });
        }
    });
});

