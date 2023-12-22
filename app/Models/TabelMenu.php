<?php

namespace App\Models;

use CodeIgniter\Model;

class TabelMenu extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'menu';
    protected $primaryKey       = 'id_menu';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_menu', 'nama_menu', 'nama_controller'];

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

    public function getMenu()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('menu');
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        $data = $query->getResult();
        return $data;
    }

    public function getMenuById($id_menu)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('menu');
        $builder->select('*')
            ->where('id_menu', $id_menu);
        $query   = $builder->get();
        $data = $query->getResult();
        return $data;
    }

    public function updateMenu($data, $id_menu)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('menu');
        $builder->where('id_menu', $id_menu)
            ->update($data);
    }
}
