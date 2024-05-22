<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Responsive Article Card Slider</title>
<!-- Add Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Add Hammer.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
<style>
  /* Basic styles */
  .card-container {
    position: relative;
    width: 100%;
    overflow: hidden;
  }

  .card-slider {
    display: flex;
    transition: transform 0.5s;
  }

  .card {
    flex: 0 0 auto;
    width: 200px;
    height: 250px; /* Increased height to accommodate title and description */
    margin: 20px;
    cursor: pointer;
    overflow: hidden;
  }

  .card-inner {
    position: absolute;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.5s;
    transform-style: preserve-3d;
  }

  .card-front,
  .card-back {
    width: 100%;
    height: 100%;
    position: absolute;
    backface-visibility: hidden;
  }

  .card-front {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }

  .card-back {
    transform: rotateY(180deg);
    background-color: #f0f0f0;
    padding: 20px;
  }

  .card:hover .card-inner {
    transform: rotateY(180deg);
  }

  .card-back .read-more {
    display: block;
    margin-top: 20px;
    text-decoration: none;
    color: #007bff;
  }

  /* Navigation arrows */
  .prev,
  .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(255, 255, 255, 0.5);
    border: none;
    color: black;
    padding: 10px;
    cursor: pointer;
    z-index: 1;
  }

  .prev {
    left: 0;
  }

  .next {
    right: 0;
  }

  /* Pagination */
  .pagination {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1;
  }

  .dot {
    height: 10px;
    width: 10px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    margin: 0 5px;
    transition: background-color 0.3s;
  }

  .active {
    background-color: #717171;
  }

  /* Hide scrollbar in Chrome, Safari, and Opera */
  .card-container::-webkit-scrollbar {
    display: none;
  }
</style>
</head>
<body>

<div class="card-container">
  <button class="prev" onclick="moveSlider(-1)">❮</button>
  <div class="card-slider">
    <!-- PHP code to fetch data from database and populate cards -->
    <?php
    // Connect to your database
    $conn = mysqli_connect("127.0.0.1", "root", "", "blog");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from the database
    $sql = "SELECT title, description, image1 FROM posts LIMIT 8";
    $result = mysqli_query($conn, $sql);

    // Check if there are any posts
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card">';
        echo '<div class="card-inner">';
        echo '<div class="card-front" style="background-image: url(\'' . $row["image1"] . '\'); background-size: cover;"></div>';
        echo '<div class="card-back">';
        echo '<h3>' . $row["title"] . '</h3>';
        echo '<p>' . $row["description"] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      // Add the last card with read more option and background image on the back
      echo '<div class="card">';
      echo '<div class="card-inner">';
      echo '<div class="card-front" style="background-image: url(\'bbc.jpg\'); background-size: cover;"></div>';
      echo '<div class="card-back" style="background-image: url(\'IMG20191231183725.jpg\'); background-size: cover; color: white;">';
      echo '<h3>Special Post</h3>';
      echo '<p>Click the link below to read more about this special post.</p>';
      echo '<a class="read-more" href="flip_posts.php">Read More</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    } else {
      echo "0 results";
    }

    mysqli_close($conn);
    ?>
    <!-- End of PHP code -->
  </div>
  <button class="next" onclick="moveSlider(1)">❯</button>
  <div class="pagination"></div>
</div>

<!-- Add Hammer.js initialization script -->
<script>
  var currentIndex = 0;
  var slides = document.querySelectorAll('.card-slider .card');
  var totalSlides = slides.length;

  function moveSlider(direction) {
    currentIndex += direction;
    if (currentIndex < 0) {
      currentIndex = totalSlides - 1;
    } else if (currentIndex >= totalSlides) {
      currentIndex = 0;
    }
    updateSlider();
  }

  function updateSlider() {
    var slider = document.querySelector('.card-slider');
    slider.style.transform = 'translateX(' + (-currentIndex * 240) + 'px)'; // Adjust the slide width as needed

    // Update pagination
    var pagination = document.querySelector('.pagination');
    pagination.innerHTML = '';
    for (var i = 0; i < totalSlides; i++) {
      var dot = document.createElement('span');
      dot.classList.add('dot');
      if (i === currentIndex) {
        dot.classList.add('active');
      }
      pagination.appendChild(dot);
    }
  }

  updateSlider(); // Initialize slider
</script>

</body>
</html>
