
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instagram Categories</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous">
  <style>
    /* Custom CSS */
    .category-buttons {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: -10px;
      margin-right: -10px;
      overflow: hidden; /* Added for Instagram-like effect */
      position: relative; /* Added for Instagram-like effect */
    }
    .category-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
      margin-bottom: 10px;
      height: 50px;
      width: calc(50% - 10px); /* 2x2 grid with margin */
      position: relative; 
      overflow: hidden; 
      background-color: #128277; /* Blue color */
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
      font-size: 1.1rem;
      color: #fff; /* Text color */
      border-radius: 5px;
    }
    .category-btn:hover {
      background-color: #128277; /* Darker shade of blue on hover */
    }
    .category-btn i {
      margin-right: 5px;
    }
    .category-btn.active {
      background-color: #128277; /* Darker shade of blue for active state */
    }
    .category-btn::before { 
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 300%;
      height: 300%;
      background-color: rgba(255, 255, 255, 0.3); 
      transition: all 0.3s; 
      border-radius: 50%; 
      transform: translate(-50%, -50%) scale(0); 
    }
    .category-btn:hover::before { 
      transform: translate(-50%, -50%) scale(1); 
    }
  </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Select a Category</h2>
                <div class="category-buttons" id="categories">
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

                    // Fetch categories from the posts table
                    $sql = "SELECT DISTINCT category FROM posts";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output buttons for each category
                        while($row = $result->fetch_assoc()) {
                            echo '<button class="category-btn" onclick="showCategoryPosts(\''.$row['category'].'\')"><i class="fas fa-tag"></i>'.$row['category'].'</button>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript function for showing posts of a category -->
    <script>
        function showCategoryPosts(category) {
            window.location.href = "category_view.php?category=" + category;
        }
    </script>
</body>
</html>
