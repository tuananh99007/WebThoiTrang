<?php

namespace App\Repositories\Interface;


interface UsersRepositoryInterface
{
    public function users_list_admin($name, $email, $role);
    public function users_list_users($name, $email);
    public function users_postadd($name, $email, $password, $role,$avatar);
    public function users_id($id);
    public function users_postupdate($id, $name, $email, $password, $role, $urlAvatar);
    public function users_delete($id);
    public function users_detail_bin($name, $email, $role);
    public function users_delete_trash($id);
    public function users_restore($id);
    public function users_restore_all();
    public function users_delete_all();
    public function users_email($email);
}
