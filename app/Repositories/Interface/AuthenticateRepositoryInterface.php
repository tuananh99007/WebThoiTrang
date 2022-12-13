<?php

namespace App\Repositories\Interface;


interface AuthenticateRepositoryInterface
{
    public function authenticate_postRegister($name, $email, $password,$avatar);
    public function users_email($email);
}
