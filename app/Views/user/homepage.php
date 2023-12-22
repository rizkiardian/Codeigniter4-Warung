<?= $this->extend('user/app') ?>

<?= $this->section('title') ?>
Homepage
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="min-h-screen">
    <div class="grid grid-cols-2 gap-10 px-32 h-[65vh] bg-[url('<?= base_url('images/banner-bg.jpg') ?>')]">
        <div class="flex items-center">
            <div>
                <h1 class="text-5xl font-bold">Selamat Datang <span class="text-[#27ae60] underline"></span></h1>
                <h1 class="mt-5 text-5xl font-bold">Silahkan Memesan</h1>
            </div>
        </div>
        <div class="flex items-end">
            <div>
                <div class="z-10 relative flex justify-center items-end mb-[-2rem]">
                    <img src="<?= base_url('images/makanan2.png') ?>" class="w-48 h-full object-contain">
                    <img src="<?= base_url('images/makanan3.png') ?>" class="w-48 h-full object-contain">
                    <img src="<?= base_url('images/makanan8.png') ?>" class="w-48 h-full object-contain mb-[-1.8rem]">
                </div>
                <div>
                    <img src="<?= base_url('images/stand.png') ?>" class="w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-14 px-32 py-20 h-[35vh] shadow-lg rounded-b-[100px]">
        <div class="flex">
            <div>
                <svg class="icon icon-tabler icon-tabler-chef-hat w-14 text-[#27ae60]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 3c1.918 0 3.52 1.35 3.91 3.151a4 4 0 0 1 2.09 7.723l0 7.126h-12v-7.126a4 4 0 1 1 2.092 -7.723a4 4 0 0 1 3.908 -3.151z"></path>
                    <path d="M6.161 17.009l11.839 -.009"></path>
                </svg>
            </div>
            <div class="pl-2">
                <h1 class="text-xl font-bold">Masakan Sehat</h1>
                <p class="mt-2 text-sm">Diracik Oleh Ahlinya</p>
            </div>
        </div>
        <div class="flex">
            <div>
                <svg class="icon icon-tabler icon-tabler-salad w-14 text-[#27ae60]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 11h16a1 1 0 0 1 1 1v.5c0 1.5 -2.517 5.573 -4 6.5v1a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-1c-1.687 -1.054 -4 -5 -4 -6.5v-.5a1 1 0 0 1 1 -1z"></path>
                    <path d="M18.5 11c.351 -1.017 .426 -2.236 .5 -3.714v-1.286h-2.256c-2.83 0 -4.616 .804 -5.64 2.076"></path>
                    <path d="M5.255 11.008a12.204 12.204 0 0 1 -.255 -2.008v-1h1.755c.98 0 1.801 .124 2.479 .35"></path>
                    <path d="M8 8l1 -4l4 2.5"></path>
                    <path d="M13 11v-.5a2.5 2.5 0 1 0 -5 0v.5"></path>
                </svg>
            </div>
            <div class="pl-2">
                <h1 class="text-xl font-bold">Makanan Enak</h1>
                <p class="mt-2 text-sm">Dibumbu Sesuai Takaran</p>
            </div>
        </div>
        <div class="flex">
            <div>
                <svg class="icon icon-tabler icon-tabler-cup w-14 text-[#27ae60]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 11h14v-3h-14z"></path>
                    <path d="M17.5 11l-1.5 10h-8l-1.5 -10"></path>
                    <path d="M6 8v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1"></path>
                    <path d="M15 5v-2"></path>
                </svg>
            </div>
            <div class="pl-2">
                <h1 class="text-xl font-bold">Minuman Seger</h1>
                <p class="mt-2 text-sm">Dibikin Fresh Dari Tempatnya</p>
            </div>
        </div>
        <div class="flex">
            <div>
                <svg class="icon icon-tabler icon-tabler-tools-kitchen-2 w-14 text-[#27ae60]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M19 3v12h-5c-.023 -3.681 .184 -7.406 5 -12zm0 12v6h-1v-3m-10 -14v17m-3 -17v3a3 3 0 1 0 6 0v-3"></path>
                </svg>
            </div>
            <div class="pl-2">
                <h1 class="text-xl font-bold">Harga Bersaing</h1>
                <p class="mt-2 text-sm">Lebih Murah Dari Yang Lain</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>