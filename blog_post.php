


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instagram Blog Post Layout</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .pagination {
      justify-content: center;
      margin-top: 20px; /* Add margin top for spacing */
    }
    .post {
      border: 1px solid #ccc;
      margin-bottom: 20px;
      border-radius: 5px;
      max-width: 300px;
    }
    .post img {
      width: 100%;
      height: auto;
      border-radius: 5px 5px 0 0;
      max-width: 300px;
      max-height: 350px;
      object-fit: cover;
    }
    .post-content {
      padding: 15px;
    }
    .post-title {
      font-size: 1.2rem;
      margin-bottom: 5px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .post-description {
      font-size: 1rem;
      line-height: 1.5;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
    .post-meta {
      margin-top: 10px;
      font-size: 0.9rem;
      color: #666;
    }
    .read-more-btn {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
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



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  
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
    var currentPage = <?php echo $page; ?>;
    var totalPages = <?php echo $totalPages; ?>;

    // Function to generate pagination
    function generatePagination() {
      var paginationHTML = '';

      // Show Previous button if currentPage is not the first page
      if (currentPage > 1) {
        paginationHTML += '<li class="page-item"><a class="page-link" href="?page=' + (currentPage - 1) + '">Previous</a></li>';
      }

      // Show page numbers
      for (var i = 1; i <= totalPages; i++) {
        if (i === currentPage) {
          paginationHTML += '<li class="page-item active"><a class="page-link" href="?page=' + i + '">' + i + '</a></li>';
        } else {
          paginationHTML += '<li class="page-item"><a class="page-link" href="?page=' + i + '">' + i + '</a></li>';
        }
      }

      // Show Next button if currentPage is not the last page
      if (currentPage < totalPages) {
        paginationHTML += '<li class="page-item"><a class="page-link" href="?page=' + (currentPage + 1) + '">Next</a></li>';
      }

      document.getElementById('pagination').innerHTML = paginationHTML;
    }

    // Generate initial pagination
    generatePagination();
  </script>
</body>
</html>
<br>
<br>
<br>
<br>
