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
    <title>Generate</title>
    <style>
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
      margin: 10px;
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
    body.dark-mode {
      background-color: #12232E;
      color: #f3f3f3;
    }

    body.dark-mode .header {
      background-color: #34495E;
      color: #f3f3f3;
    }
    body.dark-mode .dark-mode-icon {
      fill: #fff;
    }

    body.dark-mode .logout-button, body.dark-mode .dark-mode-button {
      background-color: #203140;
      color: #fff;
      border: 1px solid #fff;
    }

    .container {
        margin-top: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 10px;
        border-radius: 5px;
    }

    .input-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 10px; 
    }
    .copy-heading {
      text-align: center; 
      color: #12232E; 
    }
    body.dark-mode .copy-heading {
      color: #fff; 
    }

    .input-row {
      display: flex;
      align-items: center;
    }

    .input-container button {
        margin: 5px;
        padding: 10px 20px;
        font-size: 16px;
    }

    textarea {
    resize: vertical;
    margin: 5px;
    padding: 10px;
    width: 200px;
    height: 50px;
    font-size: 16px;
    margin-right: 10px; 
    background-color: #f3f3f3; 

  }

  select {
    padding: 5px;
    font-size: 16px;
    width: 200px;
    background-color: #f3f3f3; 
  }
    .error-message {
        color: red;
        font-size: 15px;
        margin-top: 5px;
        font-weight: bold;
    }

    .submit-button {
        margin-top: 10px;
        background-color: #12232E;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        background-color: #12232E; 
        color: white; 
    }

    .new-button {
        background-color: #203140;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }
    body.dark-mode .box {
      border-color: #fff; 
    }

    body.dark-mode .copy-heading {
      color: #fff; 
    }
    body.dark-mode select{
      color: #fff;
    }

    body.dark-mode textarea,
    body.dark-mode select,
    body.dark-mode .submit-button {
      background-color: #203140; 
    }
    textarea::placeholder,
  select option {
    color: gray; 
  }

  body.dark-mode textarea::placeholder,
  body.dark-mode select option {
    color: gray; 
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
          <div class="admin-name"> <?php echo $_SESSION['admin_name']; ?></div>
        </div>
    
        <button class="dark-mode-button" id="darkModeButton">
          <svg class="dark-mode-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 0c-6.628 0-12 5.373-12 12s5.372 12 12 12 12-5.373 12-12-5.372-12-12-12zm0 22c-5.512 0-10-4.488-10-10s4.488-10 10-10 10 4.488 10 10-4.488 10-10 10zm4-8c.733 0 1.454-.089 2.142-.259.286-.058.494-.311.494-.605v-1.272c0-.294-.208-.547-.494-.605-.688-.17-1.409-.259-2.142-.259-1.308 0-2.554.421-3.583 1.198-.329.252-.4.724-.147 1.053s.723.4 1.052.147c.646-.494 1.399-.745 2.177-.745s1.531.251 2.177.745c.329.252.801.182 1.052-.147s.182-.801-.147-1.053c-1.03-.777-2.275-1.198-3.583-1.198-1.967 0-3.744 1.275-4.349 3.168-.101.33.144.663.474.765.054.017.108.025.161.025.279 0 .542-.171.64-.452.613-2.005 2.472-3.506 4.664-3.506 2.24 0 4.115 1.53 4.637 3.584.056.31.297.537.603.575.051.006.102.009.152.009z"/>
          </svg>
        </button>
    
        <button class="logout-button" id="logoutButton">Logout</button>
      </div>
      <div class="container">
    <div class="box">
      <h2 class="copy-heading">Copy from previous year</h2>
      <div class="input-container">
        <div class="input-row">
          <textarea id="dateTextarea" placeholder="Enter year in the format 20xx-xx only"></textarea>
          <select id="dropdown">
            <option value="value1">Student</option>
            <option value="value2">Alumni</option>
            <option value="value3">Faculty</option>
            <option value="value4">Guests</option>
            <option value="value5">Parents</option>
          </select>
        </div>
        <button class="submit-button" onclick="submitForm()">Submit</button>
        <span class="error-message" id="errorMessage"></span>
      </div>
    </div>

    <div class="box">
      <button class="new-button" onclick="openNewPage()">New</button>
    </div>
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
        function copyFromPreviousYear() {
            // This function can be left empty or used for any specific functionality related to copying from previous year.
        }

        function submitForm() {
            const dateStr = document.getElementById('dateTextarea').value;
            if (validateDateFormat(dateStr)) {
                // Open aaa.html in a new tab after clicking the "Submit" button with correct date format.
                window.open('aaaa.html', '_blank');
            }
        }

        function openNewPage() {
            // Open new.php in a new tab when the "New" button is clicked.
            window.open('new.php', '_blank');
        }

        function validateDateFormat(dateStr) {
            const regex = /^(20\d{2})-(\d{2})$/;
            if (!regex.test(dateStr)) {
                document.getElementById('errorMessage').textContent = 'Invalid year format. Use 20xx-xx format.';
                return false;
            } else {
                document.getElementById('errorMessage').textContent = '';
                return true;
            }
        }
    </script>
</body>
</html>