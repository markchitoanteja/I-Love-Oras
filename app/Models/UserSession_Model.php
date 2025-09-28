<?php

namespace App\Models;

use CodeIgniter\Model;

class UserSession_Model extends Model
{
    protected $table = "user_sessions";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'session_id',
        'ip_address',
        'user_agent',
        'last_activity',
    ];
}
