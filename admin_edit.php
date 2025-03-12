<?php
include 'database/database.php';
session_start();

// Mengambil data berdasarkan ID yang di-GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];  // Jangan lupa untuk melakukan hashing untuk password yang lebih aman.

    $query = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <title>Edit Data Admin</title>
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
  left: 0;
  transition: left 0.3s ease;
}

.sidebar ul {
  list-style: none;
  padding-left: 0;
}

.sidebar ul li {
  margin: 50px 0;
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
  margin-left: 250px;
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

/* Form Styling */
form {
  margin-top: 20px;
}

form label {
  display: block;
  font-weight: bold;
  margin: 10px 0 5px;
}

form input {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
}

form button {
  background-color: #d81b60;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 18px;
  cursor: pointer;
  border-radius: 5px;
}

form button:hover {
  background-color: #c2185b;
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
  .sidebar {
    position: fixed;
    left: -250px; /* Initially hidden */
  }

  .sidebar.open {
    left: 0; /* Show when open */
  }

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

  /* Adjust table */
  table {
    margin-top: 100px; /* Add space for navbar */
  }

  th, td {
    font-size: 14px;
  }

  th {
    padding: 10px;
  }
}

/* Mobile hamburger menu for sidebar */
.toggle-btn {
  display: block;
}

  </style>
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <ul>
        <li><a href="admin.php">Data Admin</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <nav class="navbar">
        <h1>Edit Data Admin</h1>
      </nav>

      <div class="content">
        <h2>Edit Admin Data</h2>
        <form method="POST" action="">
          <label for="username">Username</label>
          <input type="text" name="username" value="<?php echo $row['username']; ?>" required>

          <label for="email">Email</label>
          <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

          <label for="password">Password</label>
          <input type="password" name="password" required>

          <button type="submit" name="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
