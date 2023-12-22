<?php

namespace App\Models;

use CodeIgniter\Model;

class TabelLevelUser extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'level_user';
    protected $primaryKey       = 'id_level_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_level_user', 'nama_level'];

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

    public function getLevelUser()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('level_user');
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        $data = $query->getResult();
        return $data;
    }

    public function getLevelUserById($id_level_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('level_user');
        $builder->select('*')
            ->where('id_level_user', $id_level_user);
        $query   = $builder->get();
        $data = $query->getResult();
        return $data;
    }

    public function updateLevelUser($data, $id_level_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('level_user');
        $builder->where('id_level_user', $id_level_user)
            ->update($data);
    }
}
