<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['username','email', 'passwordHash','photo','role' ];

}

/*CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    passwordHash VARCHAR(255) NOT NULL,
    photo VARCHAR(255),
    role ENUM('UTILISATEUR', 'ADMIN') DEFAULT 'UTILISATEUR'
)ENGINE=INNODB;
*/
