<?= $this->extend('user/app') ?>

<?= $this->section('title') ?>
Tentang
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="bg-white py-20">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h2 class="text-4xl font-bold mb-8">Tentang Warung</h2>
        </div>
        <div class="flex justify-center">
            <div class="w-1/2 text-justify">
                <p class="text-lg mb-8">Warung Makanan adalah Warung yang menyajikan berbagai macam makanan lezat dan sehat.</p>
                <p class="text-lg leading-loose mb-8">Kami selalu menggunakan bahan-bahan segar dan berkualitas untuk membuat makanan kami. Selain itu, kami juga menawarkan berbagai macam menu vegetarian dan bebas gluten untuk memenuhi kebutuhan pelanggan kami yang memiliki gaya hidup khusus. Kami percaya bahwa makanan yang baik adalah makanan yang sehat, lezat, dan memuaskan.</p>
                <p class="text-lg leading-loose mb-8">Warung Makanan didirikan pada tahun 2010 oleh Rizki, seorang koki berpengalaman dengan visi untuk menyajikan makanan yang sehat dan lezat untuk semua orang. Saat ini, kami memiliki 5 cabang di seluruh kota dan terus berkembang untuk memenuhi kebutuhan pelanggan kami.</p>
                <p class="text-lg leading-loose mb-8">Terima kasih telah memilih Warung Makanan sebagai destinasi makanan Anda. Kami berharap dapat memberikan pengalaman makan yang menyenangkan dan memuaskan bagi Anda.</p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>