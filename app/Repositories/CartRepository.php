<?php

namespace App\Repositories;

use App\Repositories\Interface\CartRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartRepositoryInterface
{
    public function cart_purchase_account($name)
    {
        return DB::table('carts')
            ->select(
                'users.name',
                'users.email'
            )
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->where('users.name', 'like', "%$name%")
            ->paginate(10);
    }

    public function cart_listcart($name)
    {
        return DB::table('carts')
            ->select(
                'carts.id',
                'carts.status',
                'users.name'
            )
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->where('name', $name)
            ->paginate(10);
    }

    public function cart_detail_cart($id)
    {
        return DB::table('carts')->select(
            'users.name as users_name',
            'cart_details.amount',
            'cart_details.cart_id',
            'product.name as product_name',
            'product.promotional_price',
            'product.picture',
            'product.trademark',
            'carts.status'
        )->join('users', 'users.id', '=', 'carts.user_id')
            ->join('cart_details', 'cart_details.cart_id', '=', 'carts.id')
            ->join('product', 'cart_details.product_id', '=', 'product.id')
            ->where('cart_id', $id)
            ->paginate(10);
    }

    public function cart_confirm($id)
    {
        return DB::table('carts')->select('*')->where('id', $id)->update([
            'status' => 2
        ]);
    }
}
