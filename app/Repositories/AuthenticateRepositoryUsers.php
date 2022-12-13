<?php

namespace App\Repositories;

use App\Repositories\Interface\AuthenticateRepositoryInterfaceUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthenticateRepositoryUsers implements AuthenticateRepositoryInterfaceUsers
{
    public function authenticate_post_register($name, $email, $password, $avatar)
    {
        return
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'avatar' => $avatar
        ]);
    }
    public function users_email($email)
    {
        return
            DB::table('users')->select('*')->where('email', $email)->first();
    }
}
