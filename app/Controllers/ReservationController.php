<?php
namespace App\Controllers;

use App\Models\ReservationModels;
use App\Models\UserModels;
use App\Models\HouseModels;
use App\Models\IndisponibiliteModels;

class ReservationController extends BaseController
{
    public function create()
    {
        $userModel = new UserModels();
        $maisonModel = new HouseModels();

        $data['users'] = $userModel->findAll();
        $data['maisons'] = $maisonModel->findAll();

        return view('Reservations', $data);
    }

    public function save()
    {
        $reservationModel = new ReservationModels();
        $maisonModel = new HouseModels();
        $userModel = new UserModels();
        $indisponibiliteModel = new IndisponibiliteModels(); 

        $data = [
            'user_id'   => $this->request->getPost('user_id'),
            'maison_id' => $this->request->getPost('maison_id'),
            'debut'     => $this->request->getPost('debut'),
            'fin'       => $this->request->getPost('fin'),
            'statut'    => $this->request->getPost('statut'),
        ];

        $maison_id = $data['maison_id'];
        $date_debut = $data['debut'];
        $date_fin = $data['fin'];

        $reservationsExistantes = $reservationModel->where('maison_id', $maison_id)
                                                   ->where('debut <', $date_fin)
                                                   ->where('fin >', $date_debut)
                                                   ->findAll();

        if (!empty($reservationsExistantes)) {
            return redirect()->back()->with('error', 'La période que vous avez sélectionnée chevauche une réservation existante pour cette maison.');
        }

        $indisponibilites = $indisponibiliteModel->where('maison_id', $maison_id)
                                                 ->where('debut <', $date_fin)
                                                 ->where('fin >', $date_debut)
                                                 ->findAll();

        if (!empty($indisponibilites)) {
            return redirect()->back()->with('error', 'La période que vous avez sélectionnée chevauche une indisponibilité pour cette maison.');
        }

        $reservationModel->save($data);

        $user = $userModel->find($data['user_id']);
        $maison = $maisonModel->find($data['maison_id']);

        $data['username'] = $user['username'];
        $data['email'] = $user['email'];
        $data['maison_nom'] = $maison['nom'];

        return view('ReservationRecap', $data);
    }
}
