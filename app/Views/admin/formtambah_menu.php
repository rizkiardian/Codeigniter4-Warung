<?= $this->extend('admin/app') ?>

<?= $this->section('title') ?>
Form Tambah Menu
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="px-20 py-10 m-auto">
    <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
        <div>
            <h1 class="text-2xl text-center font-bold uppercase">Tambah Menu</h1>
        </div>
        <div>
            <form action="<?= base_url('CrudMenuController/formtambahproses') ?>" method="POST">
                <div class="mt-5 grid gap-x-8 gap-y-4">
                    <div>
                        <p class="font-medium">Nama Menu</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.nama_menu'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.nama_menu') ?></p>
                        <?php endif; ?>
                        <input type="text" name="nama_menu" placeholder="masukkan nama menu" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                    </div>
                    <div>
                        <p class="font-medium">Nama Controller</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.nama_controller'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.nama_controller') ?></p>
                        <?php endif; ?>
                        <input type="text" name="nama_controller" placeholder="masukkan nama controller" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
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