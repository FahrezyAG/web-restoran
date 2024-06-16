<?php
require "../koneksi.php";
require "../cdn.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

while ($user_data = mysqli_fetch_array($result)) {
    $username = $user_data['username'];
    $password = $user_data['password'];
}

?>

<form method="POST" class="max-w-md mx-auto mt-8">
    <div class="overflow-hidden shadow sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $username ?>"
                        class="mt-1 peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current
                        Password</label>
                    <p class="mt-1 line-clamp-1"><?php echo $password ?></p>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="new_password" class="block text-sm font-medium text-gray-700">Change Password</label>
                    <input type="text" name="password" id="new_password"
                        class="mt-1 peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600">
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" name="simpan"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Simpan
            </button>
            <button type="submit" name="delete"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Delete
            </button>
        </div>

    </div>

    <?php
    if (isset($_POST['simpan'])) {
        header('Location: users.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($conn, "UPDATE users SET username='$username', password='$hashed_password' WHERE id=$id");
    }
    if (isset($_POST['delete'])) {
        header('Location: users.php');
        $result = mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    }
    ?>
</form>