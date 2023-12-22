<?= $this->extend('admin/app') ?>

<?= $this->section('title') ?>
Form Edit Minuman
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="px-20 py-10 m-auto">
    <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
        <div>
            <h1 class="text-2xl text-center font-bold uppercase">Edit Minuman</h1>
        </div>
        <div>
            <?php if (!empty($id_minuman)) : ?>
                <form action="<?= base_url('CrudMinumanController/formeditproses') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_minuman" value="<?= $id_minuman['id_minuman']; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                    <div class="mt-5 grid gap-x-8 gap-y-4">
                        <div>
                            <p class="font-medium">Nama Minuman</p>
                            <!-- pesan error -->
                            <?php if (!empty(session()->getFlashdata('error.nama_minuman'))) : ?>
                                <p class="text-red-600"><?= session()->getFlashdata('error.nama_minuman') ?></p>
                            <?php endif; ?>
                            <input type="text" name="nama_minuman" value="<?= $id_minuman['nama_minuman']; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                        </div>
                        <div>
                            <p class="font-medium">Harga</p>
                            <!-- pesan error -->
                            <?php if (!empty(session()->getFlashdata('error.harga'))) : ?>
                                <p class="text-red-600"><?= session()->getFlashdata('error.harga') ?></p>
                            <?php endif; ?>
                            <input type="number" name="harga" value="<?= $id_minuman['harga']; ?>" min="0" max="1000000" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                        </div>
                        <div>
                            <p class="font-medium">Stok</p>
                            <!-- pesan error -->
                            <?php if (!empty(session()->getFlashdata('error.stok'))) : ?>
                                <p class="text-red-600"><?= session()->getFlashdata('error.stok') ?></p>
                            <?php endif; ?>
                            <input type="number" name="stok" value="<?= $id_minuman['stok']; ?>" min="0" max="1000" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
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
                        <button type="submit" name="submit">Edit</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>