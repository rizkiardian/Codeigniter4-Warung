<?php

namespace App\Controllers;

use App\Models\TabelLevelMenu;
use App\Models\TabelMakanan;
use CodeIgniter\Files\File;

class CrudMakananController extends BaseController
{
    protected $TabelLevelMenu;
    protected $TabelMakanan;

    public function __construct()
    {
        $this->TabelLevelMenu = new TabelLevelMenu();
        $this->TabelMakanan = new TabelMakanan();
    }

    public function formtambah()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        return view('admin/formtambah_makanan', $data);
    }

    public function formtambahproses()
    {
        // Validasi input
        $validasi = [
            'nama_makanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama makanan wajib diisi!'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harga wajib diisi!'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'stok wajib diisi!'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'gambar wajib diisi!',
                    'mime_in' => 'file yang anda unggah bukan gambar (png/jpg/jpeg)!',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.nama_makanan', $this->validator->getError('nama_makanan'));
            session()->setFlashdata('error.harga', $this->validator->getError('harga'));
            session()->setFlashdata('error.stok', $this->validator->getError('stok'));
            session()->setFlashdata('error.gambar', $this->validator->getError('gambar'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            // Mengambil file gambar yang diunggah
            $gambar = $this->request->getFile('gambar');
            // Melakukan validasi file gambar
            if (in_array($gambar->getExtension(), ['png', 'jpg', 'jpeg'])) {
                // Pindahkan file gambar ke direktori tujuan
                $namaRandom = $gambar->getRandomName();
                $namaRandomTanpaEkstensi = pathinfo($namaRandom, PATHINFO_FILENAME);
                $namaBaru = $namaRandomTanpaEkstensi . '__gambar__' . $gambar->getName();
                $gambar->move(ROOTPATH . 'public/images', $namaBaru);
                // Simpan file gambar ke database
                $data = [
                    'nama_makanan' => $this->request->getVar('nama_makanan'),
                    'harga' => $this->request->getVar('harga'),
                    'stok' => $this->request->getVar('stok'),
                    'gambar' => $namaBaru,
                ];
                $this->TabelMakanan->insert($data);
                return redirect()->to('MenuController/daftarmakanan');
            } else {
                // Tampilkan pesan error atau lakukan redirect ke halaman lain jika validasi gagal
                return redirect()->back()->with('error', 'File yang anda kirim bukan gambar! (png/jpg/jpeg)');
            }
        }
    }

    public function hapus()
    {
        $TabelMakanan = $this->TabelMakanan->find($this->request->getVar('id_makanan')); //cari data makanan sesuai id_makanan
        if ($TabelMakanan) {
            // Hapus gambar dari file sistem
            $gambarPath = 'images/' . $TabelMakanan['gambar'];
            $file = new File($gambarPath);
            if ($file->isFile()) {
                unlink($file);
            }
            // Hapus gambar dari database
            $this->TabelMakanan->delete($this->request->getVar('id_makanan'));
            return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gambar tidak ditemukan.');
        }
    }

    public function formedit()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        // mengambil data sesuai id
        $id_makanan = $this->request->getVar('id_makanan');
        $data['id_makanan'] = $this->TabelMakanan->find($id_makanan);
        return view('admin/formedit_makanan', $data);
    }

    public function formeditproses()
    {
        // Validasi input
        $validasi = [
            'nama_makanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama makanan wajib diisi!'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harga wajib diisi!'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'stok wajib diisi!'
                ]
            ],
        ];

        // jika ada gambar baru yang dimasukkan
        if ($this->request->getFile('gambar')->isValid()) {
            $validasi['gambar'] = [
                'rules' => 'mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => 'file yang anda unggah bukan gambar (png/jpg/jpeg)!',
                ]
            ];
        }

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.nama_makanan', $this->validator->getError('nama_makanan'));
            session()->setFlashdata('error.harga', $this->validator->getError('harga'));
            session()->setFlashdata('error.stok', $this->validator->getError('stok'));
            session()->setFlashdata('error.gambar', $this->validator->getError('gambar'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            // menampung data inputan
            $data = [
                'nama_makanan' => $this->request->getVar('nama_makanan'),
                'harga' => $this->request->getVar('harga'),
                'stok' => $this->request->getVar('stok'),
            ];
            // cek jika ada gambar baru
            if ($this->request->getFile('gambar')->isValid()) {
                // Mengambil file gambar yang diunggah
                $gambar = $this->request->getFile('gambar');
                // Melakukan validasi file gambar
                if (in_array($gambar->getExtension(), ['png', 'jpg', 'jpeg'])) {
                    // Pindahkan file gambar ke direktori tujuan
                    $namaRandom = $gambar->getRandomName();
                    $namaRandomTanpaEkstensi = pathinfo($namaRandom, PATHINFO_FILENAME);
                    $namaBaru = $namaRandomTanpaEkstensi . '__gambar__' . $gambar->getName();
                    $gambar->move(ROOTPATH . 'public/images', $namaBaru);
                    // hapus file gambar lama
                    $TabelMakanan = $this->TabelMakanan->find($this->request->getVar('id_makanan')); //cari data makanan sesuai id_makanan
                    $gambarPath = 'images/' . $TabelMakanan['gambar'];
                    $file = new File($gambarPath);
                    if ($file->isFile()) {
                        unlink($file);
                    }
                    // tambahkan file gambar ke database
                    $data['gambar'] = $namaBaru;
                    // Simpan semua data inputan ke database
                    $this->TabelMakanan->update($this->request->getVar('id_makanan'), $data);
                    return redirect()->to('MenuController/daftarmakanan');
                } else {
                    // Tampilkan pesan error
                    return redirect()->back()->with('error', 'File yang anda kirim bukan gambar! (png/jpg/jpeg)');
                }
            } else {
                // Simpan semua data inputan ke database
                $this->TabelMakanan->update($this->request->getVar('id_makanan'), $data);
                return redirect()->to('MenuController/daftarmakanan');
            }
        }
    }
}
