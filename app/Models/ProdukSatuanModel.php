<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukSatuanModel extends Model
{
    protected $table = "produk_satuan";
    protected $primaryKey = "id";
    protected $allowedFields = ["product_name","product_price","created_at","updated_at"];
}