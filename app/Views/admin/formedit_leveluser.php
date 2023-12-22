<?= $this->extend('admin/app') ?>

<?= $this->section('title') ?>
Form Edit Level User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="px-20 py-10 m-auto">
    <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
        <div>
            <h1 class="text-2xl text-center font-bold uppercase">Edit Level User</h1>
        </div>
        <div>
            <?php if (!empty($id_level_user)) : ?>
                <form action="<?= base_url('CrudLevelUserController/formeditproses') ?>" method="POST">
                    <input type="hidden" name="id_level_user" value="<?= $id_level_user[0]->id_level_user; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                    <div class="mt-5 grid gap-x-8 gap-y-4">
                        <div>
                            <p class="font-medium">Nama Level User</p>
                            <!-- pesan error -->
                            <?php if (!empty(session()->getFlashdata('error.nama_level'))) : ?>
                                <p class="text-red-600"><?= session()->getFlashdata('error.nama_level') ?></p>
                            <?php endif; ?>
                            <input type="text" name="nama_level" value="<?= $id_level_user[0]->nama_level; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
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