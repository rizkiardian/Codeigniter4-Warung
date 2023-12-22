<?= $this->extend('admin/app') ?>

<?= $this->section('title') ?>
Daftar Tabel Transaksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="w-3/4 px-10 py-6">
    <div class="flex justify-between">
        <h1 class="font-bold text-2xl">Daftar Tabel Transaksi</h1>
        <a href='<?= base_url("CrudTransaksiController/cetak"); ?>' target="_blank">
            <button class="bg-[#219150] px-4 py-2 text-white rounded-3xl font-medium">Cetak</button>
        </a>
    </div>
    <div>
        <form action='<?= base_url("MenuController/daftartransaksi"); ?>' method="POST">
            <?= csrf_field(); ?>
            <div class="flex items-center gap-5">
                <div class="flex items-center gap-2">
                    <p class="font-medium">Dari</p>
                    <input type="date" name="tanggal_awal" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-[10rem] pl-3 rounded-lg">
                </div>
                <div class="flex items-center gap-2">
                    <p class="font-medium">Sampai</p>
                    <input type="date" name="tanggal_akhir" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-[10rem] pl-3 rounded-lg">
                </div>
                <button type="submit" class="bg-blue-600 px-4 py-2 text-white rounded-lg font-medium">Tampilkan</button>
            </div>
        </form>
    </div>
    <div class="mt-5 grid grid-cols-9 gap-[2px]">
        <p class="px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-x-auto no-scrollbar whitespace-nowrap rounded-tl-lg">id</p>
        <p class="col-span-2 px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-x-auto no-scrollbar whitespace-nowrap">nama user</p>
        <p class="px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-x-auto no-scrollbar whitespace-nowrap">waktu</p>
        <p class="px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-x-auto no-scrollbar whitespace-nowrap">tanggal</p>
        <p class="col-span-2 px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-x-auto no-scrollbar whitespace-nowrap">total bayar</p>
        <p class="col-span-2 px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-x-auto no-scrollbar whitespace-nowrap rounded-tr-lg">status</p>
    </div>

    <?php foreach ($TabelTransaksi as $row) : ?>
        <div class="grid grid-cols-9 gap-[2px] h-11">
            <p class="px-4 py-2 border-b-[1px] border-black/50 overflow-x-auto no-scrollbar whitespace-nowrap text-center"><?= $row['id_transaksi']; ?></p>
            <p class="col-span-2 px-4 py-2 border-b-[1px] border-black/50 overflow-x-auto no-scrollbar whitespace-nowrap text-center"><?= $row['nama_user']; ?></p>
            <p class="px-4 py-2 border-b-[1px] border-black/50 overflow-x-auto no-scrollbar whitespace-nowrap text-center"><?= date('H:i:s', strtotime($row['tanggal_transaksi'])); ?></p>
            <p class="px-4 py-2 border-b-[1px] border-black/50 overflow-x-auto no-scrollbar whitespace-nowrap text-center"><?= date('d-m-Y', strtotime($row['tanggal_transaksi'])); ?></p>
            <p class="col-span-2 px-4 py-2 border-b-[1px] border-black/50 overflow-x-auto no-scrollbar whitespace-nowrap text-center">
                <?php
                $number = $row['total_bayar'];
                echo 'Rp ' . number_format($number, 2, ',', '.');
                ?>
            </p>

            <p class="col-span-2 px-4 py-2 border-b-[1px] border-black/50 overflow-x-auto no-scrollbar whitespace-nowrap text-center"><?= ($row['status_bayar'] == 'y') ? 'Sudah Bayar' : 'Belum Bayar'; ?></p>

            <!-- <div class="col-span-2 px-4 border-b-[1px] border-black/50 flex justify-center items-center space-x-4">
                <form action='<?= base_url("CrudLevelMenuController/hapus"); ?>' method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_transaksi" value="<?= $row['id_transaksi']; ?>">
                    <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');">
                        <svg class="w-8 h-8 bg-white-800 shadow rounded-full p-1 text-red-800 border-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </form>

                <form action='<?= base_url("CrudLevelMenuController/formedit"); ?>' method="GET">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_transaksi" value="<?= $row['id_transaksi']; ?>">
                    <button type="submit">
                        <svg class="w-8 h-8 bg-sky-800 shadow rounded-full p-1 text-white border-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </button>
                </form>
            </div> -->
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>