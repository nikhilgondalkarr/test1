
<?php
// Connect to your database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the category from the URL parameter
$category = $_GET['category'];

// Fetch the first post in the selected category from the database
$sql_first = "SELECT id, title, image1, description FROM posts WHERE category = ? ORDER BY id ASC LIMIT 1";
$stmt_first = $conn->prepare($sql_first);
$stmt_first->bind_param("s", $category);
$stmt_first->execute();
$result_first = $stmt_first->get_result();
$first_post = $result_first->fetch_assoc();

// Fetch the last post in the selected category from the database
$sql_last = "SELECT id, title, image1, description FROM posts WHERE category = ? ORDER BY id DESC LIMIT 1";
$stmt_last = $conn->prepare($sql_last);
$stmt_last->bind_param("s", $category);
$stmt_last->execute();
$result_last = $stmt_last->get_result();
$last_post = $result_last->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Blog Post Layout</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .post {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            border-radius: 5px;
            max-width: 300px; /* Set max width of card */
        }
        .post img {
            width: 100%;
            height: auto;
            border-radius: 5px 5px 0 0;
            max-width: 300px; /* Set max width of image */
            max-height: 350px; /* Set max height of image */
            object-fit: cover; /* Maintain aspect ratio */
        }
        .post-content {
            padding: 15px;
        }
        .post-content h2 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .post-content p {
            font-size: 1rem;
            line-height: 1.5;
        }
        .post-meta {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #666;
        }
        .read-more-btn {
            margin-top: 10px;
        }

        /* Additional Styles from Provided CSS */
        .post-content {
            padding: 15px;
            overflow: hidden;
        }
        .post-title {
            font-size: 1.2rem;
            margin-bottom: 5px;
            /* Add ellipsis for long titles */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .post-description {
            font-size: 1rem;
            line-height: 1.5;
            /* Add ellipsis for long descriptions */
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Limit to two lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body>

<h2><?php echo htmlspecialchars($category); ?> Posts</h2>

<div class="container">
    <div class="row">
        <?php 
        // Display the first post
        if ($first_post) {
            echo '<div class="col-md-4">
                    <div class="post">
                        <img src="' . htmlspecialchars($first_post["image1"]) . '" alt="Post Image">
                        <div class="post-content">
                            <h2 class="post-title">' . htmlspecialchars($first_post["title"]) . '</h2>
                            <p class="post-description">' . htmlspecialchars($first_post["description"]) . '</p>
                            <a href="postview.php?id=' . htmlspecialchars($first_post["id"]) . '" class="btn btn-primary read-more-btn">Read More</a>
                        </div>
                    </div>
                </div>';
        }
        
        // Display the last post
        if ($last_post && $last_post["id"] !== $first_post["id"]) {
            echo '<div class="col-md-4">
                    <div class="post">
                        <img src="' . htmlspecialchars($last_post["image1"]) . '" alt="Post Image">
                        <div class="post-content">
                            <h2 class="post-title">' . htmlspecialchars($last_post["title"]) . '</h2>
                            <p class="post-description">' . htmlspecialchars($last_post["description"]) . '</p>
                            <a href="postview.php?id=' . htmlspecialchars($last_post["id"]) . '" class="btn btn-primary read-more-btn">Read More</a>
                        </div>
                    </div>
                </div>';
        }
        ?>
    </div>
</div>

</body>
</html>

<?php
$stmt_first->close();
$stmt_last->close();
$conn->close();
?>
