<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\ProductRepositoryInterfaceUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $productRepositoryUsers;
    public function __construct(ProductRepositoryInterfaceUsers $productRepositoryUsers)
    {
        $this->productRepositoryUsers = $productRepositoryUsers;
    }

    // thêm số lượng sản phẩm
    public function add_product(Request $request)
    {
        $userLogin = Auth::guard('users')->user();
        $product_id = $request->input('product_id', null);
        $cart_id = $this->productRepositoryUsers->productCartId($userLogin->id);
        $add_produc_cart = $this->productRepositoryUsers->product_cart_details($cart_id, $product_id);
        $this->productRepositoryUsers->product_cart_details_update_add($cart_id, $product_id, $add_produc_cart);
        return redirect()->route('users.home.cart');
    }
    // giảm số lượng
    public function reduce(Request $request)
    {
        $userLogin = Auth::guard('users')->user();
        $product_id = $request->input('product_id', null);
        $cart_id = $this->productRepositoryUsers->productCartId($userLogin);
        $more_cart_details = $this->productRepositoryUsers->product_cart_details($cart_id, $product_id);
        $this->productRepositoryUsers->product_cart_details_update_more($cart_id, $product_id, $more_cart_details);
        if ($more_cart_details->amount <= 1) {
            $this->productRepositoryUsers->product_cart_details_delete($cart_id, $product_id);
            return redirect()->route('users.home.cart');
        }
        return redirect()->route('users.home.cart');
    }
    public function delete(Request $request)
    {
        $userLogin = Auth::guard('users')->user();
        $product_id = $request->input('product_id', null);
        $cart_id = $this->productRepositoryUsers->productCartId($userLogin);
        $this->productRepositoryUsers->product_cart_details_delete($cart_id, $product_id);
        return redirect()->route('users.home.cart');
    }

    public function order(Request $request)
    {
        $userLogin = Auth::guard('users')->user();
        $categoryHeader = $this->productRepositoryUsers->product_category_header();
        $carts = $this->productRepositoryUsers->productCartId($userLogin);
        $this->productRepositoryUsers->product_order($userLogin);
        // $cart_detail = DB::table('cart_details')->select('*')->where('cart_id', $carts->id)->get()->toArray();
        // $product = DB::table('product')->select('*')->where('amount', 62)->get()->toArray();

        // DB::table('product')->where('id', $cart_detail->product_id)
        //     ->update([
        //         'amount' => $product->amount - $cart_detail->amount
        //     ]);
        $cartInfo = $this->productRepositoryUsers->product_cart_info($userLogin);
        $amount = 0;
        foreach ($cartInfo as $key => $item) {
            $amount =  $item->amount + $amount;
        }
        return view('users.product.order', compact('categoryHeader', 'amount'));
    }


    // ?xác nhận của user
    public function confirm(Request $request)
    {
        $id = $request->input('id', null);
        $this->productRepositoryUsers->product_confirm($id);
        return redirect()->back();
    }
}
