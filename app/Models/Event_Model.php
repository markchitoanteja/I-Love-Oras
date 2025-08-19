<?php

namespace App\Models;

use CodeIgniter\Model;

class Event_Model extends Model
{
    protected $table = "events";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'title',
        'performers',
        'event_type',
        'date',
        'start_time',
        'end_time',
        'venue',
        'thumbnail',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
