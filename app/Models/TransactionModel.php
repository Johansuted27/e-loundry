<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = "transactions";
    protected $primaryKey = "id";
    protected $allowedFields = ["user_id","paket_id","estimasi_id","total_price","tgl_pengambilan","status","type","bukti_tf","created_at","updated_at"];
}