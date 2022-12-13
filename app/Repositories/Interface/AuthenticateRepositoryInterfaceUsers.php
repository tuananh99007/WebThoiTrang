<?php

namespace App\Repositories\Interface;


interface AuthenticateRepositoryInterfaceUsers
{
    public function authenticate_post_register($name,$email,$password,$avatar);
    public function users_email($email);
}