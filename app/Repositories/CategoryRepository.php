<?php

namespace App\Repositories;

use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function categoryList($name)
    {
        return DB::table('category')->select('*')
            ->where('is_delete', 0)
            ->where('name', 'like', "%$name%")
            ->paginate(10);
    }

    public function categoryPostadd($name, $alias, $hot_flag)
    {
        return DB::table('category')->insert([
            'name' => $name,
            'alias' => $alias,
            'hot_flag' => $hot_flag,
        ]);
    }

    public function categoryUpdate($id)
    {
        return DB::table('category')
            ->select('*')
            ->where('id', $id)
            ->first();
    }

    public function categoryPostupdate($id, $name, $alias, $hot_flag)
    {
        return DB::table('category')->where('id', $id)->update([
            'name' => $name,
            'alias' => $alias,
            'hot_flag' => $hot_flag,
        ]);
    }

    public function categoryDetail($id)
    {
        return DB::table('category')
            ->where('id', $id)
            ->first();
    }

    public function categoryDetele($id)
    {
        return DB::table('category')->where('id', $id)->update([
            'is_delete' => 1
        ]);
        DB::table('product')->where('category_id', $id)->update([
            'is_delete' => 1
        ]);
    }

    public function categoryDetail_bin($name)
    {
        return DB::table('category')->select('*')
            ->where('is_delete', 1)
            ->where('name', 'like', "%$name%")
            ->paginate(6);
    }

    public function categoryDelete_trash($id)
    {
        return DB::table('category')->select('*')->where('id', $id)->delete();
        DB::table('product')->select('*')->where('category_id', $id)->delete();
    }

    public function categoryRestore($id)
    {
        return DB::table('category')->where('id', $id)->update([
            'is_delete' => 0
        ]);
        DB::table('product')->select()->where('is_delete', $id)->update([
            'is_delete' => 0
        ]);
    }

    public function categoryRestore_all()
    {
        return DB::table('category')->select()->where('is_delete', 1)->update([
            'is_delete' => 0
        ]);
        DB::table('product')->select()->where('is_delete', 1)->update([
            'is_delete' => 0
        ]);
    }
    
    public function categoryDelete_all()
    {
        DB::table('category')->where('is_delete', 1)->delete();
        DB::table('product')->where('is_delete', 1)->delete();
    }
}
