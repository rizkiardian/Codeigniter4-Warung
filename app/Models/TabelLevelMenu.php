<?php

namespace App\Models;

use CodeIgniter\Model;

class TabelLevelMenu extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'level_menu';
    protected $primaryKey       = 'id_level_menu';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_level_menu', 'id_level_user', 'id_menu', 'status'];

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

    public function getLevelMenuAktif($id_level_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('level_menu');
        $builder->select('level_menu.*, menu.nama_menu, menu.nama_controller');
        $builder->join('menu', 'level_menu.id_menu = menu.id_menu');
        $builder->where('level_menu.status', 'aktif');
        $builder->where('level_menu.id_level_user', $id_level_user);
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        $data = $query->getResult();
        return $data;
    }

    public function getLevelMenu()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('level_menu');
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        $data = $query->getResult();
        return $data;
    }

    public function getLevelMenuAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('level_menu');
        $builder->select('level_menu.*, level_user.nama_level,  menu.nama_menu')
            ->join('menu', 'level_menu.id_menu = menu.id_menu')
            ->join('level_user', 'level_menu.id_level_user = level_user.id_level_user');
        $query   = $builder->get();
        $data = $query->getResult();
        return $data;
    }

    public function getLevelMenuById($id_level_menu)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('level_menu');
        $builder->select('*')
            ->where('id_level_menu', $id_level_menu);
        $query   = $builder->get();
        $data = $query->getResult();
        return $data;
    }
}
