<?php

namespace App\Repositories\Interface;


interface ProductRepositoryInterface
{
    public function products_list($name,$trademark);
    public function products_category();
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
    );
    public function product_update($id);
    public function Product_postupdate(
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
    public function Product_detail($id);
    public function Product_delete($id);
    public function product_detail_bin($name,$trademark);
    public function Product_delete_trash($id);
    public function Product_restore($id);
    public function Product_restore_all();
    public function Product_delete_all();
}
