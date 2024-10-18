<?php

  // Database connection
  $conn= mysqli_connect("localhost", "root", "", "tms");

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>