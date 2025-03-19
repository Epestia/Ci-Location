<?php

namespace App\Models;

use CodeIgniter\Model;

class HouseModels extends Model
{
    protected $table = 'maison';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['admin_id', 'nom', 'description', 'village', 'pays', 'photo'];

}

