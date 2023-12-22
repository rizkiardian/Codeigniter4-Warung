<?= $this->extend('user/app') ?>

<?= $this->section('title') ?>
Pembayaran
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="min-h-screen px-32 py-14">
    <div>
        <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
            <div>
                <h1 class="text-2xl text-center font-bold uppercase">Pembayaran</h1>
            </div>
            <div>
                <form action="<?= base_url('CrudTransaksiController/formpembayaran_proses') ?>" method="POST">
                    <div class="mt-5 grid gap-x-8 gap-y-4">
                        <div>
                            <p class="font-medium">Metode Pembayaran</p>
                            <!-- pesan error -->
                            <?php if (!empty(session()->getFlashdata('error.metode_pembayaran'))) : ?>
                                <p class="text-red-600"><?= session()->getFlashdata('error.metode_pembayaran') ?></p>
                            <?php endif; ?>
                            <select name="metode_pembayaran" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                                <?php if (empty($pembayaran)) : ?>
                                    <option value="" disabled selected>Tidak ada metode pembayaran yang tersedia</option>
                                <?php else : ?>
                                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                                    <?php foreach ($pembayaran as $row) : ?>
                                        <option value="<?= $row['id_pembayaran'] ?>"><?= $row['metode_pembayaran'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="mt-2 px-5">
                            <p class="font-medium">Ringkasan Pembayaran</p>
                            <?php foreach ($detail_pesanan as $row) : ?>
                                <div class="flex justify-between items-center">
                                    <p><?= $row['jumlah'] . ' ' . $row['nama_produk']; ?></p>
                                    <p><?= $row['total_harga']; ?></p>
                                </div>
                            <?php endforeach; ?>
                            <div class="flex justify-between items-center border-t-2 border-black/50">
                                <p>Total</p>
                                <p><?= $transaksi['total_bayar']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 h-11 w-full rounded-lg bg-[#27ae60] font-medium text-white flex justify-center items-center">
                        <button type="submit" name="submit">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>