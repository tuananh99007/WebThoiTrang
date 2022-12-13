<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\CartRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    private $cartRepository;
    public function __construct(CartRepositoryInterface $inputCartRepository)
    {
        $this->cartRepository = $inputCartRepository;
    }
    public function purchase_account(Request $request)
    {

        $request->validate([
            'name' => 'min:1|max:255',
        ]);
        $userLogin = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $id = $request->input('id', null);
        $cartPurchase_account = $this->cartRepository->cart_purchase_account($name);
        return view('admin.cart.purchase_account', compact('cartPurchase_account', 'name', 'userLogin'));
    }

    public function listcart(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $listcart = $this->cartRepository->cart_listcart($name);
        return view('admin.cart.listcart', compact('listcart', 'userLogin'));
    }

    public function detail_cart(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $detail_cart = $this->cartRepository->cart_detail_cart($id);
        return view('admin.cart.detail_cart', compact('detail_cart', 'userLogin',));
    }

    public function confirm(Request $request)
    {
        $id = $request->input('id', null);
        $this->cartRepository->cart_confirm($id);
        return redirect()->back();
    }
}
