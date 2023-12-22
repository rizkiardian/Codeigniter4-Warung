<?php

namespace App\Controllers;

use App\Models\TabelLevelMenu;
use App\Models\TabelMenu;

class CrudMenuController extends BaseController
{
    protected $TabelLevelMenu;
    protected $TabelMenu;

    public function __construct()
    {
        $this->TabelLevelMenu = new TabelLevelMenu();
        $this->TabelMenu = new TabelMenu();
    }

    public function formtambah()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        return view('admin/formtambah_menu', $data);
    }

    public function formtambahproses()
    {
        // Validasi input
        $validasi = [
            'nama_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama menu wajib diisi!'
                ]
            ],
            'nama_controller' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama controller wajib diisi!'
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.nama_menu', $this->validator->getError('nama_menu'));
            session()->setFlashdata('error.nama_controller', $this->validator->getError('nama_controller'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            $data = [
                'nama_menu' => $this->request->getVar('nama_menu'),
                'nama_controller' => $this->request->getVar('nama_controller'),
            ];
            $this->TabelMenu->insert($data);
            return redirect()->to('MenuController/daftarmenu');
        }
    }

    public function hapus()
    {
        $this->TabelMenu->delete($this->request->getVar('id_menu')); //delete itu bawaan
        return redirect()->back();
    }

    public function formedit()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $id_menu = $this->request->getVar('id_menu');
        $data['id_menu'] = $this->TabelMenu->getMenuById($id_menu);
        return view('admin/formedit_menu', $data);
    }

    public function formeditproses()
    {
        // Validasi input
        $validasi = [
            'nama_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama menu wajib diisi!'
                ]
            ],
            'nama_controller' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama controller wajib diisi!'
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.nama_menu', $this->validator->getError('nama_menu'));
            session()->setFlashdata('error.nama_controller', $this->validator->getError('nama_controller'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            $data = [
                'nama_menu' => $this->request->getVar('nama_menu'),
                'nama_controller' => $this->request->getVar('nama_controller'),
            ];
            $id_menu = $this->request->getVar('id_menu');
            $this->TabelMenu->update($id_menu, $data);
            return redirect()->to('MenuController/daftarmenu');
        }
    }
}
