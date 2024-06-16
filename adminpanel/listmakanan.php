<?php require "../koneksi.php";

$queryjumlah = mysqli_query($conn, "SELECT * FROM makanan");
$jumlahmakanan = mysqli_num_rows($queryjumlah);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makanan</title>
</head>
<?php include "../cdn.php" ?>

<body>
  <?php include "sidebar.php" ?>

  <div class="flex min-h-screen items-center justify-center text-white mt-20">
    <div class="overflow-x-auto">
      <table class="min-w-full dark:bg-[#2b493B]shadow-md dark:bg-[#1E293B] rounded-lg">
        <div class="flex">
        </div>

        <thead>
          <tr class="bg-blue-gray-100">
            <th class="py-3 px-4 text-left">Id</th>
            <th class="py-3 px-4 text-left">Makanan</th>
            <th class="py-3 px-4 text-left">Harga</th>
            <th class="py-3 px-4 text-left">Gambar</th>
            <th class="py-3 px-6 text-left">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-blue-gray-900">
          <?php
          while ($data = mysqli_fetch_array($queryjumlah)) {
            if ($jumlahmakanan == 0) {
              echo "tidak ada";

            } else { ?>
              <tr class="border-b border-blue-gray-200">
                <td class="py-3 px-4">
                  <?php echo $data['id'] ?>
                </td>
                <td class="py-3 px-4">
                  <?php echo $data['nama_makanan'] ?>
                </td>
                <td class="py-3 px-4">
                  <?php echo $data['harga'] ?>
                </td>
                <td class="py-3 px-4 max-w-1">
                  <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($data['image']) . '"/>'; ?>
                </td>
                <td class="py-3 px-4">
                  <a href="./proses2.php?id=<?php echo $data['id']; ?>"
                    class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                    <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                      </svg>
                    </span>
                  </a>
                </td>


              <?Php }
            ;
          }
          ?>
        </tbody>
      </table>
      <div class="flex justify-center">

        <a href="crud.php" type="button"
          class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4  focus:ring-gray-300 font-medium rounded-lg text-sm p-20 mt-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Buat
          Tabel Makanan Baru</a>
      </div>
    </div>
  </div>
</body>

</html>