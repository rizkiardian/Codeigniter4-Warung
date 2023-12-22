<?= $this->extend('admin/app') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="w-3/4 px-10 py-6">
    <h1 class="text-3xl font-bold text-center">Selamat Datang di Halaman Admin</h1>
    <h1 class="mt-4 text-3xl font-bold text-center text-[#27ae60] underline"></h1>
    <div class="w-1/2 m-auto mt-28">
        <img src="<?= base_url('images/dashboard-img1.jpg') ?>">
    </div>
</div>
<?= $this->endSection() ?>