
<?php
// Database connection
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the offset from the request
$offset = $_GET['offset'];

// Function to fetch posts from the database based on the offset
function fetchPosts($conn, $offset) {
    $sql = "SELECT * FROM posts LIMIT 6 OFFSET $offset";
    $result = $conn->query($sql);
    $output = '';

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<div class="news-item">
                            <img src="' . $row["image1"] . '" alt="Post Image">
                            <div class="title-overlay">
                                <h3><a href="postview.php?id=' . $row["id"] . '">' . $row["title"] . '</a></h3>
                            </div>
                        </div>';
        }
    }

    return $output;
}

// Fetch posts based on the offset
echo fetchPosts($conn, $offset);

$conn->close();
?>
