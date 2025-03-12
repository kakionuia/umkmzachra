<?php 
    include 'database/database.php';  // Make sure this path is correct for your database connection
    session_start();
    
    if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        // Sanitize input data to avoid XSS and other attacks
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format");
        }

        // Hash password for secure storage
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Prepare SQL query with prepared statements to avoid SQL injection
        $query = "INSERT INTO users (id, username, email, password) VALUES (?, ?, ?, ?)";
        
        // Use prepared statements with parameterized queries
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, 'isss', $id, $username, $email, $hashedPassword);
            
            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo "User registered successfully!";
                header("Location: reallogin.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing query: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <title>Login - Zachra Bakery</title>
  <link rel="stylesheet" href="../umkmzachra/custom/zachra.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fce4ec;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      overflow: hidden;
    }

    .login-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      animation: fadeIn 1s ease-out;
      margin-bottom: 60px;
    }

    h2 {
      text-align: center;
      font-size: 30px;
      margin-bottom: 20px;
      color: #d81b60;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-size: 14px;
      color: #555;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
      outline: none;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="email"]:focus,
    input[type="number"]:focus {
      border-color: none; /* Light pink */
    }

    button {
      width: 100%;
      padding: 15px;
      background-color: #d81b60; /* Deep pink */
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 18px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #c2185b; /* Darker pink */
    }

    .footer {
      position: absolute;
      bottom: 0;
      color: #fff;
      font-size: 14px;
    }

    .footer a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
      .login-container {
        width: 90%;
        padding: 30px;
      }

      h2 {
        font-size: 26px;
      }

      input[type="text"],
      input[type="password"],
      input[type="email"],
      input[type="number"] {
        font-size: 14px;
      }

      button {
        font-size: 16px;
      }
    }

    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <!-- Login Form -->
  <div class="login-container">
    <h2>Register to Zachra Bakery</h2>
    <form action="login.php" method="post">
      <div class="form-group">     
        <input type="number" id="id" name="id" placeholder="Enter your ID" class="input hidden">
      </div> 

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" class="input" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" class="input" required>
      </div>
     
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" class="input" required>
      </div>
      <label for="sign in">Sudah memiliki akun? <a style="text-decoration: none;" href="reallogin.php">klik disini</a></label>
      <button type="submit">Login</button>
    </form>
  </div>

  <!-- Footer with Contact Information -->
  <div class="footer">
    <p>&copy; 2025 Zachra's Bakery | <a href="mailto:zachra@bakery.com">Contact Us</a></p>
  </div>

</body>
</html>
