<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Adventure Begins Here</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased">
    <!-- Header -->
    <?php include 'includes/header.php' ?>

    <!-- Hero Section -->
    <section class="relative h-screen bg-cover bg-center text-white flex flex-col justify-center" style="background-image: url('https://images.unsplash.com/photo-1617394863376-e762840b6893?q=80&w=1368&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-center max-w-4xl mx-auto p-8 flex flex-col items-center justify-center">
            <h1 class="text-5xl md:text-7xl font-extrabold mb-4 leading-tight">Your Adventure Begins Here!</h1>
            <p class="text-sm md:text-lg mb-8 max-w-2xl text-gray-300 leading-relaxed">
                Explore the stunning islands of Seychelles, with pristine beaches, coral reefs, and nature reserves. Join us in discovering rare wildlife and breathtaking views.
            </p>
            <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                <a href="#" class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition">See all activities</a>
                <a href="#" class="border-2 border-white text-white px-6 py-3 rounded-lg hover:bg-white hover:text-black transition">More info</a>
            </div>
        </div>
    </section>

    <!-- Popular Destination Section -->
    <div class="max-w-6xl mx-auto py-16 px-4">
        <h2 class="text-center text-4xl font-bold text-gray-900 mb-4">Popular Destinations</h2>
        <p class="text-center text-gray-600 mb-12">Explore the most beautiful destinations hand-picked just for you.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            include 'includes/config.php';
            $sql = "SELECT * FROM tbltourpackages ORDER BY RAND() LIMIT 4";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition">
                        <img src="admin/pacakgeimages/ <?php echo htmlentities($row['PackageImage']); ?>" alt="<?php echo htmlentities($row['PackageName']); ?>" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800"><?php echo htmlentities($row['PackageName']); ?>, <?php echo htmlentities($row['PackageLocation']); ?></h3>
                            <div class="flex items-center text-gray-500 mt-2">
                                <span class="mx-2">•</span>
                                <span><?php echo htmlentities($row['PackageType']); ?></span>
                            </div>
                            <p class="text-gray-500 mt-2"><?php echo htmlentities($row['PackageFetures']); ?></p>

                            <div class="flex items-center justify-between mt-4">
                                <div class="flex text-yellow-400">
                                    <!-- Add dynamic stars based on rating here -->
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="bg-orange-700 text-white px-3 py-3 rounded-full">Price $<?php echo htmlentities($row['PackagePrice']); ?></span>
                            </div>

                            <div class="mt-4">
                                <a href="package-details.php?pkgid=<?php echo htmlentities($row['PackageId']); ?>" class="bg-green-600 text-white px-4 py-2 rounded-lg block text-center">Details</a>
                            </div>
                        </div>
                    </div>
            <?php }
            } else {
                echo "<p>No packages found.</p>";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include('includes/footer.php') ?>

    <script src="./js/script.js"></script>
</body>

</html>