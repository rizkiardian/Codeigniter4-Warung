<?php

namespace App\Controllers;

use App\Models\TabelLevelMenu;
use App\Models\TabelUser;
use App\Models\TabelLevelUser;

class CrudUserController extends BaseController
{
    protected $TabelLevelMenu;
    protected $TabelUser;

    public function __construct()
    {
        $this->TabelLevelMenu = new TabelLevelMenu();
        $this->TabelUser = new TabelUser();
    }

    public function formtambah()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $TabelLevelUser = new TabelLevelUser();
        $data['TabelLevelUser'] = $TabelLevelUser->getLevelUser();
        return view('admin/formtambah_user', $data);
    }

    public function formtambahproses()
    {
        // Validasi input
        $validasi = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username wajib diisi!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password wajib diisi!'
                ]
            ],
            'id_level_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level User wajib diisi!'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telepon wajib diisi!'
                ]
            ]
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.username', $this->validator->getError('username'));
            session()->setFlashdata('error.password', $this->validator->getError('password'));
            session()->setFlashdata('error.id_level_user', $this->validator->getError('id_level_user'));
            session()->setFlashdata('error.telepon', $this->validator->getError('telepon'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            $data = [
                'nama_user' => $this->request->getVar('username'),
                'password' => md5($this->request->getVar('password')),
                'id_level_user' => $this->request->getVar('id_level_user'),
                'telepon' => $this->request->getVar('telepon')
            ];
            $this->TabelUser->insert($data);
            return redirect()->to('MenuController/daftaruser');
        }
    }

    public function hapus()
    {
        $this->TabelUser->delete($this->request->getVar('id_user')); //delete itu bawaan
        return redirect()->back();
    }

    public function formedit()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $TabelLevelUser = new TabelLevelUser();
        $data['TabelLevelUser'] = $TabelLevelUser->getLevelUser();
        // mengambil data sesuai id
        $id_user = $this->request->getVar('id_user');
        $data['id_user'] = $this->TabelUser->getUserById($id_user);
        return view('admin/formedit_user', $data);
    }

    public function formeditproses()
    {
        // Validasi input
        $validasi = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username wajib diisi!'
                ]
            ],
            'id_level_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level User wajib diisi!'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telepon wajib diisi!'
                ]
            ]
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.username', $this->validator->getError('username'));
            session()->setFlashdata('error.id_level_user', $this->validator->getError('id_level_user'));
            session()->setFlashdata('error.telepon', $this->validator->getError('telepon'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            $data = [
                'nama_user' => $this->request->getVar('username'),
                'id_level_user' => $this->request->getVar('id_level_user'),
                'telepon' => $this->request->getVar('telepon')
            ];
            // cek apakah ganti password
            $password = $this->request->getVar('password');
            if ($password !== null) {
                $data['password'] = md5($this->request->getVar('password'));
            }
            $id_user = $this->request->getVar('id_user');
            $this->TabelUser->updateUser($data, $id_user);
            return redirect()->to('MenuController/daftaruser');
        }
    }
}
