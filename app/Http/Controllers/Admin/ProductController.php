<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $productRepository;
    public function __construct(ProductRepositoryInterface $inputProductRepository)
    {
        $this->productRepository = $inputProductRepository;
    }

    public function list(Request $request)
    {
        $request->validate([
            'name' => 'max:255',
            'trademark' => 'max:255',
        ]);
        $userLogin = Auth::guard('admin')->user();
        $trademark = $request->input('trademark', null);
        $name = $request->input('name', null);
        $productList = $this->productRepository->products_list($name, $trademark);
        $messageNotify = session('message_noify', null);
        return view('admin.product.list', compact(
            'productList',
            'name',
            'messageNotify',
            'userLogin',
            'trademark',
        ));
    }

    public function add(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $categoryADD = $this->productRepository->products_category();
        return view('admin.product.add', compact('categoryADD', 'userLogin'));
    }

    public function postadd(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'trademark' => 'required|min:1|max:255',
            'name' => 'required|min:1|max:255',
            'posts' => 'max:255',
            'original_price' => 'required|integer',
            'promotional_price' => 'required|integer',
            'picture' => 'required',
            'amount' => 'required|integer',
        ]);
        $categoty_id = $request->input('category_id', null);
        $trademark = $request->input('trademark', null);
        $name = $request->input('name', null);
        $posts = $request->input('posts', null);
        $original_price = $request->input('original_price', null);
        $promotional_price = $request->input('promotional_price', null);
        $amount = $request->input('amount', null);
        $is_delete = 0;
        $picture = $request->file('picture');
        if (empty($picture) != true) {
            $namePicture = $picture->hashName();
            $urlPicture = "/upload/products/" . $namePicture;
            $picture->store('upload/products');
        }
        $this->productRepository->product_postadd(
            $categoty_id,
            $trademark,
            $name,
            $posts,
            $original_price,
            $promotional_price,
            $is_delete,
            $urlPicture,
            $amount
        );
        session()->flash('message_noify', 'Bạn đã thêm sản phẩm thành công');
        return redirect()->route('admin.product.list');
    }

    public function update(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $categoryUpdate = $this->productRepository->products_category();
        $productUpdate = $this->productRepository->product_update($id);
        return view('admin.product.update', compact('productUpdate', 'categoryUpdate', 'userLogin'));
    }

    public function postupdate(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'trademark' => 'required|min:1|max:255',
            'name' => 'required|min:1|max:255',
            'original_price' => 'required|integer',
            'promotional_price' => 'required|integer',
            'amount' => 'required|integer',
        ]);
        $id = $request->input('id', null);
        $product = $this->productRepository->product_update($id);
        $categoty_id = $request->input('category_id', null);
        $trademark = $request->input('trademark', null);
        $name = $request->input('name', null);
        $posts = $request->input('posts', null);
        $original_price = $request->input('original_price', null);
        $promotional_price = $request->input('promotional_price', null);
        $amount = $request->input('amount', null);
        $picture = $request->file('picture');
        if (empty($picture) != true) {
            Storage::delete($product->picture);
            $namePicture = $picture->hashName();
            $urlPicture = "/upload/products/" . $namePicture;
            $picture->store('upload/products');
        } else {
            $urlPicture = $product->picture;
        }
        $this->productRepository->product_postupdate(
            $id,
            $categoty_id,
            $trademark,
            $name,
            $posts,
            $original_price,
            $promotional_price,
            $urlPicture,
            $amount
        );
        session()->flash('message_noify', 'Bạn đã sửa sản phẩm thành công');
        return redirect()->route('admin.product.list');
    }

    public function detail(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $productDetail = $this->productRepository->product_detail($id);
        return view('admin.product.detail', compact('productDetail', 'userLogin'));
    }

    public function delete(Request $request)
    {
        $id = $request->input('id', null);
        $this->productRepository->product_delete($id);
        session()->flash('message_noify', 'Bạn đã xóa sản phẩm vào thùng rác');
        return redirect()->route('admin.product.list');
    }

    public function detail_bin(Request $request)
    {
        $request->validate([
            'name' => 'min:1|max:255',
            'trademark' => 'min:1|max:255',
        ]);
        $userLogin = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $trademark = $request->input('trademark', null);
        $category = $this->productRepository->products_category();
        $productDetail_bin = $this->productRepository->product_detail_bin($name,$trademark);
        $messageNotify = session('message_noify', null);
        return view('admin.product.detail_bin', compact(
            'productDetail_bin',
            'name',
            'category',
            'messageNotify',
            'userLogin',
            'trademark'
        ));
    }

    public function delete_trash(Request $request)
    {
        $id = $request->input('id', null);
        $this->productRepository->product_delete_trash($id);
        session()->flash('message_noify', 'Bạn đã xóa vĩnh viễn sản phẩm thành công');
        return redirect()->route('admin.product.detail_bin');
    }

    public function restore(Request $request)
    {
        $id = $request->input('id', null);
        $this->productRepository->product_restore($id);
        session()->flash('message_noify', 'Bạn đã khôi phục sản phẩm thành công');
        return redirect()->route('admin.product.detail_bin');
    }

    public function restore_all()
    {
        $this->productRepository->product_restore_all();
        session()->flash('message_noify', 'Bạn đã khôi phục tất cả sản phẩm thành công');
        return redirect()->route('admin.product.detail_bin');
    }

    public function delete_all()
    {
        $this->productRepository->product_delete_all();
        session()->flash('message_noify', 'Bạn đã xóa vĩnh viễn tất cả sản phẩm thành công');
        return redirect()->route('admin.product.detail_bin');
    }
}
