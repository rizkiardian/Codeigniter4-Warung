<?= $this->extend('user/app') ?>

<?= $this->section('title') ?>
Daftar Minuman
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="min-h-screen px-32 py-14">
    <div>
        <div class="m-auto px-4 py-2 w-fit border-2 border-[#27ae60]/100 shadow-lg rounded-md">
            <h1 class="font-bold text-3xl text-[#219150]">Daftar Minuman Yang Tersedia</h1>
        </div>
        <div class="mt-12 m-auto w-fit grid grid-cols-4 gap-x-5 gap-y-10">
            <?php foreach ($minuman as $row) : ?>
                <div class="py-5 px-16 w-fit border-2 border-black/20 rounded-xl shadow-md shadow-[#27ae60]/80">
                    <div class="h-[10rem] w-[10rem] items-center justify-center flex overflow-hidden">
                        <img src="/images/<?= $row->gambar; ?>" class="h-full w-full object-contain">
                    </div>
                    <div class="mt-5">
                        <p class="font-bold text-lg text-center truncate capitalize"><?= $row->nama_minuman; ?></p>
                        <p class="mt-2 font-medium text-lg text-center truncate">Rp. <?= number_format($row->harga, 2, ',', '.'); ?></p>
                        <div class="mt-4 m-auto w-fit">
                            <form action="<?= base_url('CrudTransaksiController/keranjang') ?>" method="POST">
                                <input type="hidden" name="id_minuman" value="<?= $row->id_minuman; ?>">
                                <button type="submit" class="bg-[#27ae60] py-2 px-8 rounded-lg text-white hover:font-semibold hover:px-12 hover:text-lg transition-all">Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>