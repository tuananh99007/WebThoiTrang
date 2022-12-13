<?php

namespace App\Repositories;

use App\Repositories\Interface\ProductRepositoryInterfaceUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductRepositoryUsers implements ProductRepositoryInterfaceUsers
{
    public function productCartId($user_id)
    {
        return DB::table('carts')->select('*')
            ->where('user_id', 6)
            ->where('status', 0)
            ->first();
    }

    public function product_cart_details($cart_id, $product_id)
    {
        return
            DB::table('cart_details')->select('*')
            ->where('cart_id', $cart_id->id)
            ->where('product_id', $product_id)
            ->first();
    }

    public function product_cart_details_update_add($cart_id, $product_id, $add_produc_cart)
    {
        return
            DB::table('cart_details')->select('*')
            ->where('cart_id', $cart_id->id)
            ->where('product_id', $product_id)
            ->update(
                [
                    'amount' => $add_produc_cart->amount + 1
                ]
            );
    }
    public function product_cart_details_update_more($cart_id, $product_id, $more_cart_details)
    {
        return
            DB::table('cart_details')->select('*')
            ->where('cart_id', $cart_id->id)
            ->where('product_id', $product_id)
            ->update(
                [
                    'amount' => $more_cart_details->amount - 1
                ]
            );
    }
    public function product_cart_details_delete($cart_id, $product_id)
    {
        return
            DB::table('cart_details')
            ->where('cart_id', $cart_id->id)
            ->where('product_id', $product_id)
            ->delete();
    }
    public function product_confirm($id)
    {
        return
            DB::table('carts')->select('*')->where('id', $id)->update([
                'status' => 3
            ]);
    }
    public function product_order($userLogin)
    {
        return
            DB::table('carts')->select('id', 'user_id', 'status')
            ->where('user_id', $userLogin->id)
            ->where('status', 0)
            ->update([
                'status' => 1
            ]);
    }
    public function product_category_header()
    {
        return
            DB::table('category')->select('*')->where('is_delete', 0)->get()->toArray();
    }
    public function product_cart_info($userLogin)
    {
        return
            DB::table('carts')
            ->select(
                'carts.id',
                'carts.user_id',
                'cart_details.product_id',
                'cart_details.amount'
            )
            ->join('cart_details', 'carts.id', '=', 'cart_details.cart_id')
            ->where('carts.user_id', $userLogin->id)
            ->where('carts.status', 0)
            ->get()
            ->toArray();
    }
}
