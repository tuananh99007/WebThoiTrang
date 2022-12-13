<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct(CategoryRepositoryInterface $inputCategoryRepository)
    {
        $this->categoryRepository = $inputCategoryRepository;
    }

    public function list(Request $request)
    {
        $request->validate([
            'name' => 'min:1|max:255',
        ]);
        $userLogin = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $categoryList = $this->categoryRepository->categoryList($name);
        $messageNotify = session('message_noify', null);
        return view('admin.category.list', compact('categoryList', 'name', 'messageNotify','userLogin'));
    }

    public function add()
    {
        $userLogin = Auth::guard('admin')->user();
        return view('admin.category.add',compact('userLogin'));
    }
    public function postadd(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|min:1|max:255',
            'alias' => 'bail|required|min:1|max:255',
            'hot_flag' => 'bail|required|min:1|max:255',
        ]);
        $name = $request->input('name', null);
        $alias = $request->input('alias', null);
        $hot_flag = $request->input('hot_flag', null);
        $this->categoryRepository->categoryPostadd($name, $alias, $hot_flag);
        session()->flash('message_noify', 'Bạn đã thêm danh mục thành công');
        return redirect()->route('admin.category.list');
    }

    public function update(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $categoryUpdate = $this->categoryRepository->categoryUpdate($id);
        return view('admin.category.update', compact('categoryUpdate','userLogin'));
    }

    public function postupdate(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'alias' => 'required|min:1|max:255',
            'hot_flag' => 'required|min:1|max:255',
        ]);
        $id = $request->input('id', null);
        $name = $request->input('name', null);
        $alias = $request->input('alias', null);
        $hot_flag = $request->input('hot_flag', null);
        $this ->categoryRepository->categoryPostupdate($id, $name, $alias, $hot_flag);
        session()->flash('message_noify', 'Bạn đã sửa danh mục thành công');
        return redirect()->route('admin.category.list');
    }

    public function detail(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $categoryDetail = $this ->categoryRepository->categoryDetail($id);
        return view('admin.category.detail', compact('categoryDetail','userLogin'));
    }

    public function delete(Request $request)
    {
        $id = $request->input('id', null);
        $this->categoryRepository->categorydetele($id);
        session()->flash('message_noify', 'Bạn đã xóa danh mục vào thùng rác');
        return redirect()->route('admin.category.list');
    }

    public function detail_bin(Request $request)
    {
        $request->validate([
            'name' => 'min:1|max:255',
        ]);
        $userLogin = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $categoryDetail_bin = $this->categoryRepository->categoryDetail_bin($name);
        $messageNotify = session('message_noify', null);
        return view('admin.category.detail_bin', compact('categoryDetail_bin', 'name', 'messageNotify','userLogin'));
    }

    public function delete_trash(Request $request)
    {
        $id = $request->input('id', null);
        $this->categoryRepository->categoryDelete_trash($id);
        session()->flash('message_noify', 'Bạn đã xóa vĩnh viễn danh mục thành công');
        return redirect()->route('admin.category.detail_bin');
    }

    public function restore(Request $request)
    {
        $id = $request->input('id', null);
        $this->categoryRepository->categoryRestore($id);
        session()->flash('message_noify', 'Bạn đã khôi phục danh mục thành công');
        return redirect()->route('admin.category.detail_bin');
    }

    public function restore_all()
    {
        $this->categoryRepository->categoryRestore_all();
        session()->flash('message_noify', 'Bạn đã khôi phục tất cả danh mục thành công');
        return redirect()->route('admin.category.detail_bin');
    }

    public function delete_all()
    {
        $this->categoryRepository->categoryDelete_all();
        session()->flash('message_noify', 'Bạn đã xóa vĩnh viễn tất cả danh mục thành công');
        return redirect()->route('admin.category.detail_bin');
    }

}
