<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Feedback</title>
  <style>
    /* Shared styles for both light and dark modes */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f3f3f3;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 20px;
      background-color: #12232E;
      padding: 10px;
      border-radius: 5px;
      color: #fff;
    }

    .logo {
      max-width: 150px;
      margin-bottom: 10px;
    }

    .user-info {
      display: flex;
      align-items: center;
    }

    .user-pic {
      max-width: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .admin-name {
      font-size: 16px;
      font-weight: bold;
      color: #fff;
    }

    .logout-button, .dark-mode-button {
      padding: 10px 20px;
      background-color: #155983;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      font-size: 14px;
      height: 40px;
    }

    .dark-mode-button {
      margin-left: 700px;

    }

    .dark-mode-button:hover, .logout-button:hover {
      transform: scale(1.05);
    }

    .dark-mode-icon {
      width: 24px;
      height: 24px;
      fill: #fff;
      transition: fill 0.3s;
    }

    .main-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      align-items: center;
      margin-top: 30px;
    }

    .box {
      width: 500px;
      height: 250px;
      margin: 10px;
      margin-top: 109px;
      margin-bottom: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: rgb(66, 67, 74);
      border: 1px solid #155983;
      color: white;
      border-radius: 15px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
      cursor: pointer;
    }

    .box:hover {
      transform: scale(1.05);
    }

    .box-content {
      color: white;
      font-size: 24px;
      font-weight: bold;
    }

    /* Dark mode styles */
    body.dark-mode {
      background-color: #12232E;
      color: #f3f3f3;
    }

    body.dark-mode .header {
      background-color: #34495E;
      color: #f3f3f3;
    }

    body.dark-mode .box {
      background-color: #34495E;
      border-color: #34495E;
    }

    body.dark-mode .box-content {
      color: #f3f3f3;
    }

    body.dark-mode .dark-mode-icon {
      fill: #fff;
    }

    body.dark-mode .logout-button, body.dark-mode .dark-mode-button {
      background-color: #155983;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="logo-container">
      <img class="logo" src="chlogo.jpg" alt="Company Logo">
    </div>

    <div class="user-info">
      <img class="user-pic" src="images.jpeg" alt="User Pic">
      <div class="admin-name"><?php echo $_SESSION['admin_name']; ?></div>
    </div>

    <button class="dark-mode-button" id="darkModeButton">
      <svg class="dark-mode-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 0c-6.628 0-12 5.373-12 12s5.372 12 12 12 12-5.373 12-12-5.372-12-12-12zm0 22c-5.512 0-10-4.488-10-10s4.488-10 10-10 10 4.488 10 10-4.488 10-10 10zm4-8c.733 0 1.454-.089 2.142-.259.286-.058.494-.311.494-.605v-1.272c0-.294-.208-.547-.494-.605-.688-.17-1.409-.259-2.142-.259-1.308 0-2.554.421-3.583 1.198-.329.252-.4.724-.147 1.053s.723.4 1.052.147c.646-.494 1.399-.745 2.177-.745s1.531.251 2.177.745c.329.252.801.182 1.052-.147s.182-.801-.147-1.053c-1.03-.777-2.275-1.198-3.583-1.198-1.967 0-3.744 1.275-4.349 3.168-.101.33.144.663.474.765.054.017.108.025.161.025.279 0 .542-.171.64-.452.613-2.005 2.472-3.506 4.664-3.506 2.24 0 4.115 1.53 4.637 3.584.056.31.297.537.603.575.051.006.102.009.152.009z"/>
      </svg>
    </button>

    <button class="logout-button" id="logoutButton">Logout</button>
  </div>

  <div class="main-container">
    <form action="view.php" method="post">
      <div class="box">
        <!-- Box 1 -->
        <div class="box-content">View</div>
      </div>
    </form>
    <form action="generate.php" method="post">
      <div class="box" id="generate">
        <!-- Box 2 -->
        <div class="box-content">Generate</div>
      </div>
    </form>
  </div>
  <script>
    // Function to handle logout confirmation
    function handleLogout() {
      const confirmation = confirm('Are you sure you want to logout?');

      if (confirmation) {
        // Redirect to the login.php page on logout
        window.location.href = 'login.php';
      }
    }

    // Function to toggle dark mode
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
    }

    // Attach click event to the logout button
    const logoutButton = document.getElementById('logoutButton');
    logoutButton.addEventListener('click', handleLogout);

    // Attach click event to the dark mode button
    const darkModeButton = document.getElementById('darkModeButton');
    darkModeButton.addEventListener('click', toggleDarkMode);

    function generate() {

    window.location.href = 'generate.php';

    }
    // Attach click event to the logout button
  const  gen= document.getElementById('generate');
  gen.addEventListener('click', generate);
  
  </script>
</body>
</html>