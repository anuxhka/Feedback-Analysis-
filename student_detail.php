<?php

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}
@include 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Student Details</title>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


  <style>
     h1, h2 {
      margin-bottom: 10px;
    }

    form {
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 5px;
      background-color: #f9f9f9;
    }
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
      width: 1430px;
      height: 70px;
    }

    .logo {
      max-width: 200px;
      margin-top: 1px;
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
      margin-left: 680px;
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


    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .table-container {
      margin: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      height: 40px;
      border: 1px solid #000;
    }

    th {
        background-color: #34495E;
        color: #f3f3f3;
    }

    th:first-child {
      width: 15px; 
    }

    th:nth-child(2) {
      width: 600px;
    }

    th:not(:first-child):not(:nth-child(2)) {
      width: 100px;
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

    body.dark-mode .dark-mode-icon {
      fill: #fff;
    }

    body.dark-mode .logout-button, body.dark-mode .dark-mode-button {
      background-color: #155983;
      color: #fff;
    }

    body.dark-mode th {
      background-color: #34495E;
      color: #f3f3f3;
      border-color: #f3f3f3;
    }

    body.dark-mode th:first-child {
      border-color: #ccc;
    }

    body.dark-mode th:nth-child(2) {
      border-color: #ccc;
    }

    body.dark-mode th:not(:first-child):not(:nth-child(2)) {
      border-color: #ccc;
    }

    body.dark-mode td {
      border-color: #ccc;
    }
    body.dark-mode #add-row-btn{
        background-color: #155983;
    }
    .card-header{
    padding: 1rem;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center; 
    border-bottom: 1px solid #f0f0f0;
}

.card-header button{
    background: #749BC2;
    border-radius: 10px;
    color: #fff;
    font-size: .8rem;
    padding: .5rem 1rem;
    border: 1px solid #749BC2;
    margin-left: 90%;
}
   

  </style>
  <script>
    function question(){
      window.open("create_question.php");
    }
  </script>
</head>
<body>
  <div class="header">
    <div class="logo-container">
      <img class="logo" src="chlogo.jpg" alt="Company Logo">
    </div>

    <div class="user-info">
      <img class="user-pic" src="images.jpeg" alt="User Pic">
      <div class="admin-name" ><?php echo $_SESSION['admin_name']; ?> </div>
     
    </div>

    <button class="dark-mode-button" id="darkModeButton">
      <svg class="dark-mode-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 0c-6.628 0-12 5.373-12 12s5.372 12 12 12 12-5.373 12-12-5.372-12-12-12zm0 22c-5.512 0-10-4.488-10-10s4.488-10 10-10 10 4.488 10 10-4.488 10-10 10zm4-8c.733 0 1.454-.089 2.142-.259.286-.058.494-.311.494-.605v-1.272c0-.294-.208-.547-.494-.605-.688-.17-1.409-.259-2.142-.259-1.308 0-2.554.421-3.583 1.198-.329.252-.4.724-.147 1.053s.723.4 1.052.147c.646-.494 1.399-.745 2.177-.745s1.531.251 2.177.745c.329.252.801.182 1.052-.147s.182-.801-.147-1.053c-1.03-.777-2.275-1.198-3.583-1.198-1.967 0-3.744 1.275-4.349 3.168-.101.33.144.663.474.765.054.017.108.025.161.025.279 0 .542-.171.64-.452.613-2.005 2.472-3.506 4.664-3.506 2.24 0 4.115 1.53 4.637 3.584.056.31.297.537.603.575.051.006.102.009.152.009z"/>
      </svg>
    </button>

    <button class="logout-button" id="logoutButton">Logout</button>
  </div>

  <div class="table-container">
  <div class="card-header" onclick="question()">
    <button>+ Create </button>
  </div>
  <!-- ############ curricular ############### -->
  <h3>Curricular Aspects </h3>
 
  <?php 
  ob_start();
           include('config.php');
           $sqlget = "SELECT * FROM addque ORDER BY category, id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr><th>No</th>
           <th>Questions</th>
           <th>Action</th></tr>";

           $curricularCounter = 1;

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
             $id= $row['id'];
             $category = $row['category'];
             if ($category === 'carricular') {
            echo "<tr>";
            echo "<td>" . $curricularCounter . "</td>";
            echo "<td>"  .$row['question']."</td>";
           
            echo '<td> <button class="btn btn-primary"> <a href="edit.php?editid='.$id.'"  class="text-light">' .'Edit</a></button> 
            <button class="btn btn-danger"> <a href="delete.php?deleteid='.$id.'"  class="text-light">' .'Delete</a></button></td>';
            
            echo "</tr>";
            $curricularCounter++; 
           }
          }
           echo "</table>";
           ob_end_flush();
    ?>
