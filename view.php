<!--SHOWS THE DATA OF SELECTED YEAR AND DOWLOAD IN DOC-->
<?php
@include 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

if(!isset($_SESSION['admin_name'])){
  header('location:login.php');
}
// ac year starting
if (isset($_GET['academicYear'])) {
  $selectedAcademicYear = $_GET['academicYear'];
} else {
  // Academic year is not provided; you can handle this case as needed
  echo "<h1>Please select an academic year from view1.php.</h1>";
  exit(); // Exit to prevent further execution
}


// ... your existing code
if (isset($_POST['submit'])) {
    
  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $remarks = $_POST['remarks'];

  // Create arrays to store feedback ratings
  $curricularRatings = array();
  $teachingRatings = array();
  $researchRatings = array();
  $infrastructureRatings = array();
  $supportRatings = array();
  $governanceRatings = array();

  // Loop through the POST data to extract feedback ratings
  foreach ($_POST as $key => $value) {
    if (strpos($key, 'curricular') !== false) {
      $curricularRatings[str_replace('curricular', '', $key)] = $value;
    } elseif (strpos($key, 'teaching') !== false) {
      $teachingRatings[str_replace('teaching', '', $key)] = $value;
    } elseif (strpos($key, 'research') !== false) {
      $researchRatings[str_replace('research', '', $key)] = $value;
    } elseif (strpos($key, 'infrastructure') !== false) {
      $infrastructureRatings[str_replace('infrastructure', '', $key)] = $value;
    } elseif (strpos($key, 'support') !== false) {
      $supportRatings[str_replace('support', '', $key)] = $value;
    } elseif (strpos($key, 'governance') !== false) {
      $governanceRatings[str_replace('governance', '', $key)] = $value;
    }
  }
  

  // Connect to the MySQL database
  $conn = mysqli_connect('localhost', 'root', '1234', 'data');
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare and execute the query to insert data into the table
  $sql = "INSERT INTO student_feedback (email, name,  curricular_ratings, teaching_ratings, research_ratings, infrastructure_ratings, support_ratings, governance_ratings,remarks) 
          VALUES ('$email', '$name',  '" . json_encode($curricularRatings) . "', '" . json_encode($teachingRatings) . "', '" . json_encode($researchRatings) . "', 
                  '" . json_encode($infrastructureRatings) . "', '" . json_encode($supportRatings) . "', '" . json_encode($governanceRatings) . "', '$remarks')";

  if (mysqli_query($conn, $sql)) {
    echo "Feedback submitted successfully!";
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <title>Download from View</title>
  <style>
    
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
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

    .input-group {
      margin-bottom: 20px;
    }

    .label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="radio"] {
      transform: scale(1.5);
      margin-right: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #007bff;
      color: #fff;
    }

    button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }
    img {
      max-width: 200px;
      margin-bottom: 20px;
    }
    .logo-container {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .academic-year {
      font-size: 24px;
      margin-left: 60px;
      font-weight: bold;
    }
    .required {
      color: red;
    }
    .remarks-box {
      width: 100%;
      height: 150px;
      padding: 10px;
      padding-right: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      resize: vertical;
     
    }
    .logout-container {
      display: flex;
      justify-content: flex-end; 
      margin-bottom: 20px;
      border-color: #8390a2;
    }

    #logoutButton {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
}

    #logoutButton:hover {
      background-color: #0056b3;
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
</head>
<body id="feedback">
  <!-- logout -->

<div class="logout-container">
    <button id="logoutButton">Logout</button>
</div>  

   <!-- logo -->
