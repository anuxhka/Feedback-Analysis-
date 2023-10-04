<?php
@include 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login.php');
  }
function getAcademicYear() {
  $currentYear = date('Y');
  $nextYear = date('y', strtotime('+1 year'));
  return $currentYear . '-' . $nextYear;
}

// ... your existing code



  // Connect to the MySQL database
  $conn = mysqli_connect('localhost', 'root', '1234', 'data');
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


if (isset($_POST['submit'])) {
    // Extract and sanitize user inputs

   
  
  // Bind parameters
 
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_type = mysqli_real_escape_string($conn, $_SESSION['user_name']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
   // Fetch all questions, responses, and categories
   $curricularRatings = array();
  $teachingRatings = array();
  $researchRatings = array();
  $infrastructureRatings = array();
  $supportRatings = array();
  $governanceRatings = array();
  $responses = array();
  // Create variables to store responses for each question
  $r1 = $r2 = $r3 = $r4 = $r5 = $r6 = $r7 = $r8 = $r9 = $r10 = 
  $r11 = $r12 = $r13= $r14 = $r15 = $r16 = $r17 = $r18 = $r19 = $r20 = 
  $r21 = $r22 = $r23 = $r24 = $r25 = $r26 = $r27 = $r28 = $r29 ='';

 
  // Loop through the POST data to extract feedback ratings and responses
  
  foreach ($_POST as $key => $value) {
    if (strpos($key, 'curricular') !== false) {
      $curricularRatings[] = $value;
      // Store responses in variables
      if ($key === 'curricular1') {
        $r1 = $value;
      } elseif ($key === 'curricular2') {
        $r2 = $value;
      } elseif ($key === 'curricular3') {
        $r3 = $value;
      } elseif ($key === 'curricular4') {
        $r4 = $value;// Repeat this pattern for each question
      }


    } elseif (strpos($key, 'teaching') !== false) {
      $teachingRatings[] = $value;
      // Store responses in variables
      if ($key === 'teaching1') {
        $r5 = $value;
      } elseif ($key === 'teaching2') {
        $r6 = $value;
      } elseif ($key === 'teaching3') {
        $r7 = $value;
      }  elseif ($key === 'teaching4') {
        $r8 = $value;
      }  elseif ($key === 'teaching5') {
        $r9 = $value;
      }  elseif ($key === 'teaching6') {
        $r10 = $value;
      } 


    } elseif (strpos($key, 'research') !== false) {
      $researchRatings[] = $value;
      // Store responses in variables
      if ($key === 'research1') {
        $r11 = $value;
      } elseif ($key === 'research2') {
        $r12 = $value;
      } elseif ($key === 'research3') {
        $r13 = $value;
      }  elseif ($key === 'research4') {
        $r14 = $value;
      }


    } elseif (strpos($key, 'infrastructure') !== false) {
      $infrastructureRatings[] = $value;
      // Store responses in variables
      if ($key === 'infrastructure1') {
        $r15 = $value;
      } elseif ($key === 'infrastructure2') {
        $r16 = $value;
      } elseif ($key === 'infrastructure3') {
        $r17 = $value;
      }  elseif ($key === 'infrastructure4') {
        $r18 = $value;
      } elseif ($key === 'infrastructure5') {
        $r19 = $value;
      } elseif ($key === 'infrastructure6') {
        $r20 = $value;
      }


    } elseif (strpos($key, 'support') !== false) {
      $supportRatings[] = $value;
      // Store responses in variables
      if ($key === 'support1') {
        $r21 = $value;
      } elseif ($key === 'support2') {
        $r22 = $value;
      } elseif ($key === 'support3') {
        $r23 = $value;
      }  elseif ($key === 'support4') {
        $r24 = $value;
      } elseif ($key === 'support5') {
        $r25 = $value;
      } elseif ($key === 'support6') {
        $r26 = $value;
      }


    }  elseif (strpos($key, 'governance') !== false) {
      $governanceRatings[] = $value;
      // Store responses in variables
      if ($key === 'governance1') {
        $r27 = $value;
      } elseif ($key === 'governance2') {
        $r28 = $value;
      } elseif ($key === 'governance3') {
        $r29 = $value;
      } 
    }
  }










$sql = "SELECT question_id, question, category FROM questions";
$result = $conn->query($sql);

// Initialize variables
$questionResponses = array();
$questionCategories = array();
$i = 1; // Counter for variable names

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Store each question's response in a variable like q1, q2, etc.
        $questionVarName = "q" . $i;
        $$questionVarName = $row['question'];
        
        // Store each question's category in a variable like c1, c2, etc.
        $categoryVarName = "c" . $i;
        $$categoryVarName = $row['category'];

           $categoryVarName = "c" . $i;
        $$categoryVarName = $row['category'];

        // Store the question and response in the array
        $questionResponses[$i] = array(
            'question' => $row['question'],
            'category' => $row['category']
        );

        $i++;
    }
} else {
    echo "No questions found.";
}

