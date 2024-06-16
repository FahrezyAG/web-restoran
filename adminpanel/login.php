<?php
session_start();
require "../koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <form class="min-h-screen flex flex-col" action="login.php" method="POST">

        <div class="flex flex-1 items-center justify-center">
            <div class="rounded-lg sm:border-2 px-4 lg:px-24 py-16 lg:max-w-xl sm:max-w-md w-full text-center">
                <form class="text-center">
                    <h1 class="font-bold tracking-wider text-3xl mb-8 w-full text-gray-600">
                        Login
                    </h1>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="relative">
                                <input autocomplete="off" id="email" name="username" type="text"
                                    class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                    placeholder="Username" />
                                <label for="email"
                                    class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Username</label>
                            </div>
                            <div class="relative">
                                <input autocomplete="off" id="password" name="password" type="password"
                                    class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                    placeholder="Password" />
                                <label for="password"
                                    class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                            </div>

                            <button type="submit" name="loginbtn"
                                class="border-2 border-gray-100 focus:outline-none bg-indigo-600 text-white font-bold tracking-wider block w-full p-2 rounded-lg focus:border-gray-700 hover:bg-indigo-700">
                                Log in
                            </button>
                        </div>
                </form>

                <div>
                    <?php
                    if (isset($_POST['loginbtn'])) {
                        $username = htmlspecialchars($_POST['username']);
                        $password = htmlspecialchars($_POST['password']);
                        $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
                        $countdata = mysqli_num_rows($query);
                        $data = mysqli_fetch_array($query);

                        if ($countdata > 0) {

                            if (password_verify($password, $data['password'])) {
                                if ($data['level'] == "admin") {
                                    $_SESSION['login'] = true;
                                    echo "<script> window.location.href='index.php';</script>";
                                }else{

                                    $_SESSION['username'] = $data['username'];
                                    echo "<script> window.location.href='../index.php';</script>";
                                    $_SESSION['name'] = "$username";
                                }
                            } else {
                                ?>
                                <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md"
                                    role="alert">
                                    <div class="flex items-center px-16">
                                        <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M12.729 2.75L9 6.478 5.271 2.75A1.5 1.5 0 1 0 2.75 5.271L6.478 9l-3.729 3.729a1.5 1.5 0 0 0 2.121 2.122L9 11.122l3.729 3.729a1.5 1.5 0 0 0 2.121-2.122L11.121 9l3.729-3.729a1.5 1.5 0 0 0-2.121-2.121z" />
                                            </svg></div>
                                        <div>
                                            <p class="font-bold">Password Salah</p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else { ?>
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                                role="alert">
                                <div class="flex items-center px-16">
                                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                        </svg></div>
                                    <div>
                                        <p class="font-bold">Akun Tidak Ditemukan</p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="flex m-2 mt-9">
                        <h1>Dont have an account?</h1>
                        <a href="register.php" class="px-2 text-blue-500 hover:underline">Register</a>
                    </div>
                </div>
                <div>
                    <div class=" py-5 text-lg font-bold ">
                        <a href="../index.php" class="hover:text-blue-700">Back To Home</a>
                    </div>
                </div>
    </form>


</body>

</html>