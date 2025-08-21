<?php

namespace App\Models;

use CodeIgniter\Model;

class Attraction_Model extends Model
{
    protected $table = "attractions";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'name',
        'description',
        'photo_gallery',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
    ];
}
