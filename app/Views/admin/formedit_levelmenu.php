<?= $this->extend('admin/app') ?>

<?= $this->section('title') ?>
Form Edit Level Menu
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="px-20 py-10 m-auto">
    <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
        <div>
            <h1 class="text-2xl text-center font-bold uppercase">Edit Level Menu</h1>
        </div>
        <div>
            <?php if (!empty($id_level_menu)) : ?>
                <form action="<?= base_url('CrudLevelMenuController/formeditproses') ?>" method="POST">
                    <input type="hidden" name="id_level_menu" value="<?= $id_level_menu[0]->id_level_menu; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
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
                                    <option value="" disabled>Pilih Level User</option>
                                    <?php foreach ($TabelLevelUser as $row) : ?>
                                        <!-- cek apakah id level usernya sama dengan tabel level menu -->
                                        <?php if ($row->id_level_user == $id_level_menu[0]->id_level_user) : ?>
                                            <option selected value="<?= $row->id_level_user ?>"><?= $row->nama_level ?></option>
                                        <?php else : ?>
                                            <option value="<?= $row->id_level_user ?>"><?= $row->nama_level ?></option>
                                        <?php endif; ?>
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
                                    <option value="" disabled selected>Tidak ada menu yang tersedia</option>
                                <?php else : ?>
                                    <option value="" disabled>Pilih Menu</option>
                                    <?php foreach ($TabelMenu as $row) : ?>
                                        <!-- cek apakah id menu usernya sama dengan tabel menu -->
                                        <?php if ($row->id_menu == $id_level_menu[0]->id_menu) : ?>
                                            <option selected value="<?= $row->id_menu ?>"><?= $row->nama_menu ?></option>
                                        <?php else : ?>
                                            <option value="<?= $row->id_menu ?>"><?= $row->nama_menu ?></option>
                                        <?php endif; ?>
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
                                <option value="" disabled>Pilih Status</option>
                                <!-- cek status mana yang terpilih -->
                                <?php if ($id_level_menu[0]->status == 'aktif') : ?>
                                    <option selected value="aktif">aktif</option>
                                    <option value="nonaktif">nonaktif</option>
                                <?php else : ?>
                                    <option value="aktif">aktif</option>
                                    <option selected value="nonaktif">nonaktif</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-8 h-11 w-full rounded-lg bg-[#27ae60] font-medium text-white flex justify-center items-center">
                        <button type="submit" name="submit">Tambah</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>