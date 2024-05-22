
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hero Image Slider</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .hero-slider {
      position: relative;
      height: 600px; /* Set initial height */
      overflow: hidden;
    }
    .hero-slider .carousel-inner {
      height: 100%; /* Make the inner container fill the height */
    }
    .hero-slider .carousel-item {
      height: 100%; /* Make each item fill the height */
      background-size: cover; /* Cover the entire container with the background image */
      background-position: center;
    }
    .hero-slider .carousel-item::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.3);
    }
    .hero-slider .carousel-caption {
      position: absolute;
      bottom: 20px;
      left: 0;
      width: 100%;
      color: #fff;
      text-align: center;
      background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
      padding: 10px 0; /* Add padding */
    }
    .hero-slider .carousel-caption h2,
    .hero-slider .carousel-caption p {
      margin: 0;
    }
    .hero-slider .carousel-caption p {
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<div id="heroCarousel" class="carousel slide hero-slider" data-ride="carousel" data-interval="1500"> <!-- data-interval set to 1500 milliseconds for auto slide -->
  <div class="carousel-inner">
    <?php
    $connection = mysqli_connect("127.0.0.1", "root", "", "blog"); // Update with your database credentials

    if (!$connection) {
      die("Database connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM image_slider";
    $result = mysqli_query($connection, $query);
    $counter = 0;

    while ($row = mysqli_fetch_assoc($result)) {
      $active = ($counter == 0) ? 'active' : '';
      $title = $row['title'];
      $description = $row['description'];
      $image = 'uploads/' . $row['image1']; // Assuming images are stored in the uploads folder
      echo "<div class='carousel-item $active' style='background-image: url(\"$image\");'>
              <div class='carousel-caption'>
                <h2>$title</h2>
                <p>$description</p>
              </div>
            </div>";
      $counter++;
    }

    mysqli_close($connection);
    ?>
  </div>
  <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
    <i class="fas fa-chevron-left"></i> <!-- Font Awesome icon for previous -->
  </a>
  <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
    <i class="fas fa-chevron-right"></i> <!-- Font Awesome icon for next -->
  </a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
