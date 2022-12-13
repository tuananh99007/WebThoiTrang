<?php

namespace App\Repositories;

use App\Repositories\Interface\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    public function products_list($name, $trademark)
    {
        return DB::table('product')->select(
            'product.id',
            'product.picture',
            'product.name',
            'category.name as category_name',
            'product.original_price',
            'product.promotional_price',
            'product.rating',
            'product.view',
            'product.trademark',
            'product.is_delete',
            'product.amount'
        )
            ->join('category', 'product.category_id', '=', 'category.id')
            ->where('category.is_delete', 0)
            ->where('product.is_delete', 0)
            ->where('product.name', 'like', "%$name%")
            ->Where('product.trademark', 'like', "%$trademark%")
            ->paginate(10);
    }

    public function products_category()
    {
        return DB::table('category')
            ->select('*')
            ->get()
            ->toArray();
    }

    public function product_postadd(
        $categoty_id,
        $trademark,
        $name,
        $posts,
        $original_price,
        $promotional_price,
        $is_delete,
        $urlPicture,
        $amount
    ) {
        return DB::table('product')->insert([
            'category_id' => $categoty_id,
            'trademark' => $trademark,
            'name' => $name,
            'posts' => $posts,
            'original_price' => $original_price,
            'promotional_price' => $promotional_price,
            'is_delete' => $is_delete,
            'picture' => $urlPicture,
            'amount' => $amount
        ]);
    }

    public function product_update($id)
    {
        return DB::table('product')
            ->select('*')
            ->where('id', $id)
            ->first();
    }

    public function product_postupdate(
        $id,
        $categoty_id,
        $trademark,
        $name,
        $posts,
        $original_price,
        $promotional_price,
        $urlPicture,
        $amount
    ) {
        return DB::table('product')->where('id', $id)->update([
            'category_id' => $categoty_id,
            'trademark' => $trademark,
            'name' => $name,
            'posts' => $posts,
            'original_price' => $original_price,
            'promotional_price' => $promotional_price,
            'picture' => $urlPicture,
            'amount' => $amount
        ]);
    }

    public function product_detail($id)
    {
        return  DB::table('product')->select(
            'product.id',
            'product.picture',
            'product.name',
            'category.name as category_name',
            'product.original_price',
            'product.promotional_price',
            'product.rating',
            'product.view',
            'product.trademark',
            'product.is_delete'
        )
            ->join('category', 'product.category_id', '=', 'category.id')
            ->where('product.id', $id)->first();
    }

    public function product_delete($id)
    {
        return DB::table('product')
            ->select('*')
            ->where('id', $id)
            ->update([
                'is_delete' => 1
            ]);
    }

    public function product_detail_bin($name, $trademark)
    {
        return DB::table('product')->select(
            'product.id',
            'product.picture',
            'product.name',
            'category.name as category_name',
            'product.original_price',
            'product.promotional_price',
            'product.rating',
            'product.view',
            'product.trademark',
            'product.is_delete'
        )
            ->join('category', 'product.category_id', '=', 'category.id')
            ->where('product.is_delete', 1)
            ->where('product.name', 'like', "%$name%")
            ->where('product.trademark', 'like', "%$trademark%")
            ->paginate(5);
    }

    public function product_delete_trash($id)
    {
        return DB::table('product')
            ->select('*')
            ->where('id', $id)
            ->delete();
    }

    public function product_restore($id)
    {
        return DB::table('product')
            ->where('id', $id)
            ->update([
                'is_delete' => 0
            ]);
    }

    public function product_restore_all()
    {
        return DB::table('product')
            ->select('*')
            ->where('is_delete', 1)
            ->update([
                'is_delete' => 0,
            ]);
    }

    public function product_delete_all()
    {
        return DB::table('product')
            ->select('*')
            ->where('is_delete', 1)
            ->delete();
    }
}
