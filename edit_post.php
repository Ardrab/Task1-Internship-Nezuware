<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM achievements WHERE id=$id";
    $result = $conn->query($sql);
    $achievement = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle image upload if new image is provided
    if ($_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target = 'images/' . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $image = $achievement['image']; // keep existing image
    }

    $sql = "UPDATE achievements SET title='$title', description='$description', image='$image' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Achievement updated successfully. <a href='index.php'>Go back</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Achievement</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Edit Achievement</h1>
    </header>

    <main>
        <form action="edit_post.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($achievement['title']); ?>" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo htmlspecialchars($achievement['description']); ?></textarea>
            <label for="image">Upload New Image (optional):</label>
            <input type="file" id="image" name="image">
            <img src="images/<?php echo htmlspecialchars($achievement['image']); ?>" alt="Achievement Image" style="max-width: 200px;">
            <button type="submit" name="update">Update Achievement</button>
        </form>
    </main>
</body>
</html>
