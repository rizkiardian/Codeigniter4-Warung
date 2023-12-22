<?= $this->extend('admin/app') ?>

<?= $this->section('title') ?>
Form Edit User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="px-20 py-10 m-auto">
    <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
        <div>
            <h1 class="text-2xl text-center font-bold uppercase">Edit User</h1>
        </div>
        <div>
            <?php if (!empty($id_user)) : ?>
                <form action="<?= base_url('CrudUserController/formeditproses') ?>" method="POST">
                    <input type="hidden" name="id_user" value="<?= $id_user[0]->id_user; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                    <div class="mt-5 grid gap-x-8 gap-y-4">
                        <div>
                            <p class="font-medium">Username</p>
                            <!-- pesan error -->
                            <?php if (!empty(session()->getFlashdata('error.username'))) : ?>
                                <p class="text-red-600"><?= session()->getFlashdata('error.username') ?></p>
                            <?php endif; ?>
                            <input type="text" name="username" value="<?= $id_user[0]->nama_user; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                        </div>
                        <div>
                            <p class="font-medium">Password</p>
                            <!-- pesan error -->
                            <?php if (!empty(session()->getFlashdata('error.password'))) : ?>
                                <p class="text-red-600"><?= session()->getFlashdata('error.password') ?></p>
                            <?php endif; ?>
                            <input type="password" name="password" placeholder="*****" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                        </div>
                        <div>
                            <p class="font-medium">Level User</p>
                            <!-- pesan error -->
                            <?php if (!empty(session()->getFlashdata('error.id_level_user'))) : ?>
                                <p class="text-red-600"><?= session()->getFlashdata('error.id_level_user') ?></p>
                            <?php endif; ?>
                            <select name="id_level_user" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg capitalize">
                                <?php if (empty($TabelLevelUser)) : ?>
                                    <option value="" disabled selected>Tidak ada level pengguna yang tersedia</option>
                                <?php else : ?>
                                    <option value="" disabled>Pilih Level User</option>
                                    <?php foreach ($TabelLevelUser as $row) : ?>
                                        <!-- cek apakah id level usernya sama dengan tabel level -->
                                        <?php if ($row->id_level_user == $id_user[0]->id_level_user) : ?>
                                            <option selected value="<?= $row->id_level_user ?>"><?= $row->nama_level ?></option>
                                        <?php else : ?>
                                            <option value="<?= $row->id_level_user ?>"><?= $row->nama_level ?></option>
                                        <?php endif; ?>
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
                            <input type="number" name="telepon" value="<?= $id_user[0]->telepon; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
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