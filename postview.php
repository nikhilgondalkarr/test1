
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Post</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fafafa;
    }
    .post-container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .post-header {
      padding: 15px;
      border-bottom: 1px solid #eee;
    }
    .post-content {
      padding: 15px;
    }
    .post-image {
      max-width: 778px; /* Set width to 778px */
      height: auto;
    }
    .post-title {
      font-weight: bold;
      font-size: 18px;
      margin-bottom: 10px;
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: black;
    }
    .carousel-control-prev,
    .carousel-control-next {
      width: 5%;
      color: black;
    }
    .carousel-control-prev:hover,
    .carousel-control-next:hover {
      color: black;
    }
    .share-icons {
      font-size: 24px;
    }
    .share-icons a {
      color: #333;
      margin-right: 10px;
    }
  </style>
</head>
<body>

<?php
// Establish database connection
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the post ID from the URL parameter
if(isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Fetch post details from the database based on the post ID
    $sql = "SELECT title, description, image1, image2, image3 FROM posts WHERE id = $post_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display post title
        echo '<div class="container">';
        echo '<h2 class="post-title">' . $row["title"] . '</h2>';

        // Display carousel with cover-flow-thumbs
        echo '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="1500">
                  <div class="carousel-inner">';

        // Loop through images and add them to carousel
        $images = array($row["image1"], $row["image2"], $row["image3"]);
        foreach ($images as $key => $image) {
            $active_class = ($key == 0) ? 'active' : '';
            if (!empty($image)) {
                echo '<div class="carousel-item ' . $active_class . '">
                          <img src="' . $image . '" class="d-block w-100 post-image" alt="Slide ' . ($key + 1) . '">
                      </div>';
            }
        }

        // Close carousel
        echo '</div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>';
        
        // Display post description
        echo '<div class="post-content">';
        echo '<p>' . $row["description"] . '</p>';
        echo '</div>';

        // Close container
        echo '</div>';
    } else {
        echo "Post not found";
    }
} else {
    echo "Post ID not specified";
}

// Close database connection
$conn->close();
?>












<?php  include_once('includes/share.php');  ?>







<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>
</html>













































































<br>
<br>
<br>
<br>
<br>


































<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS for the news grid */
    .container {
      max-width: 800px; /* Set maximum width for the container */
      margin: 0 auto; /* Center the container horizontally */
    }
    .news-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr); /* Displaying 2 cards per row */
      gap: 20px;
      padding: 20px;
    }
    .news-item {
      width: 100%;
      height: auto; /* Allow the height to adjust based on content */
      overflow: hidden;
      border: 1px solid #ddd;
      border-radius: 8px;
      position: relative; /* Added for title overlay */
    }
    .news-item img {
      width: 100%;
      height: 100%;
      object-fit: cover; /* Ensure the image fits perfectly */
    }
    .news-item .title-overlay {
      position: absolute;
      bottom: 0;
      width: 100%;
      background: rgba(255, 255, 255, 0.8); /* White background with transparency */
      text-align: center;
      padding: 5px;
      box-sizing: border-box;
    }
    .news-item h3 {
      font-size: 14px; /* Adjusted font size */
      margin: 0;
      color: black; /* Black text color */
    }
    .news-item a {
      color: black; /* Link color */
      text-decoration: none; /* Remove underline */
    }
    .news-item a:hover {
      text-decoration: underline; /* Underline on hover */
    }
    /* Footer styles */
    footer {
      text-align: center;
      margin-top: 20px;
    }
    .load-more-btn {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="container">
  <h1 class="text-left my-4">Recent News</h1>
  <div id="newsGrid" class="news-grid">
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

    // Function to fetch posts from the database based on the offset
    function fetchPosts($conn, $offset) {
        $sql = "SELECT * FROM posts LIMIT 6 OFFSET $offset";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="news-item">
                        <img src="' . $row["image1"] . '" alt="Post Image">
                        <div class="title-overlay">
                            <h3><a href="postview.php?id=' . $row["id"] . '">' . $row["title"] . '</a></h3>
                        </div>
                    </div>';
            }
        } else {
            echo "0 results";
        }
    }

    // Fetch the initial 6 posts
    fetchPosts($conn, 0);

    $conn->close();
    ?>
  </div>
</div>

<!-- Load More Button -->
<footer>
  <button class="load-more-btn" id="loadMoreBtn">Load More</button>
</footer>

<script>
  const loadMoreBtn = document.getElementById('loadMoreBtn');
  let currentIndex = 6; // Start index for fetching additional posts
  const itemsPerPage = 6; // 2x3 grid, so 6 items per page

  // Function to handle "Load More" button click
  function loadMore() {
    // Fetch the next set of posts
    fetch('includes/fetch_posts.php?offset=' + currentIndex)
      .then(response => response.text())
      .then(data => {
        document.getElementById('newsGrid').innerHTML += data;
        currentIndex += itemsPerPage;
      })
      .catch(error => console.error('Error:', error));
  }

  // Event listener for "Load More" button click
  loadMoreBtn.addEventListener('click', loadMore);
</script>

</body>
</html>
