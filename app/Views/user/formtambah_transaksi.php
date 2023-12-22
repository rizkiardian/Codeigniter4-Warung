<?= $this->extend('user/app') ?>

<?= $this->section('title') ?>
Transaksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="min-h-screen px-32 py-14">
    <div>
        <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
            <div>
                <h1 class="text-2xl text-center font-bold uppercase">Transaksi</h1>
            </div>
            <div>
                <form action="<?= base_url('CrudTransaksiController/formtambahproses') ?>" method="POST">
                    <?php if (!empty($makanan)) : ?>
                        <input type="hidden" name="id_makanan" value="<?= $makanan['id_makanan']; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                        <div class="mt-5 grid gap-x-8 gap-y-4">
                            <div class="m-auto h-[10rem] w-[10rem] items-center justify-center flex overflow-hidden">
                                <img src="/images/<?= $makanan['gambar']; ?>" class="h-full w-full object-contain">
                            </div>
                            <div class="flex justify-center items-center gap-5">
                                <div class="w-full">
                                    <p class="font-medium">Nama Makanan</p>
                                    <input type="text" readonly name="nama_makanan" value="<?= $makanan['nama_makanan']; ?>" class="capitalize focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                                </div>
                                <div class="w-full">
                                    <p class="font-medium">Harga Satuan</p>
                                    <input type="text" readonly name="harga" value="<?= $makanan['harga']; ?>" class="capitalize focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                                </div>
                            </div>
                            <div>
                                <p class="font-medium">Jumlah</p>
                                <!-- pesan error -->
                                <?php if (!empty(session()->getFlashdata('error.jumlah'))) : ?>
                                    <p class="text-red-600"><?= session()->getFlashdata('error.jumlah') ?></p>
                                <?php endif; ?>
                                <input type="number" min="1" max="<?= $makanan['stok']; ?>" name="jumlah" value="1" placeholder="masukkan jumlah" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                            </div>
                        </div>
                        <div class="mt-8 h-11 w-full rounded-lg bg-[#27ae60] font-medium text-white flex justify-center items-center">
                            <button type="submit" name="submit">Beli</button>
                        </div>
                    <?php elseif (!empty($minuman)) : ?>
                        <input type="hidden" name="id_minuman" value="<?= $minuman['id_minuman']; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                        <div class="mt-5 grid gap-x-8 gap-y-4">
                            <div class="m-auto h-[10rem] w-[10rem] items-center justify-center flex overflow-hidden">
                                <img src="/images/<?= $minuman['gambar']; ?>" class="h-full w-full object-contain">
                            </div>
                            <div class="flex justify-center items-center gap-5">
                                <div class="w-full">
                                    <p class="font-medium">Nama minuman</p>
                                    <input type="text" readonly name="nama_minuman" value="<?= $minuman['nama_minuman']; ?>" class="capitalize focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                                </div>
                                <div class="w-full">
                                    <p class="font-medium">Harga Satuan</p>
                                    <input type="text" readonly name="harga" value="<?= $minuman['harga']; ?>" class="capitalize focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                                </div>
                            </div>
                            <div>
                                <p class="font-medium">Jumlah</p>
                                <!-- pesan error -->
                                <?php if (!empty(session()->getFlashdata('error.jumlah'))) : ?>
                                    <p class="text-red-600"><?= session()->getFlashdata('error.jumlah') ?></p>
                                <?php endif; ?>
                                <input type="number" min="1" max="<?= $minuman['stok']; ?>" name="jumlah" value="1" placeholder="masukkan jumlah" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                            </div>
                        </div>
                        <div class="mt-8 h-11 w-full rounded-lg bg-[#27ae60] font-medium text-white flex justify-center items-center">
                            <button type="submit" name="submit">Beli</button>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>