<?php

namespace App\Controllers;

use App\Models\UserModels;

class UserController extends BaseController
{
    public function CreateUser()
    {
        $userModel = new UserModels();

        $password = $this->request->getPost('passwordHash');
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $photo = $this->request->getFile('photo');
        $photoPath = null;

        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move('uploads/', $newName);
            $photoPath = 'uploads/' . $newName;
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'passwordHash' => $hashedPassword,
            'photo' => $photoPath,
        ];

        $userModel->save($data);

        return view('welcome_message');
    }
}


