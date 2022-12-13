<?php
    function percent($original_price, $promotional_price)
    {
    $percent = (($original_price - $promotional_price) / $original_price) * 100;
    return $percent;
    }
    function total_product_cost($promotional_price,$amount)
    {
    $total_product_cost = $promotional_price * $amount ;
    return $total_product_cost;
    }