
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
