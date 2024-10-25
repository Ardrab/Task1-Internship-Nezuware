<?php
// Assuming you have a connection in config.php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    // Insert data into your database (example)
    $query = "INSERT INTO achievements (title, description, image) VALUES ('$title', '$description', '$image')";
    
    if (mysqli_query($conn, $query)) {
        echo "Achievement added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
