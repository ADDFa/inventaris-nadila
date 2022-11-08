<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $returnType       = 'object';
    protected $allowedFields    = ['username', 'password'];

    // Dates
    protected $useTimeStamp     = true;
}
