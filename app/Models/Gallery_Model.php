<?php

namespace App\Models;

use CodeIgniter\Model;

class Gallery_Model extends Model
{
    protected $table = "gallery";
    protected $primary_key = "id";
    protected $allowedFields = [
        'image',
        'caption',
        'created_at',
        'updated_at',
    ];
}
