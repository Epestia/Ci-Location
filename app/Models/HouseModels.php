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

/*
CREATE TABLE maison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    nom VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    village VARCHAR(100) NOT NULL,
    pays ENUM('Belgique', 'France', 'Italie') NOT NULL,
    photo VARCHAR(255),
    FOREIGN KEY (admin_id) REFERENCES user(id) ON UPDATE CASCADE
) ENGINE=INNODB;

*/