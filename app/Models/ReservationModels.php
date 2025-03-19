<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModels extends Model
{
    protected $table = 'reservation';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'maison_id', 'debut', 'fin', 'statut'];
}

