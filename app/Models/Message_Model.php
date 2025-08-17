<?php

namespace App\Models;

use CodeIgniter\Model;

class Message_Model extends Model
{
    protected $table = "messages";
    protected $primary_key = "id";
    protected $allowedFields = [
        'name',
        'email',
        'message',
        'created_at',
    ];
}
