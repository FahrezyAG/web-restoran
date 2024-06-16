<?php include "cdn.php";
include "adminpanel/session1.php";
?>

<div class="flex justify-between items-center shadow-xl sticky top-0 bg-white">

  <div class="font-semibold text-lg hidden md:block bg-white">
    <ul class="flex">
      <li
        class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer active">
        <a href="index.php#">Home</a>
      </li>
      <li
        class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
        <a href="index.php#makanan">Makanan</a>
      </li>
      <li
        class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
        <a href="index.php#minuman">Minuman</a>
      </li>
      <li
        class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
        <a href="index.php#cart">Cart</a>
      </li>
    </ul>
  </div>

  <div id="openNav" onclick="toggleNav(true)" class="p-3 rounded-lg block md:hidden">
    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 50 50">
      <path
        d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z">
      </path>
    </svg>
  </div>

  <div id="closeNav" onclick="toggleNav(false)" class="p-3 rounded-lg block md:hidden " style="display: none;">
    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 50 50">
      <path
        d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z">
      </path>
    </svg>
  </div>

  <?php
if (isset($_SESSION['name'])) {
?>
  <div class="flex">
    <a href="./adminpanel/logout.php" class="bg-white mr-10 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow justify-items-end">
      Logout
    </a>
  </div>
<?php
} else {
?>
  <div class="flex">
    <a href="./adminpanel" class="bg-white mr-10 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow justify-items-end">
      Login
    </a>
  </div>
<?php
}
?>



  
</div>


<!-- Mobile Menu -->
<div id="menu" class="font-semibold text-lg flex justify-center text-center sticky top-11"
  style="transform: translateY(0); display: none">
  <ul class="shadow-lg bg-white w-full">
    <li
      class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer active">
      <a href="index.php#">Home</a>
    </li>
    <li
      class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
      <a href="index.php#makanan">Makanan</a>
    </li>
    <li
      class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
      <a href="index.php#minuman">Minuman</a>
    </li>
    <li
      class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer">
      <a href="index.php#cart">Cart</a>
    </li>
  </ul>
</div>

<script>
  function toggleNav(isOpen) {
    const menu = document.getElementById("menu");
    const openNav = document.getElementById("openNav");
    const closeNav = document.getElementById("closeNav");

    if (isOpen) {
      menu.style.display = "block";
      openNav.style.display = "none";
      closeNav.style.display = "block";
    } else {
      menu.style.display = "none";
      openNav.style.display = "block";
      closeNav.style.display = "none";
    }
  }
</script>

<style>
  html {
    scroll-behavior: smooth;
  }
</style>