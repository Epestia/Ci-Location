<?php

namespace App\Controllers;

use App\Models\IndisponibiliteModels;
use App\Models\HouseModels;
use CodeIgniter\Controller;

class IndisponibiliteController extends Controller
{
    protected $indisponibiliteModel;

    public function __construct()
    {
        $this->indisponibiliteModel = new IndisponibiliteModels();
    }

    public function createIndisponibilite()
    {
        $maisonModel = new HouseModels();
        $maisons = $maisonModel->findAll();

        return view('CreateIndisponibilites', ['maisons' => $maisons]);
    }

    public function save()
    {
        $data = [
            'maison_id' => $this->request->getPost('maison_id'),
            'debut' => $this->request->getPost('debut'),
            'fin' => $this->request->getPost('fin'),
            'raison' => $this->request->getPost('raison'),
        ];

        $this->indisponibiliteModel->insert($data);

        return redirect()->to(base_url('indisponibilites/all'))->with('success', 'Indisponibilité enregistrée avec succès');
    }

    public function allIndisponibilites()
    {
        $indisponibilites = $this->indisponibiliteModel->findAll();

        return view('AllIndisponibilites', ['indisponibilites' => $indisponibilites]);
    }

    public function edit($id)
    {
        $indisponibilite = $this->indisponibiliteModel->find($id);

        if (!$indisponibilite) {
            return redirect()->to('/indisponibilites/all')->with('error', 'Indisponibilité non trouvée.');
        }

        return view('EditIndisponibilite', ['indisponibilite' => $indisponibilite]);
    }

    public function update($id)
    {
        $this->indisponibiliteModel->update($id, [
            'maison_id' => $this->request->getPost('maison_id'),
            'debut' => $this->request->getPost('debut'),
            'fin' => $this->request->getPost('fin'),
            'raison' => $this->request->getPost('raison'),
        ]);

        return redirect()->to(base_url('indisponibilites/all'))->with('success', 'Indisponibilité mise à jour.');
    }

    public function delete($id)
    {
        $this->indisponibiliteModel->delete($id);

        return redirect()->to(base_url('indisponibilites/all'))->with('success', 'Indisponibilité supprimée.');
    }
}
