
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .contact-list {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .contact-item {
      display: flex;
      align-items: center;
      padding: 15px;
      border-bottom: 1px solid #eeeeee;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .contact-item:hover {
      background-color: #f1f1f1;
    }
    .contact-avatar img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 15px;
    }
    .contact-info {
      flex-grow: 1;
    }
    .contact-info h5 {
      margin: 0;
      font-size: 16px;
      font-weight: bold;
    }
    .filter {
      margin-bottom: 20px;
    }
    /* Custom styling for the dropdown filter */
    .dropdown:hover .dropdown-menu {
      display: block;
    }
    .dropdown-menu {
      margin-top: 0;
      border: none;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    }
    .dropdown-item:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="filter dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      All Categories
    </button>
    <div class="dropdown-menu" aria-labelledby="categoryFilter">
      <!-- Categories will be loaded here -->
    </div>
  </div>
  <div class="contact-list" id="contactList">
    <!-- Contacts will be loaded here -->
  </div>
</div>

<script>
  function showContactInfo(id) {
    window.location.href = `details.html?id=${id}`;
  }

  // Fetch categories and populate the dropdown
  fetch('fetch_categories.php')
    .then(response => response.json())
    .then(data => {
      const categoryDropdown = document.querySelector('.dropdown-menu');
      const allOption = document.createElement('a');
      allOption.classList.add('dropdown-item');
      allOption.href = '#';
      allOption.textContent = 'All Categories';
      allOption.addEventListener('click', (event) => {
        event.preventDefault();
        document.getElementById('categoryFilter').innerText = 'All Categories';
        fetchContacts();
      });
      categoryDropdown.appendChild(allOption);
      data.forEach(category => {
        const option = document.createElement('a');
        option.classList.add('dropdown-item');
        option.href = '#';
        option.textContent = category;
        option.addEventListener('click', (event) => {
          event.preventDefault();
          document.getElementById('categoryFilter').innerText = category;
          fetchContacts(category);
        });
        categoryDropdown.appendChild(option);
      });
    });

  // Fetch contacts and display them
  function fetchContacts(category = 'all') {
    fetch('fetch_contacts.php')
      .then(response => response.json())
      .then(data => {
        const contactList = document.getElementById('contactList');
        contactList.innerHTML = '';
        data.forEach(contact => {
          if (category === 'all' || contact.category === category) {
            const contactItem = document.createElement('div');
            contactItem.className = 'contact-item';
            contactItem.onclick = () => showContactInfo(contact.id);
            contactItem.innerHTML = `
              <div class="contact-avatar"><img src="${contact.image}" alt="${contact.name}"></div>
              <div class="contact-info">
                <h5>${contact.name}</h5>
                <p>${contact.phone} <i class="bi bi-telephone-fill"></i></p>
               
                <p>Category: ${contact.category}</p>
              </div>
            `;
            contactList.appendChild(contactItem);
          }
        });
      });
  }

  // Initial fetch for all contacts
  fetchContacts();
</script>

</body>
</html>