$insert = ("INSERT INTO response (
  year, `q1`, `r1`, `c1`, `q2`, `r2`, `c2`, 
  `q3`, `r3`, `c3`, `q4`, `r4`, `c4`, `q5`, `r5`, `c5`, 
  `q6`, `r6`, `c6`, `q7`, `r7`, `c7`, `q8`, `r8`, `c8`, 
  `q9`, `r9`, `c9`, `q10`, `r10`, `c10`, `q11`, `r11`, `c11`, 
  `q12`, `r12`, `c12`, `q13`, `r13`, `c13`, `q14`, `r14`, `c14`, 
  `q15`, `r15`, `c15`, `q16`, `r16`, `c16`, `q17`, `r17`, `c17`, 
  `q18`, `r18`, `c18`, `q19`, `r19`, `c19`, `q20`, `r20`, `c20`, 
  `q21`, `r21`, `c21`, `q22`, `r22`, `c22`, `q23`, `r23`, `c23`, 
  `q24`, `r24`, `c24`, `q25`, `r25`, `c25`, `q26`, `r26`, `c26`, 
  `q27`, `r27`, `c27`, `q28`, `r28`, `c28`, `q29`, `r29`, `c29`, 
  `remarks`,`email`
) VALUES ( '$year', '$q1', '$r1', '$c1', '$q2', '$r2', '$c2', 
  '$q3', '$r3', '$c3', '$q4', '$r4', '$c4', '$q5', '$r5', '$c5', 
  '$q6', '$r6', '$c6', '$q7', '$r7', '$c7', '$q8', '$r8', '$c8', 
  '$q9', '$r9', '$c9', '$q10', '$r10', '$c10', '$q11', '$r11', '$c11', 
  '$q12', '$r12', '$c12', '$q13', '$r13', '$c13', '$q14', '$r14', '$c14', 
  '$q15', '$r15', '$c15', '$q16', '$r16', '$c16', '$q17', '$r17', '$c17', 
  '$q18', '$r18', '$c18', '$q19', '$r19', '$c19', '$q20', '$r20', '$c20', 
  '$q21', '$r21', '$c21', '$q22', '$r22', '$c22', '$q23', '$r23', '$c23', 
  '$q24', '$r24', '$c24', '$q25', '$r25', '$c25', '$q26', '$r26', '$c26', 
  '$q27', '$r27', '$c27', '$q28', '$r28', '$c28', '$q29', '$r29', '$c29', 
  '$remarks','$email')");

if (mysqli_query($conn, $insert)) {
    echo "Feedback submitted successfully!";
  } else {
    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
  }

$conn->close();


// Example usage:
 
//echo "<br>";
//echo "Category: $c1"; 
//echo "<br>";
//echo "Response: $r1";
// using the array
//echo $questionResponses[1]['question']; // Access the question of the first question
//echo $questionResponses[1]['category']; // Access the category of the first question


}

  

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Feedback Form</title>
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
<body>
  <!-- logout -->
<div class="logout-container">
    <button id="logoutButton">Logout</button>
  </div>  

   <!-- logo -->
  <div class="logo-container">
    <img src="CHLOGO.jpg" alt="logo">
    <span class="academic-year">Academic Year: <?php echo getAcademicYear(); ?></span>
    <!-- user logo name -->
    <div class="user-wrapper">
                <img src="images.jpeg" width="30px" height="30px" alt="">
                <div>
                    <h4>
                        <?php echo $_SESSION['user_name']; ?>
                    </h4>
                    <small>User Name</small>
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
     <input type="text" id="email" name="email" value=<?php echo $_SESSION['user_name']; ?>  readonly>
    </div>
    <div class="input-group">
      <label class="label" for="name">2. Name (Optional)</label>
      <input type="text" id="name" name="name" autocomplete="name">
    </div>
    <!--################ CURRICULAR ASPECTS ################# -->
    <h2>Curricular Aspects *</h2>
    <?php 
           include('config.php');
           $academicYear = getAcademicYear();
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
           $academicYear = getAcademicYear();
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
           $academicYear = getAcademicYear();
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
           $academicYear = getAcademicYear();
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
           $academicYear = getAcademicYear();
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
           $academicYear = getAcademicYear();
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
      <textarea class="remarks-box" id="remarks" name="remarks" placeholder="Your suggestions are welcome." required></textarea>
    </div>
  

    <input HIDDEN type="text" id="year" name="year" value="<?php echo getAcademicYear(); ?>" readonly>
    <button type="submit" name="submit">Submit Feedback</button>
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

  </script>
 

</form>
</body>
</html>