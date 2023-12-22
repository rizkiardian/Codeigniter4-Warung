<?= $this->extend('admin/app') ?>

<?= $this->section('title') ?>
Form Tambah Level Menu
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="px-20 py-10 m-auto">
    <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
        <div>
            <h1 class="text-2xl text-center font-bold uppercase">Tambah Level Menu</h1>
        </div>
        <div>
            <form action="<?= base_url('CrudLevelMenuController/formtambahproses') ?>" method="POST">
                <div class="mt-5 grid gap-x-8 gap-y-4">
                    <div>
                        <p class="font-medium">Level User</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.id_level_user'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.id_level_user') ?></p>
                        <?php endif; ?>
                        <select name="id_level_user" class="capitalize focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                            <?php if (empty($TabelLevelUser)) : ?>
                                <option value="" disabled selected>Tidak ada level pengguna yang tersedia</option>
                            <?php else : ?>
                                <option value="" disabled selected>Pilih Level User</option>
                                <?php foreach ($TabelLevelUser as $row) : ?>
                                    <option value="<?= $row->id_level_user ?>"><?= $row->nama_level ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div>
                        <p class="font-medium">Menu</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.id_menu'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.id_menu') ?></p>
                        <?php endif; ?>
                        <select name="id_menu" class="capitalize focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                            <?php if (empty($TabelMenu)) : ?>
                                <option value="" disabled selected>Tidak ada level pengguna yang tersedia</option>
                            <?php else : ?>
                                <option value="" disabled selected>Pilih Level User</option>
                                <?php foreach ($TabelMenu as $row) : ?>
                                    <option value="<?= $row->id_menu ?>"><?= $row->nama_menu ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div>
                        <p class="font-medium">Status</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.status'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.status') ?></p>
                        <?php endif; ?>
                        <select name="status" class="capitalize focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
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