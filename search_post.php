
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instagram Blog Post Layout</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <style>


.footer {
 
      background-image: url('l.jpg'); /* Background image URL */
      background-size: cover;
      background-position: center;
      padding: 40px 0; /* Added padding to center content */
      color: #fff; /* Text color */
    }
    .footer-logo {
      max-width: 30px;
      margin-right: 5px;
    }
    .footer-icon {
      max-width: 150px;
    }
    .footer ul {
      list-style: none;
      padding: 0;
      margin: 0;
      text-align: center;
    }
    .footer ul li {
      display: inline-block;
      margin: 0 10px;
    }
    .footer ul li a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
    }
    .footer h3 {
      margin-bottom: 20px;
    }
    .search-form {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      margin-bottom: 20px;
      margin-right: 20px;
    }
    .search-form input[type="text"] {
      width: 200px;
      padding: 8px;
      border: none;
      border-radius: 20px;
      background-color: rgba(255, 255, 255, 0.5);
      color: #333;
      margin-right: 10px;
    }
    .search-form button {
      padding: 8px 15px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 20px;
      cursor: pointer;
    }
    .footer .col-md-4 {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .footer .col-md-4 ul {
      list-style: none;
      padding: 0;
      margin: 0;
      transition: transform 0.3s ease;
      transform: translateX(0);
    }
    .footer .col-md-4 ul.slide-menu {
      transform: translateX(-100%);
    }
    .footer .col-md-4 ul li {
      margin: 0;
    }
    .footer .col-md-4 ul li img {
      max-width: 20px;
      margin-right: 5px;
    }



















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
    .search-form {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      margin-bottom: 20px;
      margin-right: 20px;
    }
    .search-form input[type="text"] {
      width: 200px;
      padding: 8px;
      border: none;
      border-radius: 20px;
      background-color: rgba(255, 255, 255, 0.5);
      color: #333;
      margin-right: 10px;
    }
    .search-form button {
      padding: 8px 15px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 20px;
      cursor: pointer;
    }
  </style>
</head>
<body>
<footer class="footer">
    <div class="container">
      <div class="row">
      
      </div>
    </div>
  </footer>

    <!-- Blog Posts Container -->
    <div class="row" id="posts-container">
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    // AJAX search functionality
    $(document).ready(function() {
      $('#search-form').on('submit', function(event) {
        event.preventDefault();
        var searchQuery = $('#search-input').val();

        $.ajax({
          url: 'search.php',
          type: 'GET',
          data: { search: searchQuery },
          dataType: 'json',
          success: function(data) {
            $('#posts-container').empty(); // Clear previous posts
            if (data.length > 0) {
              data.forEach(function(post) {
                var postHTML = '<div class="col-md-4">' +
                               '<div class="post">' +
                               '<img src="' + post.image1 + '" alt="Post Image">' +
                               '<div class="post-content">' +
                               '<h2 class="post-title">' + post.title + '</h2>' +
                               '<p class="post-description">' + post.description + '</p>' +
                               '<div class="post-meta">' +
                               '<span>Posted by ' + post.posted_by + '</span> | ' +
                               '<span>' + post.category + '</span>' +
                               '</div>' +
                               '<a href="postview.php?id=' + post.id + '" class="btn btn-primary read-more-btn">Read More</a>' +
                               '</div>' +
                               '</div>' +
                               '</div>';
                $('#posts-container').append(postHTML);
              });
            } else {
              $('#posts-container').html('<p>No posts found</p>');
            }
          }
        });
      });
    });
  </script>
</body>
</html>