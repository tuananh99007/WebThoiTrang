<?php

namespace App\Repositories;

use App\Repositories\Interface\AuthenticateRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthenticateRepository implements AuthenticateRepositoryInterface
{
    public function authenticate_postRegister($name,$email,$password,$avatar)
    {
        return DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'avatar'=>$avatar
        ]);
    }
    public function users_email($email){
        return
        DB::table('users')->select('*')->where('email', $email)->first();
    }
}
