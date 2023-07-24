<?php
@include 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['user_name'])){
  header('location:login.php');
}

if (isset($_POST['submit'])) {
  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $c1 = $_POST['curricular1'];
  $c2 = $_POST['curricular2'];
  $c3 = $_POST['curricular3'];
  $c4 = $_POST['curricular4'];
  
  $t1 = $_POST['Teaching1'];
  $t2 = $_POST['Teaching2'];
  $t3 = $_POST['Teaching3'];
  $t4 = $_POST['Teaching4'];
  $t5 = $_POST['Teaching5'];
  $t6 = $_POST['Teaching6'];
  
  $r1 = $_POST['Research1'];
  $r2 = $_POST['Research2'];
  $r3 = $_POST['Research3'];
  $r4 = $_POST['Research4'];
  
  $i1 = $_POST['Infrastructure1'];
  $i2 = $_POST['Infrastructure2'];
  $i3 = $_POST['Infrastructure3'];
  $i4 = $_POST['Infrastructure4'];
  $i5 = $_POST['Infrastructure5'];
  $i6 = $_POST['Infrastructure6'];
  
  $s1 = $_POST['Support1'];
  $s2 = $_POST['Support2'];
  $s3 = $_POST['Support3'];
  $s4 = $_POST['Support4'];
  $s5 = $_POST['Support5'];
  $s6 = $_POST['Support6'];
  
  $g1 = $_POST['Governance1'];
  $g2 = $_POST['Governance2'];
  $g3 = $_POST['Governance3'];
  
  $remarks = $_POST['remarks'];

  // Add more variables for other form fields

  // Connect to the MySQL database
  $conn = mysqli_connect('localhost','root','','data');
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare and execute the query to insert data into the table
  $sql = "INSERT INTO student_feedback (email, name ,curricular1, curricular2, curricular3, curricular4, Teaching1, Teaching2, Teaching3, Teaching4, Teaching5, Teaching6, Research1, Research2, Research3, Research4, Infrastructure1, Infrastructure2, Infrastructure3, Infrastructure4, Infrastructure5, Infrastructure6, Support1, Support2, Support3, Support4 ,Support5, Support6, Governance1, Governance2, Governance3, remarks) VALUES ('$email','$name','$c1','$c2','$c3','$c4','$t1','$t2','$t3','$t4','$t5','$t6','$r1','$r2','$r3','$r4','$i1','$i2','$i3','$i4','$i5','$i6','$s1','$s2','$s3','$s4','$s5','$s6','$g1','$g2','$g3','$remarks')";
  // Add more columns to the query based on your form fields

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
    <img src="chlogo.jpg" alt="logo">
    <span class="academic-year">Academic Year: 2023-2024</span>
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
     <input type="email" id="email" name="email" required> 
    </div>
    <div class="input-group">
      <label class="label" for="name">2. Name (Optional)</label>
      <input type="text" id="name" name="name" autocomplete="name">
    </div>
    <!--################ CURRICULAR ASPECTS ################# -->
    <h2>Curricular Aspects *</h2>
    <table>
      <tr>
        <th></th>
        <th>Excellent</th>
        <th>Very Good</th>
        <th>Good</th>
        <th>Average</th>
        <th>Below Average</th>
      </tr>
      <tr>
        <td>1)Curriculum developed and implemented has relevance to local, national, regional and global development needs.</td>
        <td><input type="radio" name="curricular1" value="excellent" required></td>
        <td><input type="radio" name="curricular1" value="very-good"></td>
        <td><input type="radio" name="curricular1" value="good"></td>
        <td><input type="radio" name="curricular1" value="average"></td>
        <td><input type="radio" name="curricular1" value="below-average"></td>
      </tr>
      <tr>
        <td>2)Curriculum was broad enough to prepare you for career of choice.</td>
        <td><input type="radio" name="curricular2" value="excellent"></td>
        <td><input type="radio" name="curricular2" value="very-good"></td>
        <td><input type="radio" name="curricular2" value="good"></td>
        <td><input type="radio" name="curricular2" value="average"></td>
        <td><input type="radio" name="curricular2" value="below-average"></td>
      </tr>
      <tr>
        <td>3)Curriculum integrates crosscutting issues relevant to professional ethics, gender, human values, environment and sustainability.</td>
        <td><input type="radio" name="curricular3" value="excellent"></td>
        <td><input type="radio" name="curricular3" value="very-good"></td>
        <td><input type="radio" name="curricular3" value="good"></td>
        <td><input type="radio" name="curricular3" value="average"></td>
        <td><input type="radio" name="curricular3" value="below-average"></td>
      </tr>
      <tr>
        <td>4)The learning was supplemented by co-curricular activities such as coursework outside the curriculum, project work, internships, workshops, conference, symposia etc.</td>
        <td><input type="radio" name="curricular4" value="excellent"></td>
        <td><input type="radio" name="curricular4" value="very-good"></td>
        <td><input type="radio" name="curricular4" value="good"></td>
        <td><input type="radio" name="curricular4" value="average"></td>
        <td><input type="radio" name="curricular4" value="below-average"></td>
      </tr>
    </table>
    <!-- ################TEACHING-LEARNING################ -->
    <h2>Teaching-Learning and Evaluation *</h2>
    <table>
      <tr>
        <th></th>
        <th>Excellent</th>
        <th>Very Good</th>
        <th>Good</th>
        <th>Average</th>
        <th>Below Average</th>
      </tr>
      <tr>
        <td>1)Audiovisual learning resources provided by teachers facilitated you to improve learning.</td>
        <td><input type="radio" name="Teaching1" value="excellent"></td>
        <td><input type="radio" name="Teaching1" value="very-good"></td>
        <td><input type="radio" name="Teaching1" value="good"></td>
        <td><input type="radio" name="Teaching1" value="average"></td>
        <td><input type="radio" name="Teaching1" value="below-average"></td>
      </tr>
      <tr>
        <td>2)Reading material and other learning resources provided by teachers facilitated you to improve learning. </td>
        <td><input type="radio" name="Teaching2" value="excellent"></td>
        <td><input type="radio" name="Teaching2" value="very-good"></td>
        <td><input type="radio" name="Teaching2" value="good"></td>
        <td><input type="radio" name="Teaching2" value="average"></td>
        <td><input type="radio" name="Teaching2" value="below-average"></td>
      </tr>
      <tr>
        <td>3)Hands-on practice in laboratories and project work facilitated in overall development, inculcating skills and time management. </td>
        <td><input type="radio" name="Teaching3" value="excellent"></td>
        <td><input type="radio" name="Teaching3" value="very-good"></td>
        <td><input type="radio" name="Teaching3" value="good"></td>
        <td><input type="radio" name="Teaching3" value="average"></td>
        <td><input type="radio" name="Teaching3" value="below-average"></td>
      </tr>
      <tr>
        <td>4)Academic activities facilitate you to improve experiential learning, participative learning and problem-solving methodology. </td>
        <td><input type="radio" name="Teaching4" value="excellent"></td>
        <td><input type="radio" name="Teaching4" value="very-good"></td>
        <td><input type="radio" name="Teaching4" value="good"></td>
        <td><input type="radio" name="Teaching4" value="average"></td>
        <td><input type="radio" name="Teaching4" value="below-average"></td>
      </tr>
      <tr>
        <td>5)Evaluation pattern (Unit Test, Assignment, and Presentation) made you capable of analyzing your strength & weakness, and empowered you to use resources effectively. </td>
        <td><input type="radio" name="Teaching5" value="excellent"></td>
        <td><input type="radio" name="Teaching5" value="very-good"></td>
        <td><input type="radio" name="Teaching5" value="good"></td>
        <td><input type="radio" name="Teaching5" value="average"></td>
        <td><input type="radio" name="Teaching5" value="below-average"></td>
      </tr>
      <br>
      <tr>
        <td>6)The overall experience would help you to engage in independent and life-long learning in the broadest context of technological change. </td>
        <td><input type="radio" name="Teaching6" value="excellent"></td>
        <td><input type="radio" name="Teaching6" value="very-good"></td>
        <td><input type="radio" name="Teaching6" value="good"></td>
        <td><input type="radio" name="Teaching6" value="average"></td>
        <td><input type="radio" name="Teaching6" value="below-average"></td>
      </tr>
    </table>
    <!--#################RESEARCH & EXTENSION ################## -->
    <h2>Research and Extension Activities *</h2>
    <table>
      <tr>
        <th></th>
        <th>Excellent</th>
        <th>Very Good</th>
        <th>Good</th>
        <th>Average</th>
        <th>Below Average</th>
      </tr>
      <tr>
        <td>1)Institution has an eco-system to promote research and other initiatives for creationand transfer of knowledge. </td>
        <td><input type="radio" name="Research1" value="excellent"></td>
        <td><input type="radio" name="Research1" value="very-good"></td>
        <td><input type="radio" name="Research1" value="good"></td>
        <td><input type="radio" name="Research1" value="average"></td>
        <td><input type="radio" name="Research1" value="below-average"></td>
      </tr>
      <tr>
        <td>2)Institution has adequate facility to carry out research.</td>
        <td><input type="radio" name="Research2" value="excellent"></td>
        <td><input type="radio" name="Research2" value="very-good"></td>
        <td><input type="radio" name="Research2" value="good"></td>
        <td><input type="radio" name="Research2" value="average"></td>
        <td><input type="radio" name="Research2" value="below-average"></td>
      </tr>
      <tr>
        <td>3)Workshops/seminars on research methodology, Intellectual Property Rights (IPR), entrepreneurship, skill development are organized regularly. </td>
        <td><input type="radio" name="Research3" value="excellent"></td>
        <td><input type="radio" name="Research3" value="very-good"></td>
        <td><input type="radio" name="Research3" value="good"></td>
        <td><input type="radio" name="Research3" value="average"></td>
        <td><input type="radio" name="Research3" value="below-average"></td>
      </tr>
      <tr>
        <td>4)Activities with social relevance (NCC/ NSS/ CHRF/ CHARUSAT Rural Education etc.) are conducted regularly. </td>
        <td><input type="radio" name="Research4" value="excellent"></td>
        <td><input type="radio" name="Research4" value="very-good"></td>
        <td><input type="radio" name="Research4" value="good"></td>
        <td><input type="radio" name="Research4" value="average"></td>
        <td><input type="radio" name="Research4" value="below-average"></td>
      </tr>
    </table>
    <!--############# INFRASTRUCTURE AND LEARNING ################ -->
    <h2>Infrastructure and Learning Resources *</h2>
    <table>
      <tr>
        <th></th>
        <th>Excellent</th>
        <th>Very Good</th>
        <th>Good</th>
        <th>Average</th>
        <th>Below Average</th>
      </tr>
      <tr>
        <td>1)The institute has adequate facilities for Teaching - learning viz. audiovisual amenities, classrooms, laboratories. </td>
        <td><input type="radio" name="Infrastructure1" value="excellent"></td>
        <td><input type="radio" name="Infrastructure1" value="very-good"></td>
        <td><input type="radio" name="Infrastructure1" value="good"></td>
        <td><input type="radio" name="Infrastructure1" value="average"></td>
        <td><input type="radio" name="Infrastructure1" value="below-average"></td>
      </tr>
      <tr>
        <td>2)The institute has adequate facilities for Cultural activities, yoga, games (Indoor and outdoor), sports and gymnasium </td>
        <td><input type="radio" name="Infrastructure2" value="excellent"></td>
        <td><input type="radio" name="Infrastructure2" value="very-good"></td>
        <td><input type="radio" name="Infrastructure2" value="good"></td>
        <td><input type="radio" name="Infrastructure2" value="average"></td>
        <td><input type="radio" name="Infrastructure2" value="below-average"></td>
      </tr>
      <tr>
        <td>3)The institute has adequate LAN, WiFi and Internet Facility </td>
        <td><input type="radio" name="Infrastructure3" value="excellent"></td>
        <td><input type="radio" name="Infrastructure3" value="very-good"></td>
        <td><input type="radio" name="Infrastructure3" value="good"></td>
        <td><input type="radio" name="Infrastructure3" value="average"></td>
        <td><input type="radio" name="Infrastructure3" value="below-average"></td>
      </tr>
      <tr>
        <td>4)The institute has adequate and hygienic canteen and food facilities.</td>
        <td><input type="radio" name="Infrastructure4" value="excellent"></td>
        <td><input type="radio" name="Infrastructure4" value="very-good"></td>
        <td><input type="radio" name="Infrastructure4" value="good"></td>
        <td><input type="radio" name="Infrastructure4" value="average"></td>
        <td><input type="radio" name="Infrastructure4" value="below-average"></td>
      </tr>
      <tr>
        <td>5)Campus Ambience (Greenery, Environment friendly eco system, usage of solar lights, saving of electivity, production of electricity, working space) is pleasant. </td>
        <td><input type="radio" name="Infrastructure5" value="excellent"></td>
        <td><input type="radio" name="Infrastructure5" value="very-good"></td>
        <td><input type="radio" name="Infrastructure5" value="good"></td>
        <td><input type="radio" name="Infrastructure5" value="average"></td>
        <td><input type="radio" name="Infrastructure5" value="below-average"></td>
      </tr>
      <tr>
        <td>6)Adequate learning resources are available in library. </td>
        <td><input type="radio" name="Infrastructure6" value="excellent"></td>
        <td><input type="radio" name="Infrastructure6" value="very-good"></td>
        <td><input type="radio" name="Infrastructure6" value="good"></td>
        <td><input type="radio" name="Infrastructure6" value="average"></td>
        <td><input type="radio" name="Infrastructure6" value="below-average"></td>
      </tr>
    </table>
    <!--############# STUDENT SUPPORT ################ -->
    <h2>Student Support and Progression *</h2>
    <table>
      <tr>
        <th></th>
        <th>Excellent</th>
        <th>Very Good</th>
        <th>Good</th>
        <th>Average</th>
        <th>Below Average</th>
      </tr>
      <tr>
        <td>1)Active student council exists and students are involved in activities for institutional development and student welfare. </td>
        <td><input type="radio" name="Support1" value="excellent"></td>
        <td><input type="radio" name="Support1" value="very-good"></td>
        <td><input type="radio" name="Support1" value="good"></td>
        <td><input type="radio" name="Support1" value="average"></td>
        <td><input type="radio" name="Support1" value="below-average"></td>
      </tr>
      <tr>
        <td>2)Institution timely resolves the grievances including sexual harassment and ragging cases.</td>
        <td><input type="radio" name="Support2" value="excellent"></td>
        <td><input type="radio" name="Support2" value="very-good"></td>
        <td><input type="radio" name="Support2" value="good"></td>
        <td><input type="radio" name="Support2" value="average"></td>
        <td><input type="radio" name="Support2" value="below-average"></td>
      </tr>
      <tr>
        <td>3)Counseling helped in assessing learning level of students, leading to customized attention to needy students. </td>
        <td><input type="radio" name="Support3" value="excellent"></td>
        <td><input type="radio" name="Support3" value="very-good"></td>
        <td><input type="radio" name="Support3" value="good"></td>
        <td><input type="radio" name="Support3" value="average"></td>
        <td><input type="radio" name="Support3" value="below-average"></td>
      </tr>
      <tr>
        <td>4)Institution encourages and provides support to participate in national and international events.</td>
        <td><input type="radio" name="Support4" value="excellent"></td>
        <td><input type="radio" name="Support4" value="very-good"></td>
        <td><input type="radio" name="Support4" value="good"></td>
        <td><input type="radio" name="Support4" value="average"></td>
        <td><input type="radio" name="Support4" value="below-average"></td>
      </tr>
      <tr>
        <td>5)Capacity development and skills enhancement activities are organized regularly.</td>
        <td><input type="radio" name="Support5" value="excellent"></td>
        <td><input type="radio" name="Support5" value="very-good"></td>
        <td><input type="radio" name="Support5" value="good"></td>
        <td><input type="radio" name="Support5" value="average"></td>
        <td><input type="radio" name="Support6" value="below-average"></td>
      </tr>
      <tr>
        <td>6)Adequate support is provided by Career Development and Placement Cell (CDPC). </td>
        <td><input type="radio" name="Support6" value="excellent"></td>
        <td><input type="radio" name="Support6" value="very-good"></td>
        <td><input type="radio" name="Support6" value="good"></td>
        <td><input type="radio" name="Support6" value="average"></td>
        <td><input type="radio" name="Support6" value="below-average"></td>
      </tr>
    </table>
    <!--############# GOVERNANCE AND LEADERSHIP ################ -->
    <h2>Governance and Leadership  *</h2>
    <table>
      <tr>
        <th></th>
        <th>Excellent</th>
        <th>Very Good</th>
        <th>Good</th>
        <th>Average</th>
        <th>Below Average</th>
      </tr>
      <tr>
        <td>1)The effective and transparent leadership is reflected in various institutional policies/ practices. </td>
        <td><input type="radio" name="Governance1" value="excellent"></td>
        <td><input type="radio" name="Governance1" value="very-good"></td>
        <td><input type="radio" name="Governance1" value="good"></td>
        <td><input type="radio" name="Governance1" value="average"></td>
        <td><input type="radio" name="Governance1" value="below-average"></td>
      </tr>
      <tr>
        <td>2)Management of Institution follows “Equal Opportunity” for all. </td>
        <td><input type="radio" name="Governance2" value="excellent"></td>
        <td><input type="radio" name="Governance2" value="very-good"></td>
        <td><input type="radio" name="Governance2" value="good"></td>
        <td><input type="radio" name="Governance2" value="average"></td>
        <td><input type="radio" name="Governance3" value="below-average"></td>
      </tr>
      <tr>
        <td>3)Institute felicitates achievement of students through various modes. </td>
        <td><input type="radio" name="Governance3" value="excellent"></td>
        <td><input type="radio" name="Governance3" value="very-good"></td>
        <td><input type="radio" name="Governance3" value="good"></td>
        <td><input type="radio" name="Governance3" value="average"></td>
        <td><input type="radio" name="Governance3" value="below-average"></td>
      </tr>
    </table>
    <div class="input-group">
      <label class="label" for="remarks">Remarks</label>
      <textarea class="remarks-box" id="remarks" name="remarks" placeholder="Your suggestions are welcome."></textarea>
    </div>
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