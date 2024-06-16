<?php
ob_start(); // Start output buffering

include "sidebar.php";
include "../cdn.php";
include "../koneksi.php";

$errors = array();

if (isset($_POST["submit"])) {
    // Check if any field is empty
    if (empty($_POST['nama'])) {
        $errors[] = 'Nama Makanan/Minuman harus diisi.';
    }
    if (empty($_POST['deskripsi'])) {
        $errors[] = 'Deskripsi harus diisi.';
    }
    if (empty($_POST['harga'])) {
        $errors[] = 'Harga harus diisi.';
    }
    if (empty($_FILES['image']['tmp_name'])) {
        $errors[] = 'Gambar harus diunggah.';
    }
    if (empty($_POST['menu'])) {
        $errors[] = 'Jenis menu harus dipilih.';
    }

    // If there are no errors, proceed with inserting data into the database
    if (empty($errors)) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $nama = htmlspecialchars($_POST['nama']);
        $deskripsi = htmlspecialchars($_POST['deskripsi']);
        $harga = htmlspecialchars($_POST['harga']);
        $menu = htmlspecialchars($_POST['menu']);

        if ($menu == 'minuman') {
            $result = mysqli_query($conn, "INSERT INTO minuman (nama_minuman, deskripsi, image, harga) VALUES ('$nama', '$deskripsi','$image', '$harga')");
            header('Location: listminuman.php');
        } else {
            $result = mysqli_query($conn, "INSERT INTO makanan (nama_makanan, deskripsi, image, harga) VALUES ('$nama', '$deskripsi','$image', '$harga')");
            header('Location: listmakanan.php');
        }

        exit(); // Make sure to exit after sending the header
    }
}

ob_end_flush(); // Flush the output buffer
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form class="min-h-screen flex flex-col text-white" action="" method="POST" enctype="multipart/form-data">
        <div class="flex flex-1 items-center justify-center mt-28">
            <div class="rounded-lg sm:border-2 px-4 lg:px-24 py-16 lg:max-w-xl sm:max-w-md w-full text-center">
                <form class="text-center">
                    <h1 class="font-bold tracking-wider text-3xl mb-8 w-full ">
                        Create Table
                    </h1>
                    <?php if (!empty($errors)): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline"> Ada kesalahan:</span>
                            <ul class="list-disc list-inside">
                                <?php foreach ($errors as $error): ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="mb-6">
                                <label class="block text-white text-lg text-start font-bold mb-2" for="password">
                                    Nama Makanan/Minuman
                                </label>
                                <input name="nama" class="bg-white bg-opacity-90 rounded w-full p-2  mb-3 "
                                    id="password">
                            </div>
                            <div class="mb-">
                                <label class="block text-white text-lg text-start font-bold mb-2" for="password">
                                    Deskripsi
                                </label>
                                <textarea name="deskripsi" class="bg-white bg-opacity-90 rounded w-full p-2 mb-3"
                                    id="password"></textarea>
                            </div>
                            <div class="mb-6">
                                <label class="block text-white text-lg text-start font-bold mb-2" for="password">
                                    Harga
                                </label>
                                <input type="number" name="harga" class="bg-white bg-opacity-90 rounded w-full p-2 mb-3"
                                    id="password">
                            </div>

                            <label class="block text-white text-lg text-start font-bold mb-2" for="password">
                                Gambar
                            </label>
                            <input
                                class="bg-gray-50 bg-opacity-90 text-md cursor-pointer border border-gray-300 rounded-lg  p-2 w-full "
                                aria-describedby="file_input_help" type="file" name="image">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300 text-start" id="file_input_help">
                                SVG, PNG, JPG or GIF (MAX 40MB.).
                            </p>
                            <select id="menu" name="menu"
                                class="bg-gray-50 bg-opacity-90 text-md cursor-pointer border border-gray-300 rounded-lg  p-2 w-full">
                                <option selected disabled>Pilih Menu</option>
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                            </select>
                            <button type="submit" name="submit"
                                class="hover:bg-gray-700 text-center text-lg text-white font-medium rounded-lg px-5 py-2.5 me-2 mb-2  bg-opacity-50 bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 w-full">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
</body>

</html>