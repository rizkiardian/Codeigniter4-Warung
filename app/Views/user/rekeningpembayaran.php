<?= $this->extend('user/app') ?>

<?= $this->section('title') ?>
Pembayaran
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="min-h-screen px-32 py-14">
    <div>
        <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
            <div>
                <h1 class="text-2xl text-center font-bold uppercase">Pembayaran</h1>
            </div>
            <div>
                <div class="mt-5 grid gap-x-8 gap-y-4">
                    <div>
                        <p class="font-medium">No Rekening</p>
                        <div class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 w-full px-3 py-2 rounded-lg flex justify-between items-center">
                            <p><?= $transaksi['metode_pembayaran']; ?></p>
                            <p class="font-semibold"><?= $transaksi['no_rekening']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 px-5">
                    <div class="flex justify-between items-center border-black/50">
                        <p>Total Pembayaran</p>
                        <p class="font-semibold"><?= 'Rp' . $transaksi['total_bayar']; ?></p>
                    </div>
                </div>
                <div class="mt-2 px-5">
                    <div class="flex justify-between items-center border-black/50">
                        <p>Batas Akhir Pembayaran</p>
                        <p class="font-semibold"><?= date('H:i:s', strtotime($transaksi['tanggal_setelahnya'])); ?>, <?= date('d M Y', strtotime($transaksi['tanggal_setelahnya'])); ?></p>
                    </div>
                </div>
                <div class="mt-2 px-5">
                    <div class="flex justify-between items-center border-black/50">
                        <p></p>
                        <p class="font-semibold" id="batas_akhir"></p>
                        <p></p>
                    </div>
                </div>
                <div class="flex justify-center items-center gap-[10rem]">
                    <div class="mt-8 h-11 w-full rounded-lg bg-red-600 font-medium text-white flex justify-center items-center">
                        <form action="<?= base_url('CrudTransaksiController/bayarnanti') ?>" method="POST">
                            <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">
                            <button type="submit" name="submit">Bayar Nanti</button>
                        </form>
                    </div>
                    <div class="mt-8 h-11 w-full rounded-lg bg-[#27ae60] font-medium text-white flex justify-center items-center">
                        <form action="<?= base_url('CrudTransaksiController/sudahbayar') ?>" method="POST">
                            <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">
                            <button type="submit" name="submit">Sudah Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Mendapatkan tanggal batas akhir dari PHP
    let batasAkhir = "<?= $transaksi['tanggal_setelahnya']; ?>";

    // Mengubah format tanggal batas akhir menjadi waktu JavaScript
    let targetDate = new Date(batasAkhir).getTime();

    // Memperbarui waktu mundur setiap detik
    let countdown = setInterval(function() {
        // Mendapatkan waktu saat ini
        let now = new Date().getTime();

        // Menghitung selisih waktu antara waktu sekarang dan batas akhir
        let timeDiff = targetDate - now;

        // Menghitung hari, jam, menit, dan detik
        let days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
        let hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

        // Format waktu dengan leading zero
        // let countdownText = days + " hari, " + ('0' + hours).slice(-2) + ":" + ('0' + minutes).slice(-2) + ":" + ('0' + seconds).slice(-2);
        let countdownText = (hours + ' Jam') + " : " + (minutes + ' menit') + " : " + (seconds + ' detik');

        // Menampilkan waktu mundur di elemen dengan ID "batas_akhir"
        // document.getElementById("batas_akhir").innerHTML = countdownText;
        document.querySelector("#batas_akhir").innerHTML = countdownText;

        // Saat mencapai batas akhir, hentikan countdown
        if (timeDiff <= 0) {
            clearInterval(countdown);
            document.querySelector("#batas_akhir").innerHTML = "Pesanan Dibatalkan";
        }
    }, 1000); // Interval per detik
</script>

<?= $this->endSection() ?>