<div >
  <div class="logo-container">
    <img src="CHLOGO.jpg" alt="logo">
    <span class="academic-year">Academic Year: <?php echo $selectedAcademicYear; ?></span>
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
  <hr>
 
 
  <h1>End-Semester Student Feedback</h1>
  <p>
    Dear Student,
    This information will be kept confidential and will be used for further improvement of the academic system. Give
    your satisfaction level for the following aspects. Mark in the chosen box.
    The respondent's email <span class="required">(null)</span> was recorded on submission of this form.
    <span class="required">*</span> Required
  </p>

  <!-- ######### FORM ############# -->
  <form id="feedbackForm" method="POST">
    <div class="input-group">
      <label class="label" for="email">1. Email *</label>
     <input type="text" name="email" id="email" >
    </div>
    <div class="input-group">
      <label class="label" for="name">2. Name (Optional)</label>
      <input type="text" id="name" name="name" autocomplete="name" >
    </div>
    <!--################ CURRICULAR ASPECTS ################# -->
    <h2>Curricular Aspects *</h2>
    <?php 
           include('config.php');
           $academicYear = $selectedAcademicYear;
           $sqlget = "SELECT * FROM questions WHERE year='$academicYear' ORDER BY category, question_id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr>
           <th>No.</th>
           <th>Questions</th> 
           <th>Excellent</th>
           <th>Very Good</th>
           <th>Good</th>
           <th>Average</th>
           <th>Below Average</th></tr>";
           $curricularCounter = 1;

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
            $category = $row['category'];
          // -------------------------------------------------------------//
            if ($category === 'carricular') {
          // -------------------------------------------------------------//
            
            echo "<tr>";
            echo "<td>"  .  $curricularCounter."</td>";
            echo "<td>"  .$row['question']."</td>";

            $radioName = 'curricular' . $row['question_id'];
      
      echo '<td><input type="radio" name="' . $radioName . '" value="excellent"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="very-good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="average"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="below-average"></td>';
           
            echo "</tr>";
            $curricularCounter++;
           }
          }
           echo "</table>";
         ?>
    <!-- ################TEACHING-LEARNING################ -->
    <h2>Teaching-Learning and Evaluation *</h2>
    <?php 
           include('config.php');
           $academicYear = $selectedAcademicYear;
           $sqlget = "SELECT * FROM questions WHERE year='$academicYear' ORDER BY category, question_id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr>
           <th>No.</th>
           <th>Questions</th> 
           <th>Excellent</th>
           <th>Very Good</th>
           <th>Good</th>
           <th>Average</th>
           <th>Below Average</th></tr>";
           $teachingCounter = 1; 

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
            $category = $row['category'];
            // -------------------------------------------------------------//
            if ($category === 'teaching') {
           // -------------------------------------------------------------//
            
            echo "<tr>";
            echo "<td>"  .$teachingCounter."</td>";
            echo "<td>"  .$row['question']."</td>";
            
            $radioName = 'teaching' . $row['question_id'];
      
      echo '<td><input type="radio" name="' . $radioName . '" value="excellent"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="very-good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="average"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="below-average"></td>';
           
            echo "</tr>";
            $teachingCounter++;
           }
          }
           echo "</table>";
         ?>
    <!--#################RESEARCH & EXTENSION ################## -->
    <h2>Research and Extension Activities *</h2>
    <?php 
           include('config.php');
           $academicYear = $selectedAcademicYear;
           $sqlget = "SELECT * FROM questions WHERE year='$academicYear' ORDER BY category, question_id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr>
           <th>No.</th>
           <th>Questions</th> 
           <th>Excellent</th>
           <th>Very Good</th>
           <th>Good</th>
           <th>Average</th>
           <th>Below Average</th></tr>";
           $researchCounter = 1;

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
            $category = $row['category'];
              // -------------------------------------------------------------//
               if ($category === 'research') {
                // -------------------------------------------------------------//
            
            echo "<tr>";
            echo "<td>"  .$researchCounter."</td>";
            echo "<td>"  .$row['question']."</td>";
            
            $radioName = 'research' . $row['question_id'];
      
      echo '<td><input type="radio" name="' . $radioName . '" value="excellent"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="very-good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="average"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="below-average"></td>';
           
            echo "</tr>";
            $researchCounter++;
           }
          }
           echo "</table>";
         ?>
    <!--############# INFRASTRUCTURE AND LEARNING ################ -->
    <h2>Infrastructure and Learning Resources *</h2>
    <?php 
           include('config.php');
           $academicYear = $selectedAcademicYear;
           $sqlget = "SELECT * FROM questions WHERE year='$academicYear' ORDER BY category, question_id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr>
           <th>No.</th>
           <th>Questions</th> 
           <th>Excellent</th>
           <th>Very Good</th>
           <th>Good</th>
           <th>Average</th>
           <th>Below Average</th></tr>";
           $infrastructureCounter = 1;

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
            $category = $row['category'];
          // -------------------------------------------------------------//
            if ($category === 'infrastructure') {
          // -------------------------------------------------------------// 
            echo "<tr>";
            echo "<td>"  .$infrastructureCounter."</td>";
            echo "<td>"  .$row['question']."</td>";
            
            $radioName = 'infrastructure' . $row['question_id'];
      
      echo '<td><input type="radio" name="' . $radioName . '" value="excellent"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="very-good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="average"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="below-average"></td>';
           
            echo "</tr>";
            $infrastructureCounter++;
           }
          }
           echo "</table>";
         ?>

    <!--############# STUDENT SUPPORT ################ -->
    <h2>Student Support and Progression *</h2>
    <?php 
           include('config.php');
           $academicYear = $selectedAcademicYear;
           $sqlget = "SELECT * FROM questions WHERE year='$academicYear' ORDER BY category, question_id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr>
           <th>No.</th>
           <th>Questions</th> 
           <th>Excellent</th>
           <th>Very Good</th>
           <th>Good</th>
           <th>Average</th>
           <th>Below Average</th></tr>";
           $supportCounter = 1; 

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
            $category = $row['category'];
            // -------------------------------------------------------------//
            if ($category === 'support') {
            // -------------------------------------------------------------//
            
            echo "<tr>";
            echo "<td>"  . $supportCounter."</td>";
            echo "<td>"  .$row['question']."</td>";
            
            $radioName = 'support' . $row['question_id'];
      
      echo '<td><input type="radio" name="' . $radioName . '" value="excellent"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="very-good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="average"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="below-average"></td>';
           
            echo "</tr>";
            $supportCounter++;
           }
          }
           echo "</table>";
         ?>
    <!--############# GOVERNANCE AND LEADERSHIP ################ -->
    <h2>Governance and Leadership  *</h2>
    <?php 
           include('config.php');
           $academicYear = $selectedAcademicYear;
           $sqlget = "SELECT * FROM questions WHERE year='$academicYear' ORDER BY category, question_id";
           $sqldata = mysqli_query($conn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr>
           <th>No.</th>
           <th>Questions</th> 
           <th>Excellent</th>
           <th>Very Good</th>
           <th>Good</th>
           <th>Average</th>
           <th>Below Average</th></tr>";
           $governanceCounter = 1; 

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
            $category = $row['category'];
            // -------------------------------------------------------------//
            if ($category === 'governance') {
            // -------------------------------------------------------------//

            echo "<tr>";
            echo "<td>"  .$governanceCounter."</td>";
            echo "<td>"  .$row['question']."</td>";
            
            $radioName = 'governance' . $row['question_id'];
      
      echo '<td><input type="radio" name="' . $radioName . '" value="excellent"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="very-good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="good"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="average"></td>';
      echo '<td><input type="radio" name="' . $radioName . '" value="below-average"></td>';
           
            echo "</tr>";
            $governanceCounter++;
           }
          }
           echo "</table>";
         ?>
      <!-- ###################### END ############### -->
    <div class="input-group">
      <label class="label" for="remarks">Remarks (Write 'NA' if none)</label>
      <textarea class="remarks-box" id="remarks" name="remarks" placeholder="Your suggestions are welcome." ></textarea>
    </div>
   
    
    </div>
    </div>
   <button type="button" id="download" onclick="generatePDF()">Download in PDF</button>
   <button type="button" id="downloadWord" onclick="generateWord()">Download in Doc</button>

  </form>



  <script>
    function handleLogout() {
    const confirmation = confirm('Are you sure you want to logout?');

  if (confirmation) {
    // Redirect to the login.php page on logout
    window.location.href = 'login.php';
  }
}

const logoutButton = document.getElementById('logoutButton');
logoutButton.addEventListener('click', handleLogout);
 
//-------------PDF--------------
function generatePDF(){
  const element = document.getElementById("feedback");
 
  html2pdf()
  .from(element)
  .save();
}

//-------------------doc--------------
function generateWord() {
  const content = document.getElementById("feedback").outerHTML;
  const filename = "feedback.docx";

  const blob = new Blob(['\ufeff', content], {
    type: 'application/msword'
  });

  // Create a download link and trigger the download
  const link = document.createElement('a');
  link.href = URL.createObjectURL(blob);
  link.download = filename;
  link.click();
}


  </script>
 

</body>
</html>