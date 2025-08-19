<?php

namespace App\Models;

use CodeIgniter\Model;

class Log_Model extends Model
{
    protected $table = "logs";
    protected $primary_key = "id";
    protected $allowedFields = [
        'action',
        'type',
        'created_at',
    ];
}