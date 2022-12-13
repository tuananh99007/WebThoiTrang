<?php

namespace App\Repositories\Interface;


interface ProductRepositoryInterfaceUsers
{
    public function productCartId($userLogin);
    public function product_cart_details($cart_id, $product_id);
    public function product_cart_details_update_add($cart_id, $product_id, $add_produc_cart);
    public function product_cart_details_update_more($cart_id, $product_id, $more_cart_details);
    public function product_cart_details_delete($cart_id, $product_id);
    public function product_confirm($id);
    public function product_order($userLogin);
    public function product_category_header();
    public function product_cart_info($userLogin);
}
