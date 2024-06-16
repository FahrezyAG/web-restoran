<section class="font-serif tracking-tighter">
  <div class="flex flex-col md:flex-row items-center py-2 mx-auto p-10 ">
    <div class="w-full md:w-1/2 py-3">
      <h1 class="text-4xl font-semibold hover:text-black  ml-1 xl:ml-20">
        Selamat Datang
        <div class="text-orange-500">
          <?php
          require "adminpanel/session1.php";

          $name = $_SESSION['name'] ?? null;

          if ($name !== null) {
            echo "" . $name . "!";
          }else{
            echo"Di Restoran Kami";
          } ?>
        </div>
      </h1>
    </div>
    <div class="w-full md:w-1/2 px-1 mt-10 mb-10 ">
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96 w-full">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                <img src="https://wallpapers.com/images/high/doyle-restaurant-bar-in-the-dupont-circle-hotel-wjw7pbkc2ftqb4v9.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Restaurant Image 1">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://wallpapers.com/images/high/el-farallon-restaurant-in-cabo-san-lucas-mexico-su6h4hr7d6blpemp.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Restaurant Image 2">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://wallpapers.com/images/high/beef-wellington-restaurant-juicy-y4nflvnluuln3o7i.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Restaurant Image 3">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://wallpapers.com/images/high/long-restaurant-table-with-glass-utscy0xugwxs4x1v.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Restaurant Image 4">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://wallpapers.com/images/high/glasses-on-restaurant-table-during-golden-hour-pqjzgouwuva4s618.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Restaurant Image 5">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-0 left-1/2 space-x-3 rtl:space-x-reverse mt-5">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
      
</div>


    </div>
  </div>
</section>
<?php

?>