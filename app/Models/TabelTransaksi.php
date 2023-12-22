<?php

namespace App\Models;

use CodeIgniter\Model;

class TabelTransaksi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_transaksi', 'id_user', 'tanggal_transaksi', 'total_bayar', 'id_pembayaran', 'status_bayar'];

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

    public function gettransaksi()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        $data = $query->getResult();
        return $data;
    }

    public function gettransaksiById($id_transaksi)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('*')
            ->where('id_transaksi', $id_transaksi);
        $query   = $builder->get();
        $data = $query->getResult();
        return $data;
    }

    public function updatetransaksi($data, $id_transaksi)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->where('id_transaksi', $id_transaksi)
            ->update($data);
    }
}
