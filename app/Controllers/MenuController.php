<?php

namespace App\Controllers;

use App\Models\TabelLevelMenu;
use App\Models\TabelMakanan;
use App\Models\TabelMinuman;
use App\Models\TabelMenu;
use App\Models\TabelLevelUser;
use App\Models\TabelUser;
use App\Models\TabelTransaksi;
use App\Models\TabelPesanan;

class MenuController extends BaseController
{
    protected $TabelLevelMenu;

    public function __construct()
    {
        $this->TabelLevelMenu = new TabelLevelMenu();
    }

    public function homepage()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        return view('user/homepage', $data);
    }

    public function makanan()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        $TabelMakanan = new TabelMakanan();
        $data['makanan'] = $TabelMakanan->getMakanan();
        return view('user/daftarmakanan', $data);
    }

    public function minuman()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        $TabelMinuman = new TabelMinuman();
        $data['minuman'] = $TabelMinuman->getMinuman();
        return view('user/daftarminuman', $data);
    }

    public function tentang()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        return view('user/tentang', $data);
    }

    public function keranjang()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        $TabelMakanan = new TabelMakanan();
        $TabelMinuman = new TabelMinuman();

        if (session()->has('makanan')) {
            $data['TabelMakanan'] = [];
            foreach (session('makanan') as $makanan) {
                $makananData = $TabelMakanan->find($makanan['id_makanan']);
                if ($makananData) {
                    $data['TabelMakanan'][] = $makananData;
                }
            }
        }

        if (session()->has('minuman')) {
            $data['TabelMinuman'] = [];
            foreach (session('minuman') as $minuman) {
                $minumanData = $TabelMinuman->find($minuman['id_minuman']);
                if ($minumanData) {
                    $data['TabelMinuman'][] = $minumanData;
                }
            }
        }

        // dd($data['TabelMinuman']);
        return view('user/keranjang', $data);
    }

    public function history()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        $TabelTransaksi = new TabelTransaksi();
        $data['TabelTransaksi'] = $TabelTransaksi
            ->join('user', 'user.id_user = transaksi.id_user')
            ->where('transaksi.id_user', 1)
            ->orderBy('tanggal_transaksi', 'desc')
            ->limit(10)
            ->get()
            ->getResultArray();
        return view('user/history', $data);
    }

    public function daftarmenu()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $TabelMenu = new TabelMenu();
        $data['TabelMenu'] = $TabelMenu->getMenu();
        return view('admin/tabelmenu', $data);
    }

    public function daftarleveluser()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $TabelLevelUser = new TabelLevelUser();
        $data['TabelLevelUser'] = $TabelLevelUser->getLevelUser();
        return view('admin/tabelleveluser', $data);
    }

    public function daftarlevelmenu()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $TabelLevelMenu = new TabelLevelMenu();
        $data['TabelLevelMenu'] = $TabelLevelMenu->getLevelMenuAll();
        return view('admin/tabellevelmenu', $data);
    }

    public function daftaruser()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $TabelUser = new TabelUser();
        $data['TabelUser'] = $TabelUser->getLevelUser();
        return view('admin/tabeluser', $data);
    }

    public function daftarmakanan()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $TabelMakanan = new TabelMakanan();
        $data['TabelMakanan'] = $TabelMakanan->getMakanan();
        return view('admin/tabelmakanan', $data);
    }

    public function daftarminuman()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $TabelMinuman = new TabelMinuman();
        $data['TabelMinuman'] = $TabelMinuman->getMinuman();
        return view('admin/tabelminuman', $data);
    }

    public function daftartransaksi()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);

        $data_input = [];
        // jika ada tanggal awal
        if ($this->request->getVar('tanggal_awal')) {
            $data_input['tanggal_awal'] = $this->request->getVar('tanggal_awal');
        } else {
            $data_input['tanggal_awal'] = date('2000-01-01');
        }
        // jika ada tanggal akhir
        if ($this->request->getVar('tanggal_akhir')) {
            $data_input['tanggal_akhir'] = $this->request->getVar('tanggal_akhir');
        } else {
            // $data_input['tanggal_akhir'] = date('Y-m-d');
            $data_input['tanggal_akhir'] = date('Y-m-d', strtotime('+2 day', strtotime(date('Y-m-d'))));
        }

        session()->set('tanggal_awal', $data_input['tanggal_awal']);
        session()->set('tanggal_akhir', $data_input['tanggal_akhir']);

        $TabelTransaksi = new TabelTransaksi();
        // $data['TabelTransaksi'] = $TabelTransaksi->join('user', 'user.id_user = transaksi.id_user')->findAll();
        $data['TabelTransaksi'] = $TabelTransaksi->join('user', 'user.id_user = transaksi.id_user')
            ->where('tanggal_transaksi >=', $data_input['tanggal_awal'])
            ->where('tanggal_transaksi <=', $data_input['tanggal_akhir'])
            ->orderBy('tanggal_transaksi', 'desc')
            ->limit(10)
            ->get()
            ->getResultArray();
        return view('admin/tabeltransaksi', $data);
    }

    public function daftarpesanan()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        $TabelPesanan = new TabelPesanan();
        $data['TabelPesanan'] = $TabelPesanan
            ->join('transaksi', 'transaksi.id_transaksi = detail_pesanan.id_transaksi')
            ->join('makanan', 'makanan.id_makanan = detail_pesanan.id_makanan', 'left')
            ->join('minuman', 'minuman.id_minuman = detail_pesanan.id_minuman', 'left')
            ->select('detail_pesanan.*, transaksi.*, CONCAT_WS(" ", makanan.nama_makanan, minuman.nama_minuman) AS nama_produk')
            ->findAll();
        // ->select('detail_pesanan.*, transaksi.*, CONCAT(makanan.nama_makanan, minuman.nama_minuman) AS nama_produk')
        // dd($data);
        return view('admin/tabelpesanan', $data);
    }
}
