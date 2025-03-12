<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="../umkmzachra/custom/zachra.css">

</head>
<body>
  <header>
    <nav class="navbar">
      <button id="toggle-btn" class="toggle-btn">&#9776;</button>
      <h1>Zachra's Bakery</h1>
      <img src="../umkmzachra/images/Desain tanpa judul (10).png" alt="Zachra Bakery Logo" width="100px" height="50px">
    </nav>
  </header>

  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
      <ul>
        <li><a href="about.php">About</a></li>
        <li><a href="admin.php">Data</a></li>
        <li><a href="about.php">Contact</a></li>
        <li><a href="login.php">Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="jumbotron">
        <div class="main-text">
          <h1>Welcome to Zachra Bakery</h1>
          <p>Selamat datang, mau pesan roti apa saja? Kami ada!</p>
          <button>Order & Browse</button>
        </div>
      </div>

      <!-- Menu Cards Section -->
      <div class="menu-cards">
        <div class="card">
          <img src="images/Jelly cat fall dessert _3.jpeg" alt="Menu Item 1">
          <h2>Roti Coklat</h2>
          <p>Roti lezat dengan coklat manis yang melimpah.</p>
          <button>Order Now</button>
        </div>
        <div class="card">
          <img src="images/Korean Cream Cheese Garlic Bread.jpeg" alt="Menu Item 2">
          <h2>Roti Keju</h2>
          <p>Roti gurih dengan keju yang meleleh di dalamnya.</p>
          <button>Order Now</button>
        </div>
        <div class="card">
          <img src="images/Japan now has cat-shaped bread and we need to move there immediately.jpeg" alt="Menu Item 3">
          <h2>Roti Tawar</h2>
          <p>Roti lembut dan kenyal, cocok untuk sarapan.</p>
          <button>Order Now</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2025 Zachra's Bakery. All rights reserved.</p>
  </footer>

  <script>
    // Get the toggle button and sidebar elements
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    // Add an event listener to the toggle button
    toggleBtn.addEventListener('click', () => {
      if (sidebar.style.left === '0px') {
        sidebar.style.left = '-250px';
        mainContent.style.marginLeft = '0';
      } else {
        sidebar.style.left = '0';
        mainContent.style.marginLeft = '250px';
      }
    });
  </script>
</body>
</html>
