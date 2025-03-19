<?php

namespace App\Models;

use CodeIgniter\Model;

class IndisponibiliteModels extends Model
{
    protected $table = 'indisponibilite';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['maison_id', 'debut', 'fin', 'raison'];
}
