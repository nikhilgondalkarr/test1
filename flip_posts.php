
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
    height: 100vh;
    overflow-y: scroll;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .card-slider {
    display: flex;
    flex-wrap: wrap;
  }

  .card {
    flex: 0 0 auto;
    width: 150px;
    height: 150px;
    margin: 10px;
    cursor: pointer;
    perspective: 1000px;
  }

  .card-inner {
    position: relative;
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
    transform: rotateX(180deg);
    background-color: #f0f0f0;
    padding: 20px;
    box-sizing: border-box; /* Ensure padding doesn't increase size */
  }

  .card:hover .card-inner {
    transform: rotateX(180deg);
  }

  /* Enlarged card styles */
  .overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 10;
  }

  .overlay .card {
    width: 300px;
    height: 400px;
  }

  .overlay .card .card-back {
    padding: 40px;
  }

  .overlay .close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #fff;
    border: none;
    cursor: pointer;
    padding: 5px 10px;
  }

  .overlay.active {
    display: flex;
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
</style>
</head>
<body>

<div class="card-container">
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
    $sql = "SELECT title, description, image1 FROM posts LIMIT 25";
    $result = mysqli_query($conn, $sql);

    // Check if there are any posts
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card" onclick="enlargeCard(this)">';
        echo '<div class="card-inner">';
        echo '<div class="card-front" style="background-image: url(\'' . $row["image1"] . '\'); background-size: cover;"></div>';
        echo '<div class="card-back">';
        echo '<h5>' . $row["title"] . '</h5>'; // Reduced size for title
        echo '<p>' . $row["description"] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo "0 results";
    }

    mysqli_close($conn);
    ?>
    <!-- End of PHP code -->
  </div>
</div>

<div class="overlay" id="overlay">
  <button class="close-btn" onclick="closeOverlay()">Close</button>
  <div class="card">
    <div class="card-inner">
      <div class="card-front"></div>
      <div class="card-back"></div>
    </div>
  </div>
</div>

<script>
  function enlargeCard(card) {
    var overlay = document.getElementById('overlay');
    var overlayCard = overlay.querySelector('.card');
    var cardFront = overlayCard.querySelector('.card-front');
    var cardBack = overlayCard.querySelector('.card-back');

    cardFront.style.backgroundImage = card.querySelector('.card-front').style.backgroundImage;
    cardBack.innerHTML = card.querySelector('.card-back').innerHTML;

    overlay.classList.add('active');
  }

  function closeOverlay() {
    var overlay = document.getElementById('overlay');
    overlay.classList.remove('active');
  }
</script>

</body>
</html>
