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
    <?= $this->include('user/layouts/navbar') ?>
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
    <?= $this->include('user/layouts/footer') ?>
</body>

</html>