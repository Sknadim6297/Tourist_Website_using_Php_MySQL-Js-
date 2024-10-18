<?php
session_start();
include 'config.php';

if (isset($_SESSION['login'])) {
    $user_id = $_SESSION['user'];
    $sql = "SELECT * FROM tblusers WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "No user found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
</head>
<style>
    .sidebar {
        position: fixed;
        top: 0;
        right: -300px;
        /* Initially off the screen */
        width: 300px;
        height: 100%;
        background-color: black;
        color: white;
        padding: 20px;
        transition: right 0.4s ease;
        /* Smooth slide effect */
        z-index: 1000;
    }

    /* Sidebar when active */
    .sidebar.active {
        right: 0;
        /* Slide in from the right */
    }

    /* Profile and Admin Button styles */
    .sidebar button {
        display: block;
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        background-color: white;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    /* Styling for hover effect */
    .sidebar button:hover {
        background-color: red;
        color: white;
    }

    /* Overlay background when sidebar is open */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
        display: none;
    }

    .overlay.active {
        display: block;
    }
</style>

<body>
    <header class="fixed top-0 left-0 w-full flex justify-between items-center p-6 z-20 bg-black bg-opacity-50">
        <!-- Logo -->
        <div class="flex items-center text-white">
            <span class="ml-3 text-2xl font-semibold">Sk. Adventures</span>
        </div>

        <nav class="">
            <ul class="flex space-x-6 text-white">
                <li><a href="index.php" class="hover:text-red-500">Home</a></li>
                <li><a href="page.php?type=aboutus" class="hover:text-red-500">About</a></li>
                <li><a href="package-list.php" class="hover:text-red-500">Tour packages</a></li>
                <li><a href="page.php?type=privacy" class="hover:text-red-500">Privacy Policy</a></li>
                <li><a href="page.php?type=terms" class="hover:text-red-500">Terms of Use</a></li>
                <li><a href="page.php?type=contact" class="hover:text-red-500">Contact Us</a></li>
                <li><a href="enquiry.php" class="hover:text-red-500">Enquiry</a></li>
            </ul>
        </nav>

        <div class="flex items-center space-x-4 text-white">
            <?php
            if (isset($user)) {
                echo "<h1>Welcome, " . htmlspecialchars($user['FullName']) . "</h1>";
            } else {
                echo '<a href="includes/Signin.php" class="bg-transparent border-2 border-white text-white px-7 py-2 rounded-lg hover:bg-white hover:text-black transition">Login Now</a>';
            }
            ?>
        </div>

        <div class="cursor-pointer" onclick="toggleSidebar()">
            <i class="fa-solid fa-bars text-white hover:text-red-600"></i>
        </div>
    </header>


    <div id="mySidebar" class="sidebar">
        <h2>Menu</h2>
        <button onclick="alert('Profile Clicked')">Profile</button>
        <button><a href="admin/index.php">Admin</a></button>
    </div>

    <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>

    <script>

    </script>
</body>

</html>