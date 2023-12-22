<?= $this->extend('user/app') ?>

<?= $this->section('title') ?>
Pesan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="min-h-screen px-32 py-14">
    <div>
        <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
            <div>
                <h1 class="text-2xl text-center font-bold uppercase">Pesan</h1>
                <?php if (!empty($TabelMakanan) || !empty($TabelMinuman)) : ?>
                    <div class="mt-4 mb-6 flex justify-center items-center">
                        <div class="mt-4 m-auto w-fit">
                            <form action="<?= base_url('MenuController/makanan') ?>" method="POST">
                                <button type="submit" class="bg-[#27ae60] py-2 px-8 rounded-lg text-white hover:font-semibold hover:px-12 hover:text-lg transition-all">Tambah Makanan</button>
                            </form>
                        </div>
                        <div class="mt-4 m-auto w-fit">
                            <form action="<?= base_url('MenuController/minuman') ?>" method="POST">
                                <button type="submit" class="bg-[#27ae60] py-2 px-8 rounded-lg text-white hover:font-semibold hover:px-12 hover:text-lg transition-all">Tambah Minuman</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <form action="<?= base_url('CrudTransaksiController/keranjangproses') ?>" method="POST">
                    <?php
                    if (!empty($TabelMakanan)) :
                        $count = 0;
                        foreach ($TabelMakanan as $makanan) : ?>
                            <input type="hidden" name="<?= 'id_makanan' . $count; ?>" value="<?= $makanan['id_makanan']; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                            <div class="mt-5 grid gap-x-8 gap-y-4 border-t-2 pt-4 pb-2 border-black/20">
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
                                <div class="flex justify-between items-end gap-5">
                                    <div class="w-[18rem]">
                                        <p class="font-medium">Jumlah</p>
                                        <!-- pesan error -->
                                        <?php if (!empty(session()->getFlashdata('error.jumlah'))) : ?>
                                            <p class="text-red-600"><?= session()->getFlashdata('error.jumlah') ?></p>
                                        <?php endif; ?>
                                        <input type="number" min="1" max="<?= $makanan['stok']; ?>" name="<?= 'jumlahmakanan' . $count; ?>" value="<?= session()->get('makanan')[$count]['jumlah']; ?>" placeholder="masukkan jumlah" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                                    </div>
                                    <a href="<?= base_url('CrudTransaksiController/hapuskeranjang/') . $count ?>" class="bg-red-600 py-[0.65rem] px-8 rounded-lg text-white hover:font-semibold hover:px-10 transition-all">Hapus</a>
                                </div>
                            </div>
                    <?php
                            $count += 1;
                        endforeach;
                    endif;
                    ?>
                    <?php if (!empty($TabelMinuman)) :
                        $count = 0;
                        foreach ($TabelMinuman as $minuman) : ?>
                            <input type="hidden" name="<?= 'id_minuman' . $count; ?>" value="<?= $minuman['id_minuman']; ?>" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                            <div class="mt-5 grid gap-x-8 gap-y-4 border-t-2 pt-4 pb-2 border-black/20">
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
                                    <input type="number" min="1" max="<?= $minuman['stok']; ?>" name="<?= 'jumlahminuman' . $count; ?>" value="<?= session()->get('minuman')[$count]['jumlah']; ?>" placeholder="masukkan jumlah" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                                </div>
                            </div>
                    <?php
                            $count += 1;
                        endforeach;
                    endif;
                    ?>
                    <?php if (!empty($TabelMakanan) || !empty($TabelMinuman)) : ?>
                        <div class="mt-8 h-11 w-full rounded-lg bg-[#27ae60] font-medium text-white flex justify-center items-center">
                            <button type="submit" name="submit">Pesan</button>
                        </div>
                    <?php else : ?>
                        <p class="mt-5 text-center text-[#27ae60] text-lg font-bold">Silahkan Pesan Terlebih Dahulu</p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>