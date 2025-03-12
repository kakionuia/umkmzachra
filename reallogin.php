<?php
    include 'database/database.php';  // Make sure this path is correct for your database connection
    session_start();
    
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Sanitize input data to prevent XSS
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        
        // Prepare SQL query to fetch the user from the database
        $query = "SELECT id, username, password FROM users WHERE username = ?";
        
        if ($stmt = mysqli_prepare($conn, $query)) {
            // Bind the username parameter
            mysqli_stmt_bind_param($stmt, 's', $username);
            
            // Execute the query
            mysqli_stmt_execute($stmt);
            
            // Bind the result
            mysqli_stmt_bind_result($stmt, $id, $db_username, $db_password);
            
            // Fetch the result
            if (mysqli_stmt_fetch($stmt)) {
                // Check if the password is correct
                if (password_verify($password, $db_password)) {
                    // If login is successful, store user info in session
                    $_SESSION['user_id'] = $id;
                    $_SESSION['username'] = $db_username;
                    
                    // Redirect to a protected page (e.g., dashboard)
                    header("Location: index.php");
                    exit;
                } else {
                    $error_message = "Invalid username or password.";
                }
            } else {
                $error_message = "No user found with that username.";
            }
            
            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            $error_message = "Database query failed.";
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <title>Login - Zachra Bakery</title>
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
    input[type="tel"] {
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
    input[type="tel"]:focus {
      border-color: #f06292; /* Light pink */
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
  </style>
</head>
<body>
  <!-- Login Form -->
  <div class="login-container">
    <h2>Login to Zachra Bakery</h2>
    <form action="reallogin.php" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" class="input" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" class="input" required>
      </div>
      <button type="submit">Login</button>
    </form>

    <?php
      // Display error message if login failed
      if (isset($error_message)) {
          echo '<p style="color: red; text-align: center;">' . $error_message . '</p>';
      }
    ?>
  </div>

  <!-- Footer with Contact Information -->
  <div class="footer">
    <p>&copy; 2025 Zachra's Bakery | <a href="mailto:zachra@bakery.com">Contact Us</a></p>
  </div>

</body>
</html>
