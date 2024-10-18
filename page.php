<?php

session_start();
error_reporting(0);
include('includes/config.php');


if (isset($_POST['submit1'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobileno'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];


    $sql = "INSERT INTO tblenquiry (FullName, EmailId, MobileNumber, Subject, Description) 
            VALUES ('$fname', '$email', '$mobile', '$subject', '$description')";


    if (mysqli_query($conn, $sql)) {
        $msg = "Enquiry Successfully submitted.";
    } else {
        $error = "Something went wrong. Please try again.";
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>TMS | Tourism Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Tourism Management System In PHP" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
</head>

<body>
    <!-- top-header -->
    <div class="top-header">
        <?php include('includes/header.php'); ?>
    </div>

    <div class="privacy">
        <div class="container mx-auto py-8">
            <?php
            $pagetype = $_GET['type'];
            $sql = "SELECT type, detail FROM tblpages WHERE type='$pagetype'";
            $query = mysqli_query($conn, $sql);
            while ($result = mysqli_fetch_assoc($query)) {
                echo "<p class='text-lg text-gray-700 leading-relaxed'>{$result['detail']}</p>";
            }
            ?>

            <!-- Display success or error messages -->
            <?php if ($msg) { ?>
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4"><?php echo htmlentities($msg); ?></div>
            <?php } else if ($error) { ?>
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4"><?php echo htmlentities($error); ?></div>
            <?php } ?>
        </div>
    </div>



    <?php include('includes/footer.php'); ?>

</body>

</html>