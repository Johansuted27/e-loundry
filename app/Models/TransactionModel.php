<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = "transactions";
    protected $primaryKey = "id";
    protected $allowedFields = ["code_trx","user_id","paket_id","estimasi_id","total_price","tgl_pengambilan","status","type","bukti_tf","img_pick_up","img_drop_off","created_at","updated_at"];
}