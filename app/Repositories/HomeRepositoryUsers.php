<?php

namespace App\Repositories;

use App\Repositories\Interface\HomeRepositoryInterfaceUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeRepositoryUsers implements HomeRepositoryInterfaceUsers
{
    public function home_category_header()
    {
        return
            DB::table('category')->select('*')
            ->where('is_delete', 0)
            ->get()->toArray();
    }
    public function home_product_hot_deal()
    {
        return
            DB::table('product')->select('*')->where('is_delete', 0)->where('hot_flag', 1)->get()->toArray();
    }
    public function home_product_home($name)
    {
        return
            DB::table('product')->select('*')->where('is_delete', 0)
            ->where('name', 'like', "%$name%")->get()->toArray();
    }
    public function home_product_list($category_id)
    {
        return
            DB::table('product')->select('*')->where('category_id', $category_id)->get()->toArray();
    }
    public function home_product_detail($id)
    {
        return
            DB::table('product')->select(
                'product.id as product_id',
                'product.picture',
                'product.name',
                'category.name as category_name',
                'product.original_price',
                'product.promotional_price',
                'product.rating',
                'product.view',
                'product.trademark',
                'product.is_delete',
                'product.amount',
                'product.posts',
                'category.id as catrgory_id'
            )
            ->join('category', 'product.category_id', '=', 'category.id')
            ->where('product.id', $id)->first();
    }
    public function home_cart($userLogin)
    {
        return
            DB::table('carts')->select('*')
            ->where('user_id', $userLogin->id)
            ->where('status', 0)
            ->first();
    }
    public function home_cart_insert($userLogin)
    {
        return
            DB::table('carts')->insert([
                'user_id' => $userLogin->id,
                'status' => 0,
            ]);
    }
    public function home_cart_details($cart, $product_id)
    {
        return
            DB::table('cart_details')->select('*')
            ->where('cart_id', $cart->id)
            ->where('product_id', $product_id)->first();
    }
    public function home_cart_details_insert($cart, $product_id)
    {
        return
            DB::table('cart_details')->select('product_id')->insert([
                'cart_id' => $cart->id,
                'product_id' => $product_id,
                'amount' => 1
            ]);
    }
    public function home_add_cart_details_update($cart, $product_id, $cart_details)
    {
        return
            DB::table('cart_details')->select('product_id', 'id', 'cart_id', 'amount')
            ->where('cart_id', $cart->id)
            ->where('product_id', $product_id)
            ->update([
                'amount' => $cart_details->amount + 1,
            ]);
    }
    public function home_cart_join($userLogin)
    {
        return
            DB::table('carts')->select(
                'cart_details.cart_id',
                'users.name as user_name',
                'product.name as product_name',
                'product.promotional_price',
                'cart_details.amount as cart_details_amount',
                'product.amount as product_amount',
                'cart_details.product_id',
                'product.picture',
                'carts.status'
            )
            ->join('cart_details', 'carts.id', '=', 'cart_details.cart_id')
            ->join('product', 'product.id', '=', 'cart_details.product_id')
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->where('carts.user_id', $userLogin->id)
            ->where('carts.status', 0)
            ->get()->toArray();
    }
    public function cart_info($userLogin)
    {
        return
            DB::table('carts')
            ->select(
                'carts.id',
                'carts.user_id',
                'carts.status',
                'cart_details.product_id',
                'cart_details.amount'
            )
            ->join('cart_details', 'carts.id', '=', 'cart_details.cart_id')
            // ->where('carts.user_id', $userLogin->id)
            ->where('carts.status', 0)
            ->get()
            ->toArray();
    }
    public function home_carts_list($userLogin)
    {
        return
            DB::table('carts')
            ->select(
                'carts.id',
                'carts.status',
                'users.name'
            )
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->where('user_id', $userLogin->id)
            ->paginate(10);
    }
    public function home_cart_detail($id)
    {
        return
            DB::table('carts')->select(
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
}
