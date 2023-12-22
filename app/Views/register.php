<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Register </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .navLink.aktif {
            background-color: white;
            color: rgb(7 89 133);
        }
    </style>
</head>

<body>

    <div class="sticky top-0 bg-[#27ae60] border-b-2 border-black/50">
        <nav class="flex justify-between items-center px-20 py-3">
            <div class="flex items-center">
                <svg class="icon icon-tabler icon-tabler-bowl w-10 text-[#219150]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 8h16a1 1 0 0 1 1 1v.5c0 1.5 -2.517 5.573 -4 6.5v1a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-1c-1.687 -1.054 -4 -5 -4 -6.5v-.5a1 1 0 0 1 1 -1z"></path>
                </svg>
                <button class="text-white font-bold text-2xl">Warung </button>
            </div>
            <div class="flex items-center">
                <!-- <a href="#" class="px-4 py-1 text-white hover:underline rounded-full ml-10">Home</a> -->
                <a href='<?= base_url("/LoginController/register"); ?>' class="px-4 py-1 text-white hover:underline rounded-full ml-10">Register</a>
                <a href='<?= base_url("/LoginController"); ?>' class="px-4 py-1 text-white hover:underline rounded-full ml-10">Login</a>
            </div>
        </nav>
    </div>


    <div class="p-20 min-h-screen">
        <div class="px-20 py-10 m-auto">
            <div class="p-5 m-auto w-[40rem] shadow-lg border-2 border-black/10 rounded-2xl">
                <div>
                    <h1 class="text-2xl text-center font-bold uppercase">Register</h1>
                </div>
                <div>
                    <form action="<?= base_url('CrudUserController/formtambahproses') ?>" method="POST">
                        <div class="mt-5 grid gap-x-8 gap-y-4">
                            <div>
                                <p class="font-medium">Username</p>
                                <!-- pesan error -->
                                <?php if (!empty(session()->getFlashdata('error.username'))) : ?>
                                    <p class="text-red-600"><?= session()->getFlashdata('error.username') ?></p>
                                <?php endif; ?>
                                <input type="text" name="username" placeholder="masukkan username" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                            </div>
                            <div>
                                <p class="font-medium">Password</p>
                                <!-- pesan error -->
                                <?php if (!empty(session()->getFlashdata('error.password'))) : ?>
                                    <p class="text-red-600"><?= session()->getFlashdata('error.password') ?></p>
                                <?php endif; ?>
                                <input type="password" name="password" placeholder="masukkan password" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                            </div>
                            <div>
                                <p class="font-medium">Level User</p>
                                <!-- pesan error -->
                                <?php if (!empty(session()->getFlashdata('error.id_level_user'))) : ?>
                                    <p class="text-red-600"><?= session()->getFlashdata('error.id_level_user') ?></p>
                                <?php endif; ?>
                                <select name="id_level_user" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                                    <!-- <option value="" disabled selected>Pilih Level User</option> -->
                                    <option value="1">Pelanggan</option>
                                </select>
                            </div>
                            <div>
                                <p class="font-medium">Telepon</p>
                                <!-- pesan error -->
                                <?php if (!empty(session()->getFlashdata('error.telepon'))) : ?>
                                    <p class="text-red-600"><?= session()->getFlashdata('error.telepon') ?></p>
                                <?php endif; ?>
                                <input type="number" name="telepon" placeholder="masukkan telepon" class="focus:outline-0 mt-2 border-2 border-[#27ae60]/50 h-11 w-full pl-3 rounded-lg">
                            </div>
                        </div>
                        <div class="mt-8 h-11 w-full rounded-lg bg-[#27ae60] font-medium text-white flex justify-center items-center">
                            <button type="submit" name="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="px-32 py-5 bg-[#27ae60]">
        <div class="grid grid-cols-4 gap-20 py-5 border-b-2 border-[#219150] text-white">
            <div>
                <h1 class="text-xl font-bold">Kategori </h1>
                <div class="flex flex-col mt-3">
                    <a href="#">Enak</a>
                    <a href="#">Enak Pol</a>
                    <a href="#">Enak Tenan</a>
                </div>
            </div>
            <div>
                <h1 class="text-xl font-bold">Lihat </h1>
                <div class="flex flex-col mt-3">
                    <a href="#">Trending</a>
                    <a href="#">Terbaru</a>
                    <a href="#">Terlaris</a>
                </div>
            </div>
            <div>
                <h1 class="text-xl font-bold">Warung </h1>
                <div class="flex flex-col mt-3">
                    <a href="#">Tentang Warung</a>
                    <a href="#">Blog</a>
                    <a href="#">Mitra Warung</a>
                </div>
            </div>
            <div>
                <h1 class="text-xl font-bold">Ikuti Kami</h1>
                <div class="flex flex-col mt-3">
                    <a href="#">Facebook</a>
                    <a href="#">Instagram</a>
                    <a href="#">Twitter</a>
                </div>
            </div>
        </div>
        <div class="flex justify-between py-5 font-medium">
            <h1>&copy; 2022 Warung </h1>
            <a href="#">Persyaratan & Privasi</a>
        </div>
    </div>

</body>

</html>