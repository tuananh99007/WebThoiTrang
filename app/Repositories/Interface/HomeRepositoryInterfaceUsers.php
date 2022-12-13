<?php

namespace App\Repositories\Interface;


interface HomeRepositoryInterfaceUsers
{
    public function home_category_header();
    public function home_product_hot_deal();
    public function home_product_home($name);
    public function home_product_list($category_id);
    public function home_product_detail($id);
    public function home_cart($userLogin);
    public function home_cart_insert($userLogin);
    public function home_cart_details($cart,$product_id);
    public function home_cart_details_insert($cart,$product_id);
    public function home_add_cart_details_update($cart,$product_id,$cart_details);
    public function home_cart_join($userLogin);
    public function cart_info($userLogin);
    public function home_carts_list($userLogin);
    public function home_cart_detail($id);
}