<?php

namespace App\Controllers;

use App\Models\TabelLevelMenu;
use App\Models\TabelMenu;
use App\Models\TabelLevelUser;

class CrudLevelMenuController extends BaseController
{
    protected $TabelLevelMenu;
    protected $TabelMenu;
    protected $TabelLevelUser;

    public function __construct()
    {
        $this->TabelLevelMenu = new TabelLevelMenu();
        $this->TabelMenu = new TabelMenu();
        $this->TabelLevelUser = new TabelLevelUser();
    }

    public function formtambah()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        // tabel level user
        $TabelLevelUser = new TabelLevelUser();
        $data['TabelLevelUser'] = $TabelLevelUser->getLevelUser();
        // tabel menu
        $TabelMenu = new TabelMenu();
        $data['TabelMenu'] = $TabelMenu->getMenu();
        return view('admin/formtambah_levelmenu', $data);
    }

    public function formtambahproses()
    {
        // Validasi input
        $validasi = [
            'id_level_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'level user wajib diisi!'
                ]
            ],
            'id_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'menu wajib diisi!'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'status wajib diisi!'
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.id_level_user', $this->validator->getError('id_level_user'));
            session()->setFlashdata('error.id_menu', $this->validator->getError('id_menu'));
            session()->setFlashdata('error.status', $this->validator->getError('status'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            $data = [
                'id_level_user' => $this->request->getVar('id_level_user'),
                'id_menu' => $this->request->getVar('id_menu'),
                'status' => $this->request->getVar('status'),
            ];
            $this->TabelLevelMenu->insert($data);
            return redirect()->to('MenuController/daftarlevelmenu');
        }
    }

    public function hapus()
    {
        $this->TabelLevelMenu->delete($this->request->getVar('id_level_menu')); //delete itu bawaan
        return redirect()->back();
    }

    public function formedit()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        // ambil id level menu
        $id_level_menu = $this->request->getVar('id_level_menu');
        $data['id_level_menu'] = $this->TabelLevelMenu->getLevelMenuById($id_level_menu);
        // tabel level user
        $TabelLevelUser = new TabelLevelUser();
        $data['TabelLevelUser'] = $TabelLevelUser->getLevelUser();
        // tabel menu
        $TabelMenu = new TabelMenu();
        $data['TabelMenu'] = $TabelMenu->getMenu();
        return view('admin/formedit_levelmenu', $data);
    }

    public function formeditproses()
    {
        // Validasi input
        $validasi = [
            'id_level_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'level user wajib diisi!'
                ]
            ],
            'id_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'menu wajib diisi!'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'status wajib diisi!'
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.id_level_user', $this->validator->getError('id_level_user'));
            session()->setFlashdata('error.id_menu', $this->validator->getError('id_menu'));
            session()->setFlashdata('error.status', $this->validator->getError('status'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            $data = [
                'id_level_user' => $this->request->getVar('id_level_user'),
                'id_menu' => $this->request->getVar('id_menu'),
                'status' => $this->request->getVar('status'),
            ];
            $id_level_menu = $this->request->getVar('id_level_menu');
            $this->TabelLevelMenu->update($id_level_menu, $data);
            return redirect()->to('MenuController/daftarlevelmenu');
        }
    }
}
