<?php 
include 'database/database.php';
session_start();

// Mengambil data admin dari database
$query = "SELECT * FROM users";  // Ganti 'users' dengan tabel Anda
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="custom/zachra.css">
  <title>Halaman Admin</title>
  <style>
    /* Reset margin and padding */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Body styling */
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fce4ec; /* Pink background */
      color: #333;
      height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Container */
    .container {
      display: flex;
      flex: 1;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #d81b60; /* Deep pink */
      color: white;
      padding-top: 20px;
      position: fixed;
      height: 100%;
      left: -250px; /* Initially hidden */
      transition: left 0.3s ease;
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
      padding: 10px 20px;
      display: block;
      transition: background-color 0.3s ease;
    }

    .sidebar ul li a:hover {
      background-color: #c2185b;
    }

    /* Main content area */
    .main-content {
      flex: 1;
      padding: 20px;
      margin-left: 0;
      transition: margin-left 0.3s ease;
      margin-top: 80px;
      max-width: 100%;
    }

    /* Navbar with padding, shadow, and elegant style */
    .navbar {
      background-color: #f06292; /* Light pink */
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
      margin-top: 0;
    }

    .navbar h1 {
      color: white;
      font-size: 24px;
      font-weight: 600;
    }

    /* Button for adding new data */
    .add-button {
      background-color: #d81b60;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 5px;
      margin-bottom: 20px; /* Space between button and table */
      text-decoration: none;
      display: inline-block;
    }

    .add-button:hover {
      background-color: #c2185b;
    }

    /* Table Styling */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px; /* Add space between button and table */
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #d81b60;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    /* Footer */
    .footer {
      background-color: #d81b60;
      color: white;
      text-align: center;
      padding: 10px;
      position: fixed;
      width: 100%;
      bottom: 0;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
      /* Sidebar */
      .sidebar {
        position: fixed;
        left: -250px; /* Initially hidden */
      }

      .sidebar.open {
        left: 0; /* Show when open */
      }

      /* Main Content */
      .main-content {
        margin-left: 0;
        margin-top: 80px; /* Add space for the navbar */
      }

      .navbar h1 {
        font-size: 20px;
      }

      .sidebar ul li a {
        font-size: 16px;
      }

      /* Button */
      .add-button {
        width: 100%;
        text-align: center;
      }

      /* Make the navbar button for opening the sidebar visible */
      .navbar button {
        display: block;
        background-color: transparent;
        border: none;
        color: white;
        font-size: 30px;
      }
      table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
  }

  th, td {
    min-width: 120px; /* Minimum width for better readability */
  }

    }

    /* Mobile hamburger menu for sidebar */
    .toggle-btn {
      display: none;
    }


    nav .nav-links .nav-items{
      display: none;
    }

    @media screen and (min-width: 768px) {
       .nav-links .nav-items {
        list-style: none
      }

      nav .nav-links .nav-items {
        display: inline-flex;
        position: relative;
        bottom: 100px;
      }

     .nav-links .nav-items a{
      padding: 10px;
      color: white;
      text-decoration: none;
    }

    /* Link Edit dan Delete */
table td a {
  text-decoration: none;
  padding: 5px 10px;
  border-radius: 5px;
}

table td a:hover {
  opacity: 0.8; /* Efek hover untuk memperjelas */
}

table td a:first-child { /* Edit link */
  color: green;
}

table td a:last-child { /* Delete link */
  color: red;
}

    }
  </style>
</head>
<body>
<header>
    <nav class="navbar">
      <button id="toggle-btn" class="toggle-btn">&#9776;</button>
      <h1>Zachra's Bakery</h1>
      <ul class="nav-links">
      <li class="nav-items"><a href="index.php">Dashboard</a></li>
      <li class="nav-items"><a href="about.php">About</a></li>
      <li class="nav-items"><a href="about.php">Contact</a></li>
      </ul>
      <img src="../umkmzachra/images/Desain tanpa judul (10).png" alt="" width="100px" height="50px">
    </nav>
</header>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <ul>
    <li><a href="index.php">Dashboard</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="about.php">Contact</a></li>
  </ul>
</div>

<div class="container">
  <!-- Add button to go to add data page -->
  <div class="main-content">
    <a href="login.php" class="add-button">Tambah Data Pengguna</a> <!-- Link to the add data page -->

    <!-- Table for Data Admin -->
    <h2>List Pengguna</h2>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Inisialisasi nomor urut
        $no = 1;

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>"; // Menampilkan nomor urut
            echo "<td>" . $row['id'] . "</td>"; // Menampilkan ID
            echo "<td>" . htmlspecialchars($row['username']) . "</td>"; // Menampilkan username
            echo "<td>" . htmlspecialchars($row['email']) . "</td>"; // Menampilkan email
            echo "<td>" . htmlspecialchars($row['password']) . "</td>"; // Menampilkan password
            echo "<td>";
            echo "<a href='admin_edit.php?id=" . $row['id'] . "'>Edit</a> | "; // Tautan untuk mengedit
            echo "<a href='admin_delete.php?id=" . $row['id'] . "'>Delete</a>"; // Tautan untuk menghapus
            echo "</td>";
            echo "</tr>";
          }
        } else {
          // Jika tidak ada data ditemukan
          echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Footer -->
<div class="footer">
  <p>&copy; 2025 Zachra's Bakery | <a href="mailto:zachra@bakery.com" style="color:white; text-decoration: none;">Contact Us</a></p>
</div>

<script>
  // Get the toggle button and sidebar elements
  const toggleBtn = document.getElementById('toggle-btn');
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.querySelector('.main-content');

  // Add an event listener to the toggle button
  toggleBtn.addEventListener('click', () => {
    // Toggle sidebar visibility by adding/removing the 'open' class
    sidebar.classList.toggle('open');
  });
</script>

</body>
</html>
