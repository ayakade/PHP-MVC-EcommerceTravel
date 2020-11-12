<div class="customerList col-12 col-lg-12">
    <h1>Customers List</h1>

    <ol class="list">
        <?php
        foreach ($this->oCustomers as $customer)
        {
        ?>
        <li class="customer">
            <a href="index.php?controller=admin&action=customer&aId=<?=$customer->id?>">
            <p><?=$customer->name?></p>
            </a>
        </li><!-- .customer -->
        <?php
        }
        ?>
    </ol><!-- .list -->

</div><!-- .customerList / customerList.php -->