<?php

namespace App\Models;

use CodeIgniter\Model;

class Credential extends Model
{
    protected $table            = 'credentials';
    protected $returnType       = 'object';
    protected $allowedFields    = ['user_id', 'username', 'password'];
}
