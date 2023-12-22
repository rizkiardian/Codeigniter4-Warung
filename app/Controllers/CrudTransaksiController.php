<?php

namespace App\Controllers;

use App\Models\TabelLevelMenu;
use App\Models\TabelTransaksi;
use App\Models\TabelMakanan;
use App\Models\TabelMinuman;
use App\Models\TabelPesanan;
use App\Models\TabelPembayaran;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\IncomingRequest;

class CrudTransaksiController extends BaseController
{
    protected $TabelLevelMenu;
    protected $TabelTransaksi;
    protected $TabelMakanan;
    protected $TabelMinuman;
    protected $TabelPesanan;
    protected $TabelPembayaran;

    public function __construct()
    {
        $this->TabelLevelMenu = new TabelLevelMenu();
        $this->TabelTransaksi = new TabelTransaksi();
        $this->TabelMakanan = new TabelMakanan();
        $this->TabelMinuman = new TabelMinuman();
        $this->TabelPesanan = new TabelPesanan();
        $this->TabelPembayaran = new TabelPembayaran();
    }

    public function formtambah()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        if (!empty($this->request->getVar('id_makanan'))) {
            $id_makanan = $this->request->getVar('id_makanan');
            $data['makanan'] = $this->TabelMakanan->find($id_makanan);
        } elseif (!empty($this->request->getVar('id_minuman'))) {
            $id_minuman = $this->request->getVar('id_minuman');
            $data['minuman'] = $this->TabelMinuman->find($id_minuman);
        }
        return view('user/formtambah_transaksi', $data);
    }

    public function formtambahproses()
    {
        // Validasi input
        $validasi = [
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jumlah wajib diisi!'
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.jumlah', $this->validator->getError('jumlah'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            // memasukkan ke tabel transaksi
            $id_user = session()->get('id_user');
            date_default_timezone_set('Asia/Jakarta');
            $tanggal_transaksi = date('Y-m-d');
            $total_bayar = $this->request->getVar('jumlah') * $this->request->getVar('harga');
            $transaksi = [
                'id_user' => $id_user,
                'tanggal_transaksi' => $tanggal_transaksi,
                'total_bayar' => $total_bayar,
            ];
            $this->TabelTransaksi->insert($transaksi);

            // memasukkan ke tabel detail_pesanan
            $jumlah = $this->request->getVar('jumlah');
            $total_harga = $this->request->getVar('jumlah') * $this->request->getVar('harga');
            $id_transaksi = $this->TabelTransaksi->where('id_user', $id_user)->orderBy('id_transaksi', 'desc')->findColumn('id_transaksi', 1);
            $id_transaksi = $id_transaksi[0];
            $pesanan = [
                'jumlah' => $jumlah,
                'total_harga' => $total_harga,
                'id_transaksi' => $id_transaksi,
            ];
            if (!empty($this->request->getVar('id_makanan'))) {
                $id_makanan = $this->request->getVar('id_makanan');
                $pesanan['id_makanan'] = $id_makanan;
                $this->TabelPesanan->insert($pesanan);
            } elseif (!empty($this->request->getVar('id_minuman'))) {
                $id_minuman = $this->request->getVar('id_minuman');
                $pesanan['id_minuman'] = $id_minuman;
                $this->TabelPesanan->insert($pesanan);
            }
            return redirect()->to('/UserController');
        }
    }

    public function keranjang()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        // makanan
        if (!empty($this->request->getVar('id_makanan'))) {
            $id_makanan = $this->request->getVar('id_makanan');
            $daftar_makanan = session()->get('makanan') ?? [];
            if ($daftar_makanan == []) {
                // belum ada
                $makanan = [
                    'id_makanan' => $id_makanan,
                    'jumlah' => 1
                ];
                array_push($daftar_makanan, $makanan);
                session()->set('makanan', $daftar_makanan);
            } else {
                $makanan_database = $this->TabelMakanan->find($id_makanan);

                foreach ($daftar_makanan as $index => $row) {
                    if ($row['id_makanan'] == $makanan_database['id_makanan']) {
                        // jika sama
                        $makanan = [];
                        $daftar_makanan[$index]['jumlah'] = $daftar_makanan[$index]['jumlah'] + 1; // Ganti nilai menjadi jumlah terbaru
                        session()->set('makanan', $daftar_makanan);
                        break;
                    } else {
                        $makanan = [
                            'id_makanan' => $id_makanan,
                            'jumlah' => 1
                        ];
                    }
                }

                // jika tidak ada yang sama
                if ($makanan != []) {
                    array_push($daftar_makanan, $makanan);
                    session()->set('makanan', $daftar_makanan);
                }
            }
        }

        // minuman
        if (!empty($this->request->getVar('id_minuman'))) {
            $id_minuman = $this->request->getVar('id_minuman');
            $daftar_minuman = session()->get('minuman') ?? [];
            if ($daftar_minuman == []) {
                // belum ada
                $minuman = [
                    'id_minuman' => $id_minuman,
                    'jumlah' => 1
                ];
                array_push($daftar_minuman, $minuman);
                session()->set('minuman', $daftar_minuman);
            } else {
                $minuman_database = $this->TabelMinuman->find($id_minuman);

                foreach ($daftar_minuman as $index => $row) {
                    if ($row['id_minuman'] == $minuman_database['id_minuman']) {
                        // jika sama
                        $minuman = [];
                        $daftar_minuman[$index]['jumlah'] = $daftar_minuman[$index]['jumlah'] + 1; // Ganti nilai menjadi jumlah terbaru
                        session()->set('minuman', $daftar_minuman);
                        break;
                    } else {
                        $minuman = [
                            'id_minuman' => $id_minuman,
                            'jumlah' => 1
                        ];
                    }
                }

                // jika tidak ada yang sama
                if ($minuman != []) {
                    array_push($daftar_minuman, $minuman);
                    session()->set('minuman', $daftar_minuman);
                }
            }
        }

        if (session()->has('makanan')) {
            $data['TabelMakanan'] = [];
            foreach (session('makanan') as $makanan) {
                $makananData = $this->TabelMakanan->find($makanan['id_makanan']);
                if ($makananData) {
                    array_push($data['TabelMakanan'], $makananData);
                }
            }
        }

        if (session()->has('minuman')) {
            $data['TabelMinuman'] = [];
            foreach (session('minuman') as $minuman) {
                $minumanData = $this->TabelMinuman->find($minuman['id_minuman']);
                if ($minumanData) {
                    array_push($data['TabelMinuman'], $minumanData);
                }
            }
        }

        return view('user/keranjang', $data);
    }

    public function hapuskeranjang($count)
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);

        $sessionData = session()->get('makanan');
        if (isset($sessionData[$count])) {
            unset($sessionData[$count]);
            $sessionData = array_values($sessionData);
        }
        session()->set('makanan', $sessionData);

        return redirect()->to('/CrudTransaksiController/keranjang');
    }

    public function keranjangproses()
    {
        $TabelMakanan = new TabelMakanan();
        $TabelMinuman = new TabelMinuman();

        $total_bayar = 0;
        if (session()->has('makanan')) {
            $data['TabelMakanan'] = [];
            $count = 0;
            $listmakanan['total_harga'] = [];
            $listmakanan['jumlah'] = [];
            foreach (session('makanan') as $makanan) {
                $makananData = $TabelMakanan->find($makanan['id_makanan']);
                if ($makananData) {
                    array_push($data['TabelMakanan'], $makananData);
                    // $jumlah = session()->get('makanan')[$count]['jumlah'];
                    $jumlah = $this->request->getVar('jumlahmakanan' . $count);
                    array_push($listmakanan['jumlah'], $jumlah);
                    $total_harga = $makananData['harga'] * $jumlah;
                    array_push($listmakanan['total_harga'], $total_harga);
                    $total_bayar += $total_harga;
                    $count += 1;
                }
            }
        }

        if (session()->has('minuman')) {
            $data['TabelMinuman'] = [];
            $count = 0;
            $listminuman['total_harga'] = [];
            $listminuman['jumlah'] = [];
            foreach (session('minuman') as $minuman) {
                $minumanData = $TabelMinuman->find($minuman['id_minuman']);
                if ($minumanData) {
                    array_push($data['TabelMinuman'], $minumanData);
                    $jumlah = $this->request->getVar('jumlahminuman' . $count);
                    array_push($listminuman['jumlah'], $jumlah);
                    $total_harga = $minumanData['harga'] * $jumlah;
                    array_push($listminuman['total_harga'], $total_harga);
                    $total_bayar += $total_harga;
                    $count += 1;
                }
            }
        }

        // memasukkan ke tabel transaksi
        $id_user = session()->get('id_user');
        date_default_timezone_set('Asia/Jakarta');
        // $tanggal_transaksi = date('Y-m-d');
        $tanggal_transaksi = date('Y-m-d H:i:s');
        $transaksi = [
            'id_user' => $id_user,
            'tanggal_transaksi' => $tanggal_transaksi,
            'total_bayar' => $total_bayar,
        ];
        $this->TabelTransaksi->insert($transaksi);
        sleep(1); // Membuat jeda selama 5 detik

        // memasukkan ke tabel detail_pesanan
        $id_transaksi = $this->TabelTransaksi->where('id_user', $id_user)->orderBy('id_transaksi', 'desc')->findColumn('id_transaksi');
        $id_transaksi = $id_transaksi[0];
        session()->set('id_transaksi', $id_transaksi);
        // makanan
        if (!empty($this->request->getVar('id_makanan0'))) {
            for ($i = 0; $i < count($listmakanan['jumlah']); $i++) {
                $pesanan = [
                    'id_transaksi' => $id_transaksi,
                    'jumlah' => $listmakanan['jumlah'][$i],
                    'total_harga' => $listmakanan['total_harga'][$i],
                ];
                $id_makanan = $this->request->getVar('id_makanan' . $i);
                $pesanan['id_makanan'] = $id_makanan;
                $this->TabelPesanan->insert($pesanan);
            }
        }
        sleep(1);
        // minuman
        if (!empty($this->request->getVar('id_minuman0'))) {
            for ($i = 0; $i < count($listminuman['jumlah']); $i++) {
                $pesanan = [
                    'id_transaksi' => $id_transaksi,
                    'jumlah' => $listminuman['jumlah'][$i],
                    'total_harga' => $listminuman['total_harga'][$i],
                ];
                $id_minuman = $this->request->getVar('id_minuman' . $i);
                $pesanan['id_minuman'] = $id_minuman;
                $this->TabelPesanan->insert($pesanan);
            }
        }
        sleep(1);
        // hapus session
        session()->remove('makanan');
        session()->remove('minuman');
        return redirect()->to('/CrudTransaksiController/formpembayaran');
    }

    public function formpembayaran()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        // pembayaran
        $data['pembayaran'] = $this->TabelPembayaran->findAll();
        // transaksi
        $id_transaksi = session()->get('id_transaksi');
        $data['transaksi'] = $this->TabelTransaksi->find($id_transaksi);
        // detail pesanan
        $data['detail_pesanan'] = $this->TabelPesanan
            ->join('makanan', 'makanan.id_makanan = detail_pesanan.id_makanan', 'left')
            ->join('minuman', 'minuman.id_minuman = detail_pesanan.id_minuman', 'left')
            ->select('detail_pesanan.*, CONCAT_WS(" ", makanan.nama_makanan, minuman.nama_minuman) AS nama_produk')
            ->where('id_transaksi', $id_transaksi)
            ->findAll();
        return view('user/formpembayaran', $data);
    }

    public function formpembayaran_proses()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);

        // Validasi input
        $validasi = [
            'metode_pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'metode pembayaran wajib diisi!'
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            // jika validasi gagal
            session()->setFlashdata('error.metode_pembayaran', $this->validator->getError('metode_pembayaran'));
            return redirect()->back()->withInput();
        } else {
            // jika validasi berhasil
            // menampung data inputan
            $data = [
                'id_pembayaran' => $this->request->getVar('metode_pembayaran'),
            ];
            // Simpan semua data inputan ke database
            $id_transaksi = session()->get('id_transaksi');
            $this->TabelTransaksi->update($id_transaksi, $data);
            return redirect()->to('/CrudTransaksiController/rekeningpembayaran');
        }
    }

    public function rekeningpembayaran()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        $id_transaksi = session()->get('id_transaksi');
        $data['transaksi'] = $this->TabelTransaksi
            ->join('pembayaran', 'pembayaran.id_pembayaran = transaksi.id_pembayaran', 'inner')
            ->find($id_transaksi);

        // mencari tanggal 24jam setelahnya
        $tanggal_transaksi = $data['transaksi']['tanggal_transaksi'];
        $timestamp = strtotime($tanggal_transaksi);
        $timestamp_24jam_setelahnya = $timestamp + (24 * 60 * 60); // Menambahkan 24 jam (24 jam * 60 menit * 60 detik)
        $tanggal_24jam_setelahnya = date('Y-m-d H:i:s', $timestamp_24jam_setelahnya);
        $data['transaksi']['tanggal_setelahnya'] = $tanggal_24jam_setelahnya;
        return view('user/rekeningpembayaran', $data);
    }

    public function sudahbayar()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);

        $sudahbayar = [
            'status_bayar' => 'y',
        ];
        // Simpan semua data inputan ke database
        $id_transaksi = $this->request->getVar('id_transaksi');
        $this->TabelTransaksi->update($id_transaksi, $sudahbayar);
        // session()->remove('id_transaksi');
        return redirect()->to('/MenuController/history');
    }

    public function bayarnanti()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);

        $sudahbayar = [
            'status_bayar' => 'n',
        ];
        // Simpan semua data inputan ke database
        $id_transaksi = $this->request->getVar('id_transaksi');
        $this->TabelTransaksi->update($id_transaksi, $sudahbayar);
        return redirect()->to('/MenuController/history');
    }

    public function cetak()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $TabelTransaksi = new TabelTransaksi();

        $data['TabelTransaksi'] = $TabelTransaksi->join('user', 'user.id_user = transaksi.id_user')
            ->where('tanggal_transaksi >=', session()->get('tanggal_awal'))
            ->where('tanggal_transaksi <=', session()->get('tanggal_akhir'))
            ->where('status_bayar', 'y')
            ->orderBy('tanggal_transaksi', 'desc')
            ->findAll();

        return view('admin/cetak', $data);
    }
}
