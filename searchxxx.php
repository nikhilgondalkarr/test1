
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer Menu with Logo Icon, Search Bar, and Menu Options</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* Custom CSS for the footer */
    .custom-footer {
      background-image: url('bbc.jpg'); /* Use a relative path from the root directory */
      background-size: cover;
      background-position: center;
      padding: 40px 0;
      color: #fff;
    }

    .custom-footer .footer-logo {
      max-width: 30px;
      margin-right: 5px;
    }
    .custom-footer .footer-icon {
      max-width: 150px;
    }
    .custom-footer ul {
      list-style: none;
      padding: 0;
      margin: 0;
      text-align: center;
    }
    .custom-footer ul li {
      display: inline-block;
      margin: 0 10px;
    }
    .custom-footer ul li a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
    }
    .custom-footer h3 {
      margin-bottom: 20px;
    }
    .custom-footer .search-form {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      margin-bottom: 20px;
      margin-right: 20px;
    }
    .custom-footer .search-form input[type="text"] {
      width: 200px;
      padding: 8px;
      border: none;
      border-radius: 20px;
      background-color: rgba(255, 255, 255, 0.5);
      color: #333;
      margin-right: 10px;
    }
    .custom-footer .search-form button {
      padding: 8px 15px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 20px;
      cursor: pointer;
    }
    .custom-footer .col-md-4 {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .custom-footer .col-md-4 ul {
      list-style: none;
      padding: 0;
      margin: 0;
      transition: transform 0.3s ease;
      transform: translateX(0);
    }
    .custom-footer .col-md-4 ul.slide-menu {
      transform: translateX(-100%);
    }
    .custom-footer .col-md-4 ul li {
      margin: 0;
    }
    .custom-footer .col-md-4 ul li img {
      max-width: 20px;
      margin-right: 5px;
    }
  </style>
</head>
<body>

  <footer class="custom-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3><img src="/path/to/your/images/active-man-thinking-avatar.png" alt="Logo Icon" class="footer-logo">Website Name</h3>
        </div>
        <div class="col-md-4">
          <form class="search-form" id="search-form">
            <input type="text" id="search-input" placeholder="Search...">
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>
        </div>
        <div class="col-md-4">
          <ul>
            <li><a href="#"><img src="home.png" alt="Home Icon"> Home</a></li>
            <li><a href="#"><img src="/path/to/your/images/about-icon.png" alt="About Icon"> About</a></li>
            <li><a href="#"><img src="/path/to/your/images/services-icon.png" alt="Services Icon"> Services</a></li>
            <li><a href="#"><img src="/path/to/your/images/contact-icon.png" alt="Contact Icon"> Contact</a></li>
            <li><a href="#"><img src="/path/to/your/images/profile-icon.png" alt="Profile Icon"> Profile</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS (optional) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const searchForm = document.getElementById('search-form');

      searchForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        const searchInput = document.getElementById('search-input').value;

        // Perform search or redirect to search page
        // You can handle search functionality here
        console.log('Searching for:', searchInput);
      });
    });
  </script>
</body>
</html>
