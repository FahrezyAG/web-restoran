<div class="grid xs-5 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 xl:gap-8 md:gap-4 sm:gap-2 gap-1 md:px-4 px-2 ">
  <?php

  // SQL QUERY l:grid-col
  $sql = "SELECT * FROM `makanan`"; 
  
  // FETCHING DATA FROM DATABASE 
  $result = $conn->query($sql); 
  while ($row = mysqli_fetch_array($result)) {?>
    <div class="my-6 max-w-sm rounded-lg border border-gray-100 bg-white shadow-xl" >
      <a class="mx-3 mt-3 flex justify-center items-center h-60 overflow-hidden rounded-xl" href="products.php?nama_makanan=<?php echo $row['nama_makanan']; ?>">
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';?>  
      </a>
      
      <div class="mt-4 px-5 pb-5">
        <a href="#">
          <h5 class="text-xl tracking-tight text-slate-900"><?php echo $row['nama_makanan']; ?></h5>
        </a>
        <div class="mt-2 mb-5 flex items-center ">
          <p>
            <span class="text-3xl font-bold text-slate-900">Rp <?php echo $row['harga'];?></span>
          
          </p>
        </div>
        <button type="button" onclick="addToCart(event)" class="flex items-center justify-center rounded-sm bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          Add to cart</button>
        
          
      </div>
    </div>
  <?php } ?>
</div>



<script>
var clicks = 0;

function addToCart(event) {
    event.preventDefault();
    alertify.success("Item added to cart!");
    
}

</script>

