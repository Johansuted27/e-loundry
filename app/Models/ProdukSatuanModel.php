<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukSatuanModel extends Model
{
    protected $table = "produk_satuan";
    protected $primaryKey = "id";
    protected $allowedFields = ["product_name","product_price","product_category","created_at","updated_at"];
}