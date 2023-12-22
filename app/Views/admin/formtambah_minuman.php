<?= $this->extend('admin/app') ?>

<?= $this->section('title') ?>
Form Tambah Minuman
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="px-20 py-10 m-auto">
    <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
        <div>
            <h1 class="text-2xl text-center font-bold uppercase">Tambah Minuman</h1>
        </div>
        <div>
            <form action="<?= base_url('CrudMinumanController/formtambahproses') ?>" method="POST" enctype="multipart/form-data">
                <div class="mt-5 grid gap-x-8 gap-y-4">
                    <div>
                        <p class="font-medium">Nama Minuman</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.nama_minuman'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.nama_minuman') ?></p>
                        <?php endif; ?>
                        <input type="text" name="nama_minuman" placeholder="masukkan nama minuman" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                    </div>
                    <div>
                        <p class="font-medium">Harga</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.harga'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.harga') ?></p>
                        <?php endif; ?>
                        <input type="number" name="harga" placeholder="masukkan harga Rp" min="0" max="1000000" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                    </div>
                    <div>
                        <p class="font-medium">Stok</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.stok'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.stok') ?></p>
                        <?php endif; ?>
                        <input type="number" name="stok" placeholder="masukkan stok" min="0" max="1000" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                    </div>
                    <div>
                        <p class="font-medium">Gambar</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.gambar'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.gambar') ?></p>
                        <?php endif; ?>

                        <input type="file" name="gambar" class="pt-[5px] focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                    </div>
                </div>
                <div class="mt-8 h-11 w-full rounded-lg bg-[#27ae60] font-medium text-white flex justify-center items-center">
                    <button type="submit" name="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>