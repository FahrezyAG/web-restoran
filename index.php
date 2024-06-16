<?php
session_start();
require "koneksi.php";
require "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
<?php include "cdn.php";?>
</head>

<body>
    <?php require "header.php"; ?>
    <h1 class="font-bold text-3xl mt-5 pl-9 -mb-4" id="makanan">Menu Makanan 🍽️🍽️</h1>

    <?php require "card.php";?>
    <h1 class="font-bold text-3xl mt-5 pl-9 -mb-4" id="minuman">Menu Minuman 🍺🍺</h1>
    <?php require "card2.php"; ?>
    <?php require "footer.php"; ?>
    
</body>

</html>