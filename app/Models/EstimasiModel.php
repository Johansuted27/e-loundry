<?php

namespace App\Models;

use CodeIgniter\Model;

class EstimasiModel extends Model
{
    protected $table = "estimasi";
    protected $primaryKey = "id";
    protected $allowedFields = ["nama_estimasi","harga_estimasi","created_at","updated_at"];
}