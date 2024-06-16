<?php require "../koneksi.php";
 
$queryjumlah = mysqli_query($conn,"SELECT * FROM users");
$jumlahuser = mysqli_num_rows($queryjumlah);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
</head>
<?php include "../cdn.php" ?>
<body>
<?php include "sidebar.php" ?>
    <div class="flex min-h-screen items-center justify-center text-white mt-10">
      <div class="overflow-x-auto">
    <table class="min-w-full dark:bg-[#2b493B]shadow-md dark:bg-[#1E293B]">
      <thead>
        <tr class="bg-blue-gray-100">
          <th class="py-3 px-4 text-left">Id</th>
          <th class="py-3 px-4 text-left">Username</th>
          <th class="py-3 px-4 text-left">Password</th>
          <th class="py-3 px-4 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-blue-gray-900">
        <?php 
        while ($data=mysqli_fetch_array($queryjumlah)) {
            if($jumlahuser==0) {
echo "tidak ada";

            }
            else{?>
               <tr class="border-b border-blue-gray-200">
                   <td class="py-3 px-4"><?php echo $data['id'] ?></td>
                   <td class="py-3 px-4"><?php echo $data['username'] ?></td>
          <td class="py-3 px-4"><?php echo $data['password'] ?></td>
          <td class="py-3 px-4">
                    <a href="./proses.php?id=<?php echo $data['id']; ?>"
                      class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                      <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                      </span>
                    </a>
                  </td>

            <?Php };
        }
        ?>
       
    
        <!-- Add more rows as needed -->
        
      </tbody>
    </table>
    
  </div>
</div>
</body>
</html>