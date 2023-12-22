<?= $this->extend('user/app') ?>

<?= $this->section('title') ?>
History
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="min-h-screen px-32 py-14">
    <div>
        <div class="m-auto px-4 py-2 w-fit border-2 border-[#27ae60]/100 shadow-lg rounded-md">
            <h1 class="font-bold text-3xl text-[#219150]">History</h1>
        </div>
        <div>
            <div class="flex justify-between">
                <h1 class="font-bold text-2xl">Daftar Tabel Makanan</h1>
                <!-- <a href='<?= base_url("CrudMakananController/formtambah"); ?>'>
                    <button class="bg-[#219150] px-4 py-2 text-white rounded-3xl font-medium">Tambah</button>
                </a> -->
            </div>
            <div class="mt-5 grid grid-cols-9 gap-[2px]">
                <p class="px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 rounded-tl-lg overflow-hidden">id_transaksi</p>
                <p class="col-span-2 px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-hidden">nama_user</p>
                <p class="col-span-2 px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-hidden">tanggal_transaksi</p>
                <p class="col-span-2 px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-hidden">total_bayar</p>
                <p class="col-span-2 px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-hidden">status_bayar</p>
                <!-- <p class="col-span-2 px-4 py-2 text-center capitalize font-medium bg-[#27ae60]/50 overflow-hidden rounded-tr-lg">action</p> -->
            </div>

            <?php foreach ($TabelTransaksi as $row) : ?>
                <div class="grid grid-cols-9 gap-[2px]">
                    <div class="px-4 py-2 border-b-[1px] border-black/50 text-center">
                        <p class="overflow-x-auto no-scrollbar whitespace-nowrap"><?= $row['id_transaksi']; ?></p>
                    </div>
                    <div class="col-span-2 px-4 py-2 border-b-[1px] border-black/50">
                        <p class="overflow-x-auto no-scrollbar whitespace-nowrap text-center"><?= $row['nama_user']; ?></p>
                    </div>
                    <div class="col-span-2 px-4 py-2 border-b-[1px] border-black/50">
                        <p class="overflow-x-auto no-scrollbar whitespace-nowrap text-center"><?= $row['tanggal_transaksi']; ?></p>
                    </div>
                    <div class="col-span-2 px-4 py-2 border-b-[1px] border-black/50 text-center">
                        <p class="overflow-x-auto no-scrollbar whitespace-nowrap">
                            <?php
                            $number = $row['total_bayar'];
                            echo 'Rp ' . number_format($number, 2, ',', '.');
                            ?>
                        </p>
                    </div>
                    <div class="col-span-2 px-4 py-2 border-b-[1px] border-black/50 text-center">
                        <!-- <p class="overflow-x-auto no-scrollbar whitespace-nowrap"><?= ($row['status_bayar'] == 'y') ? 'Sudah Bayar' : 'Belum Bayar'; ?></p> -->
                        <?php if ($row['status_bayar'] == 'y') : ?>
                            <p>Sudah Bayar</p>
                        <?php else : ?>
                            <div class="m-auto py-2 w-20 rounded-full bg-[#27ae60] font-medium text-white flex justify-center items-center">
                                <form action="<?= base_url('CrudTransaksiController/sudahbayar') ?>" method="POST">
                                    <input type="hidden" name="id_transaksi" value="<?= $row['id_transaksi']; ?>">
                                    <button type="submit" name="submit">Bayar</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- <div class="col-span-2 px-4 border-b-[1px] border-black/50 flex justify-center items-center space-x-4">
                    </div> -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>