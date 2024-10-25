<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle image upload
    if ($_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target = 'images/' . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $image = '';
    }

    $sql = "INSERT INTO achievements (title, description, image) VALUES ('$title', '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New achievement added successfully. <a href='index.php'>Go back</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
