<?php
namespace App\Controllers;

use App\Models\UserModel;

class HouseController extends BaseController
{
    public function index(): string
        {
            return view('createHouse');
        }
}
?>
