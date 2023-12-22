<?php

namespace App\Models;

use CodeIgniter\Model;

class TabelUser extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'nama_user', 'password', 'id_level_user', 'telepon'];

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

    public function getUser()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        $data = $query->getResult();
        return $data;
    }

    public function getLevelUser()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->select('user.*, level_user.nama_level')
            ->join('level_user', 'user.id_level_user = level_user.id_level_user')
            ->orderBy('user.id_user', 'asc');
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        $data    = $query->getResult();
        return $data;
    }

    public function getNamaUser($username)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user')->getWhere(['nama_user' => $username]);
        $query = $builder->getRow();
        return $query;
    }

    public function getUserById($id_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->select('*')
            ->where('id_user', $id_user);
        $query   = $builder->get();
        $data = $query->getResult();
        return $data;
    }

    public function updateUser($data, $id_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('id_user', $id_user)
            ->update($data);
    }
}
