<?php

namespace App\Repositories;

use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersRepository implements UsersRepositoryInterface
{
    public function users_list_admin($name, $email, $role)
    {
        return DB::table('users')->select('*')
            ->where('is_deleted', 0)
            ->where('name', 'like', "%$name%")
            ->where('email', 'like', "%$email%")
            ->where('role', 'like', "%$role%")
            ->whereIn('role', [1, 9])
            ->paginate(10);
    }

    public function users_list_users($name, $email)
    {
        return DB::table('users')->select('*')
            ->where('is_deleted', 0)
            ->where('name', 'like', "%$name%")
            ->where('email', 'like', "%$email%")
            ->where('role', 0)
            ->paginate(10);
    }

    public function users_postadd($name, $email, $password, $role, $avatar)
    {
        return DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role,
            'avatar' => $avatar
        ]);
    }

    public function users_id($id)
    {
        return DB::table('users')->select('*')->where('id', $id)->first();
    }

    public function users_postupdate($id, $name, $email, $password, $role, $urlAvatar)
    {
        return DB::table('users')->where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'avatar' => $urlAvatar,
        ]);
    }

    public function Users_delete($id)
    {
        return DB::table('users')->where('id', $id)->update([
            'is_deleted' => 1
        ]);
    }

    public function Users_detail_bin($name, $email, $role)
    {
        return DB::table('users')->select('*')
            ->where('is_deleted', 1)
            ->where('name', 'like', "%$name%")
            ->Where('email', 'like', "%$email%")
            ->Where('role', 'like', "%$role%")
            ->paginate(10);
    }

    public function Users_delete_trash($id)
    {
        return DB::table('users')->where('id', $id)->delete();
    }

    public function Users_restore($id)
    {
        return DB::table('users')->where('id', $id)->update([
            'is_deleted' => 0
        ]);
    }

    public function Users_restore_all()
    {
        return DB::table('users')->where('is_deleted', 1)->update([
            'is_deleted' => 0
        ]);
    }

    public function Users_delete_all()
    {
        return DB::table('users')->where('is_deleted', 1)->delete();
    }
    public function users_email($email){
        return
        DB::table('users')->select('*')->where('email', $email)->first();
    }
}
