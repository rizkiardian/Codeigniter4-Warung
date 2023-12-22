<?php

namespace App\Models;

use CodeIgniter\Model;

class TabelPesanan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail_pesanan';
    protected $primaryKey       = 'id_detail_pesanan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_detail_pesanan', 'id_transaksi', 'id_makanan', 'id_minuman', 'jumlah', 'total_harga'];

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

    public function getpesanan()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('detail_pesanan');
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        $data = $query->getResult();
        return $data;
    }

    public function getpesananById($id_detail_pesanan)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('detail_pesanan');
        $builder->select('*')
            ->where('id_detail_pesanan', $id_detail_pesanan);
        $query   = $builder->get();
        $data = $query->getResult();
        return $data;
    }

    public function updatepesanan($data, $id_detail_pesanan)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('detail_pesanan');
        $builder->where('id_detail_pesanan', $id_detail_pesanan)
            ->update($data);
    }
}
