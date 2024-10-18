<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mnumber = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $sql = "INSERT INTO tblusers (FullName, MobileNumber, EmailId, Password) VALUES ('$fname', '$mnumber', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "You are successfully registered. Now you can login.";
        header('location:Signin.php');
    } else {
        $_SESSION['msg'] = "Something went wrong. Please try again.";
        header('location:thankyou.php');
    }

    // Close the connection
    mysqli_close($conn);
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h2 class="text-4xl font-bold text-center mb-2">Namaste, Dost</h2>
        <p class="text-center text-gray-500 mb-6">Please enter your details to sign Up.</p>

        <form action="" method="post">
            <div class="flex justify-between space-x-4 mb-4">
                <button class="flex items-center justify-center w-1/3 bg-gray-100 border border-gray-300 rounded-lg py-2">
                    <i class="fab fa-apple text-xl"></i>
                </button>
                <button class="flex items-center justify-center w-1/3 bg-gray-100 border border-gray-300 rounded-lg py-2">
                    <i class="fab fa-google text-xl text-red-500"></i>
                </button>
                <button class="flex items-center justify-center w-1/3 bg-gray-100 border border-gray-300 rounded-lg py-2">
                    <i class="fab fa-twitter text-xl text-blue-500"></i>
                </button>
            </div>

            <div class="text-center text-gray-400 my-4 mb-5">OR
                <hr>
            </div>
            <div class="mb-4">
                <label for="text" class="block text-sm text-gray-700">Full Name</label>
                <input type="text" name="fname" placeholder="Enter your Full Name..." class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-gray-300 focus:outline-none">
            </div>
            <div class="mb-4">
                <label for="number" class="block text-sm text-gray-700">Phone Number</label>
                <input type="number" name="phone" placeholder="Enter your Phone number..." class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-gray-300 focus:outline-none">
            </div>
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">E-Mail Address</label>
                <input type="email" name="email" placeholder="Enter your email..." class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-gray-300 focus:outline-none">
            </div>

            <!-- Password Input -->
            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700">Password</label>
                <input type="password" name="password" placeholder='Enter you password' class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-gray-300 focus:outline-none">
            </div>


            <!-- Sign In Button -->
            <button class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-900 transition" name="submit">Sign Up</button>
        </form>

        <!-- Sign Up Link -->
        <div class="text-center mt-6 text-gray-500">
            You already have an account? <a href="../includes/Signin.php" class="text-black font-semibold hover:underline">Sign In</a>
        </div>
    </div>

    <!-- Font Awesome CDN for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
</body>

</html>