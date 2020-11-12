<div class="customer col-12">

    <div class="info">
        <?php	
        foreach ($this->oCustomers as $customer)
        { 
        ?>
        <table>
            <tr>
                <th>Customer ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Phone number</th>
            </tr>

            <tr>
                <td><?=$customer->id?></td>
                <td><?=$customer->strFirstName?></td>
                <td><?=$customer->strLastName?></td>
                <td><?=$customer->strEmail?></td>
                <td><?=$customer->strPhoneNumber?></td>
            </tr>
        </table>
        <?php
        }
        ?>
    </div><!-- .info -->


        <a class="cta" href="index.php?controller=admin&action=customerList">Go back customer list</a>

</div><!-- .customer / customer.php -->