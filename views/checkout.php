<div class="checkout">
    <h2>Complete the booking and payment</h2>

    <form id="payment" method="post" action="index.php">
        <input type="hidden" name="controller" value="user" />
        <input type="hidden" name="action" value="processCheckout" />

        <input type="hidden" name="userId" value="" />
        <input type="hidden" name="totalStay" value="1" />
        <input type="hidden" name="checkin" value="<?=$_SESSION["checkin"]?>" />
        <input type="hidden" name="checkout" value="<?=$_SESSION["checkout"]?>" />
        <input type="hidden" name="guest" value="<?=$_SESSION["guest"]?>" />

        <div class="booking">
            <div class="row">
            <?php
            foreach ($this->oAccommodations as $accommodation)
            {
            ?>
                <input type="hidden" name="accommodationId" value="<?=$accommodation->id?>" />
                <img src="assets/<?=$accommodation->image?>" alt="<?=$accommodation->strName?>">
                <p><strong><?=$accommodation->strName?></strong></p>
            <?php
            }
            ?>
            </div><!-- .row --> 

            <div class="price">
                <div class="row">
                    <label>subtotal</label>
                    <input type="text" id="subtotal" name="subtotal" value="<?=$this->subtotal?>" />
                </div><!-- .row -->

                <div class="row">
                    <label>tax</label>
                    <input type="text" name="tax" value="<?=$this->tax?>" />
                </div><!-- .row -->   
                
                <div class="row">
                    <label>total</label>
                    <input type="text" name="total" value="<?=$this->total?>" />
                </div><!-- .row -->
            </div><!-- .price -->
        </div><!-- .booking -->

        <div class="info">
            <div class="review">
                <h3>Your trip</h3>

                <table>
                    <tr>
                        <th>Date<th>
                        <th>Guests</th>
                    </tr>

                    <tr>
                        <td><?=$this->checkin?> - <?=$this->checkout?><td>
                        <td><?=$this->guest?></td>
                    </tr>
                </table>
            </div><!-- .review -->

            <div class="payment">
                <h3>Payment</h3>

                <div class="fieldgroup required">
                    <label>Name on card</label>
                    <input type="text" name="payment" value="" placeholder="name">
                    <div class="errorpopup">
                        <p>This field is required</p>
                    </div><!-- .error pop up -->
                </div><!-- .fieldgroup -->

                <div class="fieldgroup required">
                    <label>Card number</label>
                    <input type="text" name="payment" value="" placeholder="card number">
                    <div class="errorpopup">
                        <p>This field is required</p>
                    </div><!-- .error pop up -->
                </div><!-- .fieldgroup -->

                <input class="cta" type="submit" value="Comfirm and pay">
            </div><!-- .payment -->
        <div><!-- .info -->
    </form>

</div><!-- .checkout / checkout.php -->