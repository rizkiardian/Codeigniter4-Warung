<?php

namespace App\Controllers;

use App\Models\TabelLevelMenu;
use App\Models\TabelLevelUser;

class CrudLevelUserController extends BaseController
{
    protected $TabelLevelMenu;
    protected $TabelLevelUser;

    public function __construct()
    {
        $this->TabelLevelMenu = new TabelLevelMenu();
        $this->TabelLevelUser = new TabelLevelUser();
    }

    public function formtambah()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        return view('admin/formtambah_leveluser', $data);
    }

    public function formtambahproses()
    {
        // Validasi input
        $validasi = [
            'nama_level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama level wajib diisi!'
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.nama_level', $this->validator->getError('nama_level'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            $data = [
                'nama_level' => $this->request->getVar('nama_level'),
            ];
            $this->TabelLevelUser->insert($data);
            return redirect()->to('MenuController/daftarleveluser');
        }
    }

    public function hapus()
    {
        $this->TabelLevelUser->delete($this->request->getVar('id_level_user')); //delete itu bawaan
        return redirect()->back();
    }

    public function formedit()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $id_level_user = $this->request->getVar('id_level_user');
        $data['id_level_user'] = $this->TabelLevelUser->getLevelUserById($id_level_user);
        return view('admin/formedit_leveluser', $data);
    }

    public function formeditproses()
    {
        // Validasi input
        $validasi = [
            'nama_level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama level wajib diisi!'
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.nama_level', $this->validator->getError('nama_level'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            $data = [
                'nama_level' => $this->request->getVar('nama_level'),
            ];

            $id_level_user = $this->request->getVar('id_level_user');
            $this->TabelLevelUser->updateLevelUser($data, $id_level_user);
            return redirect()->to('MenuController/daftarleveluser');
        }
    }
}
