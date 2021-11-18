<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMasukModel extends Model
{
	protected $table                = 'suratmasuk';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['nomor', 'nama', 'tanggal', 'tujuan'];
}
