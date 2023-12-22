<?= $this->extend('admin/app') ?>

<?= $this->section('title') ?>
Form Tambah User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="px-20 py-10 m-auto">
    <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
        <div>
            <h1 class="text-2xl text-center font-bold uppercase">Tambah User</h1>
        </div>
        <div>
            <form action="<?= base_url('CrudUserController/formtambahproses') ?>" method="POST">
                <div class="mt-5 grid gap-x-8 gap-y-4">
                    <div>
                        <p class="font-medium">Username</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.username'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.username') ?></p>
                        <?php endif; ?>
                        <input type="text" name="username" placeholder="masukkan username" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                    </div>
                    <div>
                        <p class="font-medium">Password</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.password'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.password') ?></p>
                        <?php endif; ?>
                        <input type="password" name="password" placeholder="masukkan password" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                    </div>
                    <div>
                        <p class="font-medium">Level User</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.id_level_user'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.id_level_user') ?></p>
                        <?php endif; ?>
                        <select name="id_level_user" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
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
                        <p class="font-medium">Telepon</p>
                        <!-- pesan error -->
                        <?php if (!empty(session()->getFlashdata('error.telepon'))) : ?>
                            <p class="text-red-600"><?= session()->getFlashdata('error.telepon') ?></p>
                        <?php endif; ?>
                        <input type="number" name="telepon" placeholder="masukkan telepon" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
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