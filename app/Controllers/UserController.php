<?php

namespace App\Controllers;

use App\Models\UserModels;

class UserController extends BaseController
{
    public function CreateUser()
    {
        $userModel = new UserModels();
        $username = $this->request->getPost('username');
    
        if ($userModel->where('username', $username)->first()) {
            return redirect()->back()->with('error', 'Nom d’utilisateur déjà utilisé.');
        }
    
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

            'username'     => $username,
            'email'        => $this->request->getPost('email'),
            'passwordHash' => $hashedPassword,
            'photo'        => $photoPath,
        ];
    
        $userModel->save($data);
    
        return view('welcome_message');
    }
    
        public function login()
        {
            $session = session();
            helper(['form']);
    
            if ($this->request->getMethod() == 'post') {
                $userModel = new UserModels();
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
    
                $user = $userModel->where('username', $username)->first();
    
                if ($user && password_verify($password, $user['passwordHash'])) {
                    $session->set([
                        'user_id' => $user['id'],
                        'username' => $user['username'],
                        'photo' => $user['photo'],
                        'role' => $user['role'],
                        'is_logged_in' => true
                    ]);
    
                    return redirect()->to('dashboard');
                } else {
                    return redirect()->back()->with('error', 'Mauvais identifiants.');
                }
            }
    
            return view('login');
        }
    
        public function logout()
        {
            $session = session();
            $session->destroy();
            return redirect()->to('/');
        }
        

        public function information()
        {
            if (!session()->has('user_id')) {
                return redirect()->to('login')->with('error', 'Veuillez vous connecter.');
            }

            $userModel = new UserModels();
            $user = $userModel->find(session()->get('user_id'));

            return view('Information', ['user' => $user]);
        }

        public function updateInformation()
        {
            if (!session()->has('user_id')) {
                return redirect()->to('login')->with('error', 'Veuillez vous connecter.');
            }

            $userModel = new UserModels();
            $userId = session()->get('user_id');
            $user = $userModel->find($userId);

            $newUsername = $this->request->getPost('username');
            $newEmail = $this->request->getPost('email');
            $newPassword = $this->request->getPost('password');

            $data = [
                'username' => $newUsername,
                'email' => $newEmail,
            ];

            if (!empty($newPassword)) {
                $data['passwordHash'] = password_hash($newPassword, PASSWORD_BCRYPT);
            }

            $photo = $this->request->getFile('photo');
            if ($photo && $photo->isValid() && !$photo->hasMoved()) {
                $newName = $photo->getRandomName();
                $photo->move('uploads/', $newName);
                $data['photo'] = 'uploads/' . $newName;

                if (!empty($user['photo']) && file_exists($user['photo'])) {
                    unlink($user['photo']);
                }
            }

            $userModel->update($userId, $data);

            return redirect()->to('information')->with('success', 'Informations mises à jour avec succès');
        }

    public function allUsers()
    {
        $userModel = new UserModels();
        $users = $userModel->select('username, role')->findAll();

        return view('AllUser', ['users' => $users]);
    }

    public function updateRole()
{
    if (!$this->request->getPost()) {
        return redirect()->back()->with('error', 'Requête invalide.');
    }

    $userModel = new UserModels();
    $username = $this->request->getPost('username');
    $newRole = $this->request->getPost('role');

    if (!in_array($newRole, ['UTILISATEUR', 'ADMIN'])) {
        return redirect()->back()->with('error', 'Rôle invalide.');
    }

    $user = $userModel->where('username', $username)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Utilisateur introuvable.');
    }

    $userModel->update($user['id'], ['role' => $newRole]);

    return redirect()->back()->with('success', 'Rôle mis à jour avec succès.');
}


}