<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <title>About - Zachra Bakery</title>
  <link rel="stylesheet" href="../umkmzachra/custom/zachra.css">
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  /* Body styling */
  body {
    font-family: 'Poppins', sans-serif;
    background-color: #fce4ec;
    color: #333;
    height: 100%;
    overflow-x: hidden; /* Prevent horizontal scroll */
  }

  /* Navbar styling */
  .navbar {
    background-color: #f06292; 
    padding: 10px 20px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-bottom: 2px solid #c2185b;
    border-radius: 5px;
  }

  .navbar h1 {
    color: white;
    font-size: 24px;
    font-weight: 600;
  }

  .navbar img {
    width: 100px;
    height: 50px;
  }

  /* Sidebar styling */
  .sidebar {
    width: 250px;
    background-color: #d81b60; /* Deep pink */
    color: white;
    padding-top: 20px;
    position: fixed;
    height: 100%;
    left: -250px; /* Initially hidden */
    transition: left 0.3s ease;
    z-index: 999;
  }

  .sidebar ul {
    list-style: none;
    padding-left: 0;
  }

  .sidebar ul li {
    margin: 20px 0;
  }

  .sidebar ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    padding: 10px 30px;
    display: block;
    transition: background-color 0.3s ease;
  }

  .sidebar ul li a:hover {
    background-color: #c2185b;
  }

  /* Main content */
  .main-content {
    margin-left: 250px;
    padding: 100px 10px; /* Offset content from navbar */
    display: flex;
    height: 120vh;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }

  .main-content h1 {
    font-size: 36px;
    color: #d81b60;
    font-weight: 700;
    margin-bottom: 20px;
    margin-top: 100px;
  }

  .main-content p {
    font-size: 18px;
    line-height: 1.8;
    color: #555;
    margin-bottom: 40px;
    text-align: center; /* Center the text */
    max-width: 800px;
  }

  .main-content img {
    width: 80%;
    max-width: 600px;
    border-radius: 15px;
    margin-bottom: 40px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
  }

  /* Footer styling */
  .footer {
    background-color: #d81b60;
    color: white;
    padding: 20px 0;
    text-align: center;
    position: relative;
    width: 100%;
    font-size: 16px;
    bottom: 0;
  }

  .footer p {
    margin-bottom: 5px;
  }

  .footer a {
    color: white;
    text-decoration: none;
    font-weight: bold;
  }

  /* Media Queries for responsiveness */
  @media screen and (max-width: 768px) {
    .main-content {
      margin-left: 0;
      padding-top: 120px;
    }

    /* Navbar */
    .navbar {
      padding: 10px 10px;
    }

    /* Sidebar */
    .sidebar {
      left: 0;
      position: fixed;
      z-index: 1001;
    }

    /* Adjust text size and image size on small screens */
    .main-content h1 {
      font-size: 28px;
    }

    .main-content p {
      font-size: 16px;
      padding: 0 20px;
    }

    .main-content img {
      width: 100%;
      max-width: 100%;
    }

    /* Footer */
    .footer {
      font-size: 14px;
    }
  }
</style>
<body>
  <!-- Navbar -->
  <header>
    <nav class="navbar">
      <button id="toggle-btn" class="toggle-btn">&#9776;</button>
      <h1>Zachra's Bakery</h1>
      <img src="../umkmzachra/images/Desain tanpa judul (10).png" alt="" width="100px" height="50px">
    </nav>
  </header>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <ul>
      <li><a href="index.php">Dashboard</a></li>
      <li><a href="admin.php">Data</a></li>
      <li><a href="about.php">Contact</a></li>
      <li><a href="login.php">Logout</a></li>
    </ul>
  </div>

  <!-- Main content for About -->
  <div class="main-content">
    <h1>About Zachra's Bakery</h1>
    <img src="images/download (16).jpeg" alt="Zachra Bakery Image" >
    <p>
      Zachra's Bakery was established in 2010 with a passion for baking the finest and most delicious baked goods. 
      Our journey started from a small kitchen with a dream to bring joy to people through fresh and tasty bread, cakes, and pastries. 
      Over the years, we have expanded our offerings and grown into a beloved local bakery known for its high-quality ingredients and friendly service.
    </p>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2025 Zachra's Bakery | All rights reserved</p>
    <p><strong>Contact:</strong> <br> Email: zachra@bakery.com <br> Phone: +62 123 456 789 <br> Location: Jalan Bakery No. 45, Jakarta, Indonesia</p>
  </div>

  <script>
    // Get the toggle button and sidebar elements
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    // Add an event listener to the toggle button
    toggleBtn.addEventListener('click', () => {
      // Toggle sidebar visibility by changing the left position
      if (sidebar.style.left === '-250px') {
        sidebar.style.left = '0';
        mainContent.style.marginLeft = '250px'; // Shift main content to the right
      } else {
        sidebar.style.left = '-250px';
        mainContent.style.marginLeft = '0'; // Reset main content margin
      }
    });
    mainContent.addEventListener('click', () => {
      // Toggle sidebar visibility by changing the left position
      if (sidebar.style.left === '-250px') {
        sidebar.style.left = '0';
        mainContent.style.marginLeft = '250px'; // Shift main content to the right
      } else {
        sidebar.style.left = '-250px';
        mainContent.style.marginLeft = '0'; // Reset main content margin
      }
    });
  </script>
</body>
</html>
