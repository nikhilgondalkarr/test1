
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Circle Images</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome -->
  <style>
    .circle-container {
      position: relative;
      text-align: center;
      margin-bottom: 20px; /* Add margin bottom for gap */
      overflow-x: auto;
      white-space: nowrap;
    }
    .circle-img {
      width: 150px;
      height: 150px;
      border-radius: 50%; /* To make it circular */
      overflow: hidden; /* Hide any overflow */
      cursor: pointer; /* Change cursor to pointer on hover */
      display: inline-block;
      margin-right: 10px; /* Add margin between images */
      position: relative; /* Position relative for footer */
    }
    .circle-img img {
      width: 100%;
      height: auto;
    }
    .circle-footer {
      position: absolute;
      bottom: 5px;
      left: 0;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      padding: 2px 0;
      border-radius: 0 0 50% 50%;
      font-size: 10px; /* Adjust font size */
    }
    .whatsapp-status {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 85%; /* Set width to 200px */
      height: 80%; /* Set height to 300px */
      background-color: rgba(0, 0, 0, 0.8);
      z-index: 9999;
    }
    .status-slider {
      position: relative;
      width: 100%;
      height: 100%;
    }
    .status-slider img {
      width: 100%;
      height: 100%;
      object-fit: cover; /* Maintain aspect ratio and cover the entire space */
      border-radius: 10px;
    }
    .progress-bar-container {
      width: 100%;
      margin-top: 10px;
      background-color: #f2f2f2;
      border-radius: 10px;
    }
    .progress-bar {
      height: 10px;
      background-color: #4caf50;
      width: 0%;
      border-radius: 10px;
    }
    .close-btn {
      position: absolute;
      top: -15px;
      right: -15px;
      cursor: pointer;
      color: white;
      font-size: 20px;
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 50%;
      padding: 5px;
    }
    .close-btn:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="circle-container">
    <?php
      // Connect to your database here
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

      // Perform SQL query with ordering
      $sql = "SELECT circle_image, circle_title, image2, image3, image4 FROM status1 ORDER BY created_at DESC";
      $result = $conn->query($sql);

      // Check if query executed successfully
      if (!$result) {
          // Handle SQL error
          echo "Error: " . $sql . "<br>" . $conn->error;
      } else {
          // Check if any rows returned
          if ($result->num_rows > 0) {
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                  echo '<div class="circle-img" onclick="showWhatsAppStatus(\''.$row["image2"].'\', \''.$row["image3"].'\', \''.$row["image4"].'\')">';
                  echo '<img src="'.$row["circle_image"].'" alt="'.$row["circle_title"].'">';
                  echo '<div class="circle-footer">'.$row["circle_title"].'</div>';
                  echo '</div>';
              }
          } else {
              echo "0 results";
          }
      }

      // Close connection
      $conn->close();
    ?>
    </div>
  </div>

  <div id="whatsappStatus" class="whatsapp-status">
    <div class="status-slider">
      <img id="statusImage" src="" alt="Status Image">
      <div class="close-btn" onclick="hideWhatsAppStatus()"><i class="fas fa-times"></i></div> <!-- Font Awesome icon for close button -->
      <div class="progress-bar-container">
        <div id="progressBar" class="progress-bar"></div>
      </div>
    </div>
  </div>

  <script>
    var imagesToShow = [];
    var currentIndex = 0;
    var interval;

    function showWhatsAppStatus(image2, image3, image4) {
      imagesToShow = [image2, image3, image4];
      currentIndex = 0;
      document.getElementById('whatsappStatus').style.display = 'block';
      showNextImage();
      startProgressBar();
    }

    function hideWhatsAppStatus() {
      document.getElementById('whatsappStatus').style.display = 'none';
      resetProgressBar();
      clearInterval(interval);
    }

    function showNextImage() {
      if (currentIndex < imagesToShow.length) {
        var imageUrl = imagesToShow[currentIndex];
        document.getElementById('statusImage').src = imageUrl;
        currentIndex++;
      } else {
        hideWhatsAppStatus();
      }
    }

    function startProgressBar() {
      var progressBar = document.getElementById('progressBar');
      var width = 0;
      interval = setInterval(function() {
        if (width >= 100) {
          width = 0;
          clearInterval(interval);
          showNextImage();
          startProgressBar();
        } else {
          width += 1;
          progressBar.style.width = width + '%';
        }
      }, 50);
    }

    function resetProgressBar() {
      var progressBar = document.getElementById('progressBar');
      progressBar.style.width = '0%';
    }
  </script>
</body>
</html>
