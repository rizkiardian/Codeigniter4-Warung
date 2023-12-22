<?php

namespace App\Models;

use CodeIgniter\Model;

class TabelMinuman extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'minuman';
    protected $primaryKey       = 'id_minuman';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_minuman', 'nama_minuman', 'harga', 'stok', 'gambar'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getMinuman()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('minuman');
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        $data = $query->getResult();
        return $data;
    }
}
