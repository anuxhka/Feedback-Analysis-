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
  <title>Admin Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1, h2 {
      margin-bottom: 10px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .logo {
      max-width: 200px;
      margin-bottom: 20px;
    }
    .logo-container {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }
    .logout-container {
      display: flex;
      align-items: center;
    }

    .logout-button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      margin-right: 10px;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .main-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 70vh;
    }

    .box1 {
      width: 450px;
      height: 300px;
      border: 1px solid #ccc;
      border-radius: 10% ;
      margin-top: 10px;
      margin: 25px;
      display:grid;
      justify-content: center;
      align-items: center;
      background-color: #7C9D96;
    }
    .box1:hover{
       cursor: pointer;
    }
    .box1 h3{
      color: #DFD7BF;
    }
    .box2 {
      width: 450px;
      height: 300px;
      border: 1px solid #ccc;
      border-radius: 10% ;
      margin-top: 10px;
      margin: 25px;
      display:grid;
      justify-content: center;
      align-items: center;
      background-color: #DFD7BF;
      
    }
    .box2:hover{
       cursor: pointer;
    }
    .box2 h3{
      color: #7C9D96;
    }
    .user-wrapper{
   display: flex;
   align-items: center;
   margin-left: 43%;
   margin-bottom: 35px;
   
}

.user-wrapper img{
    border-radius: 50%;
    margin-left: 2rem;
}
.user-wrapper h4{
    margin-bottom: 0rem !important;
}
.user-wrapper small{
   display: inline-block;
   color: #8390a2;
   margin-top: -1px !important;
}
    
  </style>
  <script>
    function report(){
      window.open("report.php");
    }

    function c_feedback(){
      window.open("create_feedback.php");
    }
  </script>
</head>
<body>
  <div class="header">
    <div class="logo-container">
      <img class="logo" src="chlogo.jpg" alt="Logo">
    </div>

    <div class="logout-container">
      <button class="logout-button" id="logoutButton">Logout</button>
      <div class="dropdown">
        <button class="logout-button">Dropdown</button>
        <div class="dropdown-content">
          <a href="#">Student</a>
          <a href="#">Faculty</a>
          <a href="#">Alumni</a>
          <a href="#">Guests</a>
          <a href="#">Parents</a>
        </div>
      </div>
    </div>
     <!-- user logo name -->
     <div class="user-wrapper">
                <img src="images.jpeg" width="30px" height="30px" alt="">
                <div>
                    <h4>
                        <?php echo $_SESSION['admin_name']; ?>
                    </h4>
                    <small>Admin Name</small>
                </div>
        
      </div>
  </div>

  <div class="main-container">
  
    <div class="box1" onclick="report()">
      <!-- Content of Box 1 -->
      <h3>+ Generate Report</h3>
    </div>
    <div class="box2" onclick="c_feedback()">
      <!-- Content of Box 2 -->
       <h3>+ Create Feedback</h3>
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

    // Attach click event to the logout button
    const logoutButton = document.getElementById('logoutButton');
    logoutButton.addEventListener('click', handleLogout);
  </script>
</body>
</html>
