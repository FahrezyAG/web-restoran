<?php require "koneksi.php"; ?>
<?php require "cdn.php"; ?>
<?php require "navbar.php";
$nama = htmlspecialchars($_GET["nama_makanan"]);
$query = mysqli_query($conn, "SELECT * FROM makanan WHERE nama_makanan='$nama'");
$produk = mysqli_fetch_array($query);
?>
<!-- component -->

<section class="text-gray-700 body-font overflow-hidden bg-white">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      
      <a alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center border border-gray-200">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($produk['image']).'"/>';?>   
    </a>
      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
     
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?php echo $produk['nama_makanan']; ?></h1>
        <div class="flex mb-4">
          <span class="flex items-center">
            
            <h1 class="text-gray-600 font-medium mt-9">Deskripsi</h1>
          </span>
          
          </span>
        </div>
        <p class="leading-relaxed"><?php echo $produk['deskripsi']; ?></p>
        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
         
          <div class="flex ml-6 items-center">
            
            <div class="relative">
              
              
              </span>
            </div>
          </div>
        </div>
        <div class="flex">
          <span class="title-font font-medium text-2xl text-gray-900">Rp. <?php echo $produk['harga']; ?></span>
          <div class="flex ml-auto  px-6 ">
          <button type="button" onclick="addToCart(event)" class="flex items-center justify-center rounded-sm bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          Add to cart</button>
          
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>


<script>
var clicks = 0;

function addToCart(event) {
    event.preventDefault();
    alertify.success("Item added to cart!");
}

</script>