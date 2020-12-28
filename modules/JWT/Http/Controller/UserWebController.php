<?php


namespace Module\JWT\Controller;


use Module\JWT\JWT;

class UserWebController
{
    public function login()
    {
        return view("login");
    }

    public function logout()
    {
        JWT::unsetSessionUser();
        return redirect("user/login");
    }
}