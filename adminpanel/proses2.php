<?php
ob_start();

include "sidebar.php";
include "../cdn.php";
include "../koneksi.php";

$errors = array();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM makanan WHERE id = $id");
$data = mysqli_fetch_array($result);

ob_end_flush();
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
                        Update Table
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
                                <input name="nama" value="<?php echo $data['nama_makanan'] ?>"
                                    class="bg-white bg-opacity-90 rounded w-full p-2  mb-3 " id="password">
                            </div>
                            <div class="mb-">
                                <label class="block text-white text-lg text-start font-bold mb-2" for="password">
                                    Deskripsi
                                </label>
                                <input name="deskripsi" value="<?php echo $data['deskripsi'] ?>"
                                    class="bg-white bg-opacity-90 rounded w-full p-2 mb-3" id="password">
                            </div>
                            <div class="mb-6">
                                <label class="block text-white text-lg text-start font-bold mb-2" for="password">
                                    Harga
                                </label>
                                <input type="number" value="<?php echo $data['harga'] ?>" name="harga"
                                    class="bg-white bg-opacity-90 rounded w-full p-2 mb-3" id="password">
                            </div>

                            <label class="block text-white text-lg text-start font-bold mb-2" for="password">
                                Gambar
                            </label>
                            <td class="py-3 px-4 max-w-1">
                                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($data['image']) . '"/>'; ?>
                            </td>
                            <button type="submit" name="submit"
                                class="hover:bg-gray-700 text-center text-lg text-white font-medium rounded-lg px-5 py-2.5 me-2 mb-2  bg-opacity-50 bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 w-full">Update</button>
                        </div>
                        <button type="submit" name="delete"
                            class="hover:bg-red-800 text-center text-lg text-white font-medium rounded-lg px-5 py-2.5 mb-2 bg-red-700 w-full">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </form>
</body>

</html>

<?php

if (isset($_POST["submit"])) {

    $nama = htmlspecialchars($_POST['nama']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $harga = htmlspecialchars($_POST['harga']);
    $result = mysqli_query($conn, "UPDATE makanan SET nama_makanan='$nama', deskripsi= '$deskripsi', harga = '$harga' WHERE id = $id");
    echo "<script> window.location.href='listmakanan.php';</script>";

}

if (isset($_POST['delete'])) {
    echo "<script> window.location.href='listmakanan.php';</script>";
    $result = mysqli_query($conn, "DELETE FROM makanan WHERE id=$id");
}
?>