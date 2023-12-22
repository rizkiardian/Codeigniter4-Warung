<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->renderSection('title') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* link aktif */
        .navLink.aktif{
            background-color: white;
            color: red;
        }
    </style>
</head>

<body>
    <?= $this->include('admin/layouts/navbar') ?>
    <div class="container">
        <div class="px-32 py-10 min-h-screen">
            <div class="flex min-h-[36rem] rounded-3xl border-2 border-[#27ae60]/50 shadow-lg">
                <div class="w-1/4 px-10 py-6 border-r-2 border-[#27ae60]/50 rounded-3xl">
                    <?php foreach ($menu as $row) : ?>
                        <div class="mb-[2px] flex items-center bg-[#219150] px-4 py-2 text-white rounded">
                            <div>
                                <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </div>
                            <div>
                                <a href='<?= base_url("$row->nama_controller"); ?>' class="pl-2 font-bold text-xl truncate"><?= $row->nama_menu; ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
    <?= $this->include('admin/layouts/footer') ?>
</body>

</html>