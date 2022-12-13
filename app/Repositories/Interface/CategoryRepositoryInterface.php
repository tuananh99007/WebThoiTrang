<?php

namespace App\Repositories\Interface;


interface CategoryRepositoryInterface
{
    public function categoryList($name);
    public function categoryPostadd($name, $alias, $hot_flag);
    public function categoryUpdate($id);
    public function categoryPostupdate($id, $name, $alias, $hot_flag);
    public function categoryDetail($id);
    public function categoryDetele($id);
    public function categoryDetail_bin($name);
    public function categoryDelete_trash($id);
    public function categoryRestore($id);
    public function categoryRestore_all();
    public function categoryDelete_all();

}