<?php

namespace App\Controllers;

use App\Models\HouseModels;
use CodeIgniter\Controller;

class HouseController extends Controller
{
    public function index()
    {
        return view('createHouse');
    }

    public function store()
    {
        $maisonModel = new HouseModels();

        $data = $this->request->getPost([
            'admin_id', 'nom', 'description', 'village', 'pays'
        ]);

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move('uploads/', $newName);
            $data['photo'] = 'uploads/' . $newName;
        }

        $maisonModel->insert($data);

        return redirect()->to('/houses')->with('success', 'Maison ajoutée avec succès.');
    }

    public function allHouses()
    {
        $maisonModel = new HouseModels();
        $data['maisons'] = $maisonModel->findAll();

        return view('AllHouse', $data);
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'ADMIN') {
            return redirect()->to('/houses')->with('error', 'Accès refusé.');
        }

        $maisonModel = new HouseModels();
        $maison = $maisonModel->find($id);

        if (!$maison) {
            return redirect()->to('/houses')->with('error', 'Maison introuvable.');
        }

        if (!empty($maison['photo']) && file_exists(FCPATH . $maison['photo'])) {
            unlink(FCPATH . $maison['photo']);
        }

        $maisonModel->delete($id);

        return redirect()->to('/houses')->with('success', 'Maison supprimée avec succès.');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'ADMIN') {
            return redirect()->to('/houses')->with('error', 'Accès refusé.');
        }

        $maisonModel = new HouseModels();
        $data['maison'] = $maisonModel->find($id);

        if (!$data['maison']) {
            return redirect()->to('/houses')->with('error', 'Maison introuvable.');
        }

        return view('editHouse', $data);
    }

    public function update($id)
    {
        if (session()->get('role') !== 'ADMIN') {
            return redirect()->to('/houses')->with('error', 'Accès refusé.');
        }

        $maisonModel = new HouseModels();
        $maison = $maisonModel->find($id);

        if (!$maison) {
            return redirect()->to('/houses')->with('error', 'Maison introuvable.');
        }

        $data = $this->request->getPost([
            'nom', 'description', 'village', 'pays'
        ]);

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            if (!empty($maison['photo']) && file_exists(FCPATH . $maison['photo'])) {
                unlink(FCPATH . $maison['photo']);
            }
            $newName = $photo->getRandomName();
            $photo->move('uploads/', $newName);
            $data['photo'] = 'uploads/' . $newName;
        }

        $maisonModel->update($id, $data);

        return redirect()->to('/houses')->with('success', 'Maison mise à jour avec succès.');
    }
}
