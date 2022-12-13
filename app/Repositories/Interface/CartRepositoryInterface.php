<?php

namespace App\Repositories\Interface;


interface CartRepositoryInterface
{
    public function cart_purchase_account($name);
    public function cart_listcart($name);
    public function cart_detail_cart($id);
    public function cart_confirm($id);
}