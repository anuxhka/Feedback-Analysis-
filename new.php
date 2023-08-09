<?php
@include 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}

         if (isset($_POST['submit'])) {

            
            $ques = $_POST['question'];
            $role = $_POST['category1'];
            $cate = $_POST['category2'];
          
          
            // Connect to the MySQL database
            $conn = mysqli_connect('localhost','root','','data');
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
          
            // Prepare and execute the query to insert data into the table
            $sql = "INSERT INTO addque (question, role, category) VALUES ('$ques', '$role', '$cate')";
           
            if (mysqli_query($conn, $sql)) {

              echo "      Added successfully!";
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
          
            // Close the database connection
            mysqli_close($conn);
          }
         
        ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Shared styles for both light and dark modes */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
            background-color: #12232E;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
            width: 1410px;
            height: 70px;
        }

        .logo {
            max-width: 200px;
            margin-top: 3px;
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

        .logout-button,
        .dark-mode-button {
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

        .dark-mode-button:hover,
        .logout-button:hover {
            transform: scale(1.05);
        }

        .dark-mode-icon {
            width: 24px;
            height: 24px;
            fill: #fff;
            transition: fill 0.3s;
        }

        /* Dark mode styles */
        body.dark-mode {
            background-color: #12232E;
            color: #f3f3f3;
        }

        body.dark-mode .header {
            background-color: #34495E;
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

        /* Question and Category Styles in Dark Mode */
        body.dark-mode .question-container {
            color: #f3f3f3;
        }

        body.dark-mode .question-input {
            background-color: #203140;
            color: #f3f3f3;
        }

        body.dark-mode .category-dropdown {
            background-color: #203140;
            color: #f3f3f3;
        }

        body.dark-mode .submit-btn {
            background-color: #34495E;
            color: #f3f3f3;
            border: 1px solid #ccc;
        }
        body.dark-mode .question-label{
            color: #f3f3f3;
        }
        body.dark-mode .container-wrapper {
            border: 2px solid #fff;
        }

        body:not(.dark-mode) .container-wrapper {
            border: 2px solid #000; 
        }
        body.dark-mode .question-container {
            background-color: #12232E; 
        }

        body:not(.dark-mode) .question-container {
            background-color: #12232E; 
        }
        body:not(.dark-mode) .container-wrapper {
            border: 2px solid #000; 
        }

        body:not(.dark-mode) .question-container {
            background-color: #fff;
        }

        .container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            text-align: center;
        }

        .question-container {
            flex: 1;
            margin-right: 70px;
            height: 300px;
            background-color: #ccc;
        }

        .question-label {
            font-size: 20px;
            margin-bottom: 40px;
            margin-top: 20px;
            color: #333;
            margin-right: 400px;
        }

        .question-input {
            width: 600px;
            height: 100px;
            font-size: 18px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .category-container {
            flex: 1;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .category-dropdown {
            font-size: 16px;
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            font-size: 16px;
            padding: 10px;
            background-color: #12232E;
            color: #FFF;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .container-wrapper {
            border: 2px solid #203140;
            border-radius: 5px;
            padding: 10px;
            margin: 20px;
        }





        h1, h2 {
      margin-bottom: 10px;
    }

    form {
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 5px;
      background-color: #f9f9f9;
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

    .academic-year {
      font-size: 24px;
      margin-left: 60px;
      font-weight: bold;
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
            <div class="admin-name">  <?php echo $_SESSION['admin_name']; ?></div>
        </div>
        <button class="dark-mode-button" id="darkModeButton">
            <svg class="dark-mode-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 0c-6.628 0-12 5.373-12 12s5.372 12 12 12 12-5.373 12-12-5.372-12-12-12zm0 22c-5.512 0-10-4.488-10-10s4.488-10 10-10 10 4.488 10 10-4.488 10-10 10zm4-8c.733 0 1.454-.089 2.142-.259.286-.058.494-.311.494-.605v-1.272c0-.294-.208-.547-.494-.605-.688-.17-1.409-.259-2.142-.259-1.308 0-2.554.421-3.583 1.198-.329.252-.4.724-.147 1.053s.723.4 1.052.147c.646-.494 1.399-.745 2.177-.745s1.531.251 2.177.745c.329.252.801.182 1.052-.147s.182-.801-.147-1.053c-1.03-.777-2.275-1.198-3.583-1.198-1.967 0-3.744 1.275-4.349 3.168-.101.33.144.663.474.765.054.017.108.025.161.025.279 0 .542-.171.64-.452.613-2.005 2.472-3.506 4.664-3.506 2.24 0 4.115 1.53 4.637 3.584.056.31.297.537.603.575.051.006.102.009.152.009z" />
            </svg>
        </button>
        <button class="logout-button" id="logoutButton">Logout</button>
    </div>
    <!-- ########## A.y. ############## -->
    <span class="academic-year">Academic Year: <?php echo date('Y'); ?>-<?php echo date('Y') + 1; ?></span>


    <form action="" method="POST">
    <div class="container-wrapper">
        <div class="container">
            <div class="question-container box">
            <div class="question-label">
            <label class="label" for="questions">Add Question:</label>
            </div>
            
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <textarea class="question-input box-content" name="question" placeholder="Enter your question here..."></textarea>
                    <button class="submit-btn box-content" type="submit" name="submit" value="submit">Submit</button>
                </div>
           
        </div>
        <div class="category-container">
                <select class="category-dropdown box-content" name="category1" id="category1" required>
                    <option value="">Select Role</option>
                    <option value="student">Student</option>
                    <option value="parent">Parent</option>
                    <option value="alumni">Alumni</option>
                    <option value="faculty">Faculty</option>
                    <option value="guest">Guest</option>
                </select>
                <select class="category-dropdown box-content" name="category2" id="category2" style="display: none;" required>
                    <option value="">Select Category</option>
                    <option value="carricular">Curricular</option>
                    <option value="teaching">Teaching</option>
                    <option value="research">Research</option>
                    <option value="infrastructure">Infrastructure</option>
                    <option value="support">Support</option>
                    <option value="governance">Governance</option>
                </select>
                
                </form>
            <!-- Close the form tag here -->
        </div>
    </div>
    
    


    <div class="table-container">
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
            if (confirmation) { window.location.href = 'login.php'; }
        }
        function toggleDarkMode() { document.body.classList.toggle('dark-mode'); }
        const category1Dropdown = document.getElementById('category1');
        const category2Dropdown = document.getElementById('category2');
        category1Dropdown.addEventListener('change', function() {
            if (this.value === 'student') { category2Dropdown.style.display = 'inline-block'; }
            else { category2Dropdown.style.display = 'none'; }
        });
        const logoutButton = document.getElementById('logoutButton');
        logoutButton.addEventListener('click', handleLogout);
        const darkModeButton = document.getElementById('darkModeButton');
        darkModeButton.addEventListener('click', toggleDarkMode);
    </script>
</body>
</html>