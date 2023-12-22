<div class="z-[100] sticky top-0 bg-[#27ae60] border-b-2 border-black/50">
    <nav class="flex justify-between items-center px-20 py-3">
        <div class="flex items-center">
            <svg class="icon icon-tabler icon-tabler-bowl w-10 text-[#219150]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 8h16a1 1 0 0 1 1 1v.5c0 1.5 -2.517 5.573 -4 6.5v1a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-1c-1.687 -1.054 -4 -5 -4 -6.5v-.5a1 1 0 0 1 1 -1z"></path>
            </svg>
            <button class="text-white font-bold text-2xl">Warung </button>
        </div>
        <div class="flex items-center">
            <?php foreach ($menu as $row) : ?>
                <a href='<?= base_url("$row->nama_controller"); ?>' class="px-4 py-1 text-white hover:underline rounded-full ml-10"><?= $row->nama_menu; ?></a>
            <?php endforeach; ?>
            <form action='<?= base_url("LoginController/logout"); ?>' method="post">
                <?= csrf_field(); ?>
                <button type="submit" class="px-4 py-1 text-white hover:underline rounded-full ml-10">Logout</button>
            </form>
            <button class="px-4 py-1 uppercase text-black rounded-full ml-10"><?= session()->get('nama_user'); ?></button>
        </div>
    </nav>
</div>