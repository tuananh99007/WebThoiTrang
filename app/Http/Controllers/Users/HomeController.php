<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\HomeRepositoryInterfaceUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $homeRepositoryUsers;
    public function __construct(HomeRepositoryInterfaceUsers $homeRepositoryUsers)
    {
        $this->homeRepositoryUsers = $homeRepositoryUsers;
    }
    // màn hình home
    public function home(Request $request)
    {
        $userLogin = Auth::guard('users')->user();
        $name = $request->input('name');
        $categoryHeader = $this->homeRepositoryUsers->home_category_header();
        $producsHotDeal = $this->homeRepositoryUsers->home_product_hot_deal();
        $producsHome = $this->homeRepositoryUsers->home_product_home($name);
        
        $cartInfo = $this->homeRepositoryUsers->cart_info($userLogin);
        $amount = 0;
        foreach ($cartInfo as $key => $item) {
            $amount =  $item->amount + $amount;
        }
        return view('users.home.index', compact('producsHome', 'categoryHeader', 'producsHotDeal', 'cartInfo', 'amount', 'name'));
    }


    // màn hình chi tiết từng danh mục 
    public function category_detail(Request $request)
    {
        $userLogin = Auth::guard('users')->user();
        $category_id = $request->input('category_id', null);
        $name = $request->input('name');
        $products_list = $this->homeRepositoryUsers->home_product_list($category_id);
        $categoryHeader = $this->homeRepositoryUsers->home_category_header();
        $cartInfo = $this->homeRepositoryUsers->cart_info($userLogin);
        $amount = 0;
        foreach ($cartInfo as $key => $item) {
            $amount =  $item->amount + $amount;
        }
        return view('users.home.category_detail', compact('products_list', 'categoryHeader', 'userLogin', 'amount', 'name'));
    }

    // màn hình chi tiết từng sản phẩm
    public function detail(Request $request)
    {
        $userLogin = Auth::guard('users')->user();
        $name = $request->input('name');
        $categoryHeader = $this->homeRepositoryUsers->home_category_header();
        $producsHotDeal = $this->homeRepositoryUsers->home_product_hot_deal();
        $id = $request->input('id', null);
        $products_Detail = $this->homeRepositoryUsers->home_product_detail($id);
        $cartInfo = $this->homeRepositoryUsers->cart_info($userLogin);
        $amount = 0;
        foreach ($cartInfo as $key => $item) {
            $amount =  $item->amount + $amount;
        }
        return view('users.home.detail', compact('products_Detail', 'categoryHeader', 'userLogin', 'amount', 'producsHotDeal', 'name'));
    }

    // chức năng thêm vào giỏ hàng
    public function add(Request $request)
    {
        $name = $request->input('name');
        $categoryHeader = $this->homeRepositoryUsers->home_category_header();
        $producsHotDeal = $this->homeRepositoryUsers->home_product_hot_deal();
        $producsHome = $this->homeRepositoryUsers->home_product_home($name);
        $userLogin = Auth::guard('users')->user();
        $cartInfo = $this->homeRepositoryUsers->cart_info($userLogin);
        $amount = 0;
        foreach ($cartInfo as $key => $item) {
            $amount =  $item->amount + $amount;
        }
        $product_id = $request->input('product_id', null);
        $cart = $this->homeRepositoryUsers->home_cart($userLogin);
        if (empty($cart)) {
            $this->homeRepositoryUsers->home_cart_insert($userLogin);
            $cart = $this->homeRepositoryUsers->home_cart($userLogin);
        }
        $cart_details = $this->homeRepositoryUsers->home_cart_details($cart, $product_id);
        if (empty($cart_details)) {
            $this->homeRepositoryUsers->home_cart_details_insert($cart, $product_id);
        } else {
            $this->homeRepositoryUsers->home_add_cart_details_update($cart, $product_id, $cart_details);
        }
        return view('users.home.index', compact('producsHome', 'categoryHeader', 'producsHotDeal', 'amount', 'name'));
    }

    // màn hình giỏ hàng
    public function cart(Request $request)
    {

        $userLogin = Auth::guard('users')->user();
        $name = $request->input('name');
        $categoryHeader = $this->homeRepositoryUsers->home_category_header();
        $cartInfo = $this->homeRepositoryUsers->cart_info($userLogin);
        $amount = 0;
        foreach ($cartInfo as $key => $item) {
            $amount =  $item->amount + $amount;
        }
        $id = $request->input('id', null);
        // $carts = $this->homeRepositoryUsers->home_cart_join($userLogin);
        // dd($carts);
        $carts = DB::table('carts')->select(
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
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->join('cart_details', 'cart_details.cart_id', '=', 'carts.id')
            ->join('product', 'product.id', '=', 'cart_details.product_id')
            ->where('carts.user_id', $userLogin->id)
            ->where('carts.status', 0)
            ->get()->toArray();

        $total_money = 0;
        foreach ($carts as $index => $cartd) {
            $total_money =  $total_money + $cartd->promotional_price * $cartd->cart_details_amount;
        }
        return view('users.home.cart', compact('carts', 'categoryHeader', 'total_money', 'amount', 'name'));
    }
    // danh sach don hang
    public function cart_list(Request $request)
    {
        $userLogin = Auth::guard('users')->user();
        $name = $request->input('name');
        $categoryHeader = $this->homeRepositoryUsers->home_category_header();
        $users_name = $request->input('users_name', null);
        $carts_list = $this->homeRepositoryUsers->home_carts_list($userLogin);
        $cartInfo = $this->homeRepositoryUsers->cart_info($userLogin);
        $amount = 0;
        foreach ($cartInfo as $key => $item) {
            $amount =  $item->amount + $amount;
        }
        return view('users.home.cart_list', compact('categoryHeader', 'carts_list', 'amount', 'name'));
    }

    // chi tiet don hang
    public function cart_detail(Request $request)
    {
        $userLogin = Auth::guard('users')->user();
        $name = $request->input('name');
        $categoryHeader = $this->homeRepositoryUsers->home_category_header();
        $id = $request->input('id', null);
        $cart_detail = $this->homeRepositoryUsers->home_cart_detail($id);
        $cartInfo = $this->homeRepositoryUsers->cart_info($userLogin);
        $amount = 0;
        foreach ($cartInfo as $key => $item) {
            $amount =  $item->amount + $amount;
        }

        return view('users.home.cart_detail', compact('cart_detail', 'categoryHeader', 'amount', 'name'));
    }
}
