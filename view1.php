<!--SELECT THE YEAR YOU WANT TO SEE THE DATA OF-->
<?php
@include 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

if(!isset($_SESSION['admin_name'])){
  header('location:login.php');
}


// Function to fetch available academic years from the database
function getAvailableAcademicYears() {
    $conn = mysqli_connect('localhost', 'root', '1234', 'data');
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
  
    $sql = "SELECT DISTINCT year FROM addque";
    $result = mysqli_query($conn, $sql);
    $academicYears = [];
  
    if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $academicYears[] = $row['year'];
      }
    }
  
    mysqli_close($conn);
  
    return $academicYears;
  }
  $academicYears = getAvailableAcademicYears();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Year Selection</title>
    <style>
        body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f3f3f3;
      transition: background-color 0.3s, color 0.3s;

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
        max-width: 200px;
      margin-bottom: 5px;
      height: 40px;
      margin-top: 5px;
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
      background-color: #155983;
      color: #fff;
    }
   
/* Year selection title */
.year-selection h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #fff; /* Set the title color to match dark mode */
}

/* Year display and buttons */
.year-select {
    font-size: 18px;
}

/* Year navigation buttons */
.year-select button {
    background-color: #155983; /* Set button background color to match dark mode */
    color: #fff; /* Set button text color to match dark mode */
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    margin: 0 5px;
    cursor: pointer;
    font-size: 20px;
    height: 50px;
    width: 50px;
}

/* Done button */
#done-button {
    background-color: #155983; /* Set button background color to match dark mode */
    color: #fff; /* Set button text color to match dark mode */
    border: none;
    border-radius: 5px;
    padding: 10px 40px;
    font-size: 18px;
    cursor: pointer;
    margin-top: 20px;
}

/* Year range color */
#yearSpan {
    color: #fff; /* Set the year range color to match dark mode */
}


/* Center the year selector content */
.year-selection {
    text-align: center;
    background-color: #12232E; /* Match the dark mode background color */
    padding: 20px;
    margin: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
 
 </style>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="header" id="header">
        <div class="logo-container">
          <img class="logo" src="CHLOGO.jpg" alt="Company Logo">
        </div>
    
        <div class="user-info">
          <img class="user-pic" src="images.jpeg" alt="User Pic">
          <div class="admin-name">  <?php echo $_SESSION['admin_name']; ?></div>
        </div>
    
        <button class="dark-mode-button" id="darkModeButton">
          <svg class="dark-mode-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 0c-6.628 0-12 5.373-12 12s5.372 12 12 12 12-5.373 12-12-5.372-12-12-12zm0 22c-5.512 0-10-4.488-10-10s4.488-10 10-10 10 4.488 10 10-4.488 10-10 10zm4-8c.733 0 1.454-.089 2.142-.259.286-.058.494-.311.494-.605v-1.272c0-.294-.208-.547-.494-.605-.688-.17-1.409-.259-2.142-.259-1.308 0-2.554.421-3.583 1.198-.329.252-.4.724-.147 1.053s.723.4 1.052.147c.646-.494 1.399-.745 2.177-.745s1.531.251 2.177.745c.329.252.801.182 1.052-.147s.182-.801-.147-1.053c-1.03-.777-2.275-1.198-3.583-1.198-1.967 0-3.744 1.275-4.349 3.168-.101.33.144.663.474.765.054.017.108.025.161.025.279 0 .542-.171.64-.452.613-2.005 2.472-3.506 4.664-3.506 2.24 0 4.115 1.53 4.637 3.584.056.31.297.537.603.575.051.006.102.009.152.009z"/>
          </svg>
        </button>
    
        <button class="logout-button" id="logoutButton">Logout</button>
      </div>
</div>

<!-- Year selection -->
<form action="view.php" method="GET">
    <div class="year-selection" id="yearSelection">
      <h1>Select Academic Year</h1>
      <div class="year-select">
      <select name="academicYear" id="academicYear" style="width: 200px; font-size: 18px;">
          <?php foreach ($academicYears as $year) : ?>
            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" id="done-button">Done</button>
    </div>
  </form>
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

   // Year selection logic
const yearSpan = document.getElementById('yearSpan');
const prevYearButton = document.getElementById('prevYear');
const nextYearButton = document.getElementById('nextYear');
let startYear = 2022;
let intervalId;

function updateYearSpan() {
    const endYear = (startYear % 100) + 1; // Get the last two digits of startYear and add 1
    yearSpan.textContent = `${startYear}-${endYear}`;
}
prevYearButton.addEventListener('mousedown', () => {
    if (startYear > 2022) { // Ensure the year does not go back before 2000
        startYear -= 1;
        updateYearSpan();
        intervalId = setInterval(() => {
            if (startYear > 2020) {
                startYear -= 1;
                updateYearSpan();
            }
        }, 200); // Change the year every 200 milliseconds
    }
});

nextYearButton.addEventListener('mousedown', () => {
    startYear += 1;
    updateYearSpan();
    intervalId = setInterval(() => {
        startYear += 1;
        updateYearSpan();
    }, 200); // Change the year every 200 milliseconds
});

// Stop changing the year when the mouse button is released
document.addEventListener('mouseup', () => {
    clearInterval(intervalId);
});

function handleDone() {
    // Hide the current content (year selection)
    const yearSelection = document.getElementById('yearSelection');
    yearSelection.style.display = 'none';

    const header = document.getElementById('header');
    header.style.display = 'none';


    // Display the new content (loaded from "newpage.html")
    const newContent = document.getElementById('newContent');
    newContent.style.display = 'block';

    $(newContent).load('view.php');
    
}

// Attach click event to the "Done" button
const doneButton = document.getElementById('done-button');
doneButton.addEventListener('click', handleDone);

</script>
</body>
</html>