<!-- ############ Teaching ############### -->
<h3>Teaching-Learning and Evaluation </h3>
  <?php 
  ob_start();
           include('config.php');
           $sqlget = "SELECT * FROM addque ORDER BY category, id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr><th>No</th>
           <th>Questions</th>
           <th>Action</th></tr>";

           $teachingCounter = 1; 

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
             $id= $row['id'];
             $category = $row['category'];

             if ($category === 'teaching') {
            echo "<tr>";
            echo "<td>"  .$teachingCounter ."</td>";
            echo "<td>"  .$row['question']."</td>";
           
            echo '<td> <button class="btn btn-primary"> <a href="edit.php?editid='.$id.'"  class="text-light">' .'Edit</a></button> 
            <button class="btn btn-danger"> <a href="delete.php?deleteid='.$id.'"  class="text-light">' .'Delete</a></button></td>';
            
            echo "</tr>";
            $teachingCounter++;
           }
          }
           echo "</table>";
           ob_end_flush();
    ?>
<!-- ############ Research ############### -->
<h3>Research and Extension Activities </h3>
  <?php 
  ob_start();
           include('config.php');
           $sqlget = "SELECT * FROM addque ORDER BY category, id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr><th>No</th>
           <th>Questions</th>
           <th>Action</th></tr>";
           $researchCounter = 1;

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
             $id= $row['id'];
             $category = $row['category'];
             if ($category === 'research') {
            echo "<tr>";
            echo "<td>"  . $researchCounter."</td>";
            echo "<td>"  .$row['question']."</td>";
           
            echo '<td> <button class="btn btn-primary"> <a href="edit.php?editid='.$id.'"  class="text-light">' .'Edit</a></button> 
            <button class="btn btn-danger"> <a href="delete.php?deleteid='.$id.'"  class="text-light">' .'Delete</a></button></td>';
            
            echo "</tr>";
            $researchCounter++;
           }
          }
           echo "</table>";
           ob_end_flush();
    ?>
<!-- ############ Infrastructe ############### -->
<h3>Infrastructure and Learning Resources </h3>
  <?php 
  ob_start();
           include('config.php');
           $sqlget = "SELECT * FROM addque ORDER BY category, id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr><th>No</th>
           <th>Questions</th>
           <th>Action</th></tr>";
           $infrastructureCounter = 1;

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
             $id= $row['id'];
             $category = $row['category'];
             if ($category === 'infrastructure') {
            echo "<tr>";
            echo "<td>"  . $infrastructureCounter ."</td>";
            echo "<td>"  .$row['question']."</td>";
           
            echo '<td> <button class="btn btn-primary"> <a href="edit.php?editid='.$id.'"  class="text-light">' .'Edit</a></button> 
            <button class="btn btn-danger"> <a href="delete.php?deleteid='.$id.'"  class="text-light">' .'Delete</a></button></td>';
            
            echo "</tr>";
            $infrastructureCounter++;
           }
          }
           echo "</table>";
           ob_end_flush();
    ?>
<!-- ############ Support ############### -->
<h3>Student Support and Progression </h3>
  <?php 
  ob_start();
           include('config.php');
           $sqlget = "SELECT * FROM addque ORDER BY category, id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr><th>No</th>
           <th>Questions</th>
           <th>Action</th></tr>";
           $supportCounter = 1; 

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
             $id= $row['id'];
             $category = $row['category'];
             if ($category === 'support') {
            echo "<tr>";
            echo "<td>"  . $supportCounter ."</td>";
            echo "<td>"  .$row['question']."</td>";
           
            echo '<td> <button class="btn btn-primary"> <a href="edit.php?editid='.$id.'"  class="text-light">' .'Edit</a></button> 
            <button class="btn btn-danger"> <a href="delete.php?deleteid='.$id.'"  class="text-light">' .'Delete</a></button></td>';
            
            echo "</tr>";
            $supportCounter++;
           }
          }
           echo "</table>";
           ob_end_flush();
    ?>
<!-- ############ Governance ############### -->
<h3>Governance and Leadership </h3>
  <?php 
  ob_start();
           include('config.php');
           $sqlget = "SELECT * FROM addque ORDER BY category, id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr><th>No</th>
           <th>Questions</th>
           <th>Action</th></tr>";
           $governanceCounter = 1; 

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
             $id= $row['id'];
             $category = $row['category'];
             if ($category === 'governance') {
            echo "<tr>";
            echo "<td>"  .$governanceCounter."</td>";
            echo "<td>"  .$row['question']."</td>";
           
            echo '<td> <button class="btn btn-primary"> <a href="edit.php?editid='.$id.'"  class="text-light">' .'Edit</a></button> 
            <button class="btn btn-danger"> <a href="delete.php?deleteid='.$id.'"  class="text-light">' .'Delete</a></button></td>';
            
            echo "</tr>";
            $governanceCounter++;
           }
          }
           echo "</table>";
           ob_end_flush();
    ?>

  </div>

  <script>
    
    function handleLogout() {
      const confirmation = confirm('Are you sure you want to logout?');

      if (confirmation) {
        window.location.href = 'login.php';
      }
      
    }
    if (window.history && history.pushState) {
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
   }

    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
    }

    const logoutButton = document.getElementById('logoutButton');
    logoutButton.addEventListener('click', handleLogout);

    const darkModeButton = document.getElementById('darkModeButton');
    darkModeButton.addEventListener('click', toggleDarkMode);

   
  </script>
</body>
</html>