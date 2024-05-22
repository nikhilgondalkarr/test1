<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instagram Blog Post Layout</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Your existing CSS styles */
  </style>
</head>
<body>
  <!-- Header with search bar -->
  <header class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="search.php" method="GET" class="mt-3">
          <div class="input-group">
            <input type="text" class="form-control" name="q" placeholder="Search posts">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </header>

  <!-- Main content area -->
  <div class="container mt-3">
    <div class="row">
      <?php
      // Your existing PHP code to fetch and display posts

     
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

      // Pagination logic
      $postsPerPage = 8;
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $offset = ($page - 1) * $postsPerPage;

      // Fetch total number of posts
      $totalPostsResult = $conn->query("SELECT COUNT(*) AS total FROM posts");
      $totalPostsRow = $totalPostsResult->fetch_assoc();
      $totalPosts = $totalPostsRow['total'];
      $totalPages = ceil($totalPosts / $postsPerPage);

      // Fetch posts for the current page
      $sql = "SELECT * FROM posts LIMIT $postsPerPage OFFSET $offset";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo '<div class="col-md-4">
                      <div class="post">
                          <img src="' . $row["image1"] . '" alt="Post Image">
                          <div class="post-content">
                              <h2 class="post-title">' . $row["title"] . '</h2>
                              <p class="post-description">' . $row["description"] . '</p>
                              <div class="post-meta">
                                  <span>Posted by ' . $row["posted_by"] . '</span> |
                                  <span>' . $row["category"] . '</span>
                              </div>
                              <a href="postview.php?id=' . $row["id"] . '" class="btn btn-primary read-more-btn">Read More</a>
                          </div>
                      </div>
                  </div>';
          }
      } else {
          echo "0 results";
      }
      $conn->close();
    
      ?>
    </div>
  </div>

  <!-- Pagination Section -->
  <div class="container mt-5">
    <div class="row">
      <div class="col text-center">
        <ul class="pagination" id="pagination">
          <!-- Pagination will be generated dynamically here -->
        </ul>
      </div>
    </div>
  </div>

  <script>
    // Your existing JavaScript code for pagination
  </script>
</body>
</html>
