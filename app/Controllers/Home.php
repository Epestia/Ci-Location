<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }


    public function createUsers()
    {
        return view('CreateUser');
    }

    public function createHouse()
    {
        return view('CreateHouse');
    }

    public function Login(){
        return view('Login');
    }
    public function AllHouse (){
        return view('AllHouse');
    }
}
