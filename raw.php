const logoutButton = document.getElementById('logoutButton');
logoutButton.addEventListener('click', handleLogout);

window.onload = function(){
  document.getElementById("download")
  .addEventListener("click", ()=>{
    const feedback = this.document.getElementById("feedback");

    console.log(feedback);
    console.log(window);
    var opt = {
      margin: 1,
      filename: 'myfeedback.pdf',
      image: {type: 'jpeg', quality: 0.98},
      jsPDF: {unit: 'in', orientation: 'landscape'}
    };
  
    html2pdf().from(feedback).set(opt).save();


  })
}

<a href="<?php echo $client->createAuthUrl(); ?>" class="google">
            <img src="google_logo.png" alt="Google Logo" class="google-logo"></a>
            <button class="google"><?php echo "<a href='" . $client->createAuthUrl() . "'>Login with Google</a>"; ?></button>
            </div>

const data = {
  labels: [
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};

const config = {
  type: 'pie',
  data: data,
};

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );






        $year = mysqli_real_escape_string($conn, $_POST['year']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_type = mysqli_real_escape_string($conn, $_SESSION['user_name']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

    // Initialize arrays to store question, response, and comment values
    $q1 = isset($_POST['q1']) ? mysqli_real_escape_string($conn, $_POST['q1']) : '';
    $r1 = isset($_POST['r1']) ? mysqli_real_escape_string($conn, $_POST['r1']) : '';
    $c1 = isset($_POST['c1']) ? mysqli_real_escape_string($conn, $_POST['c1']) : '';
    $q2 = isset($_POST['q2']) ? mysqli_real_escape_string($conn, $_POST['q2']) : '';
    $r2 = isset($_POST['r2']) ? mysqli_real_escape_string($conn, $_POST['r2']) : '';
    $c2 = isset($_POST['c2']) ? mysqli_real_escape_string($conn, $_POST['c2']) : '';
    $q3 = isset($_POST['q3']) ? mysqli_real_escape_string($conn, $_POST['q3']) : '';
    $r3 = isset($_POST['r3']) ? mysqli_real_escape_string($conn, $_POST['r3']) : '';
    $c3 = isset($_POST['c3']) ? mysqli_real_escape_string($conn, $_POST['c3']) : '';
    $q4 = isset($_POST['q4']) ? mysqli_real_escape_string($conn, $_POST['q4']) : '';
    $r4 = isset($_POST['r4']) ? mysqli_real_escape_string($conn, $_POST['r4']) : '';
    $c4 = isset($_POST['c4']) ? mysqli_real_escape_string($conn, $_POST['c4']) : '';
    $q5 = isset($_POST['q5']) ? mysqli_real_escape_string($conn, $_POST['q5']) : '';
    $r5 = isset($_POST['r5']) ? mysqli_real_escape_string($conn, $_POST['r5']) : '';
    $c5 = isset($_POST['c5']) ? mysqli_real_escape_string($conn, $_POST['c5']) : '';
    $q6 = isset($_POST['q6']) ? mysqli_real_escape_string($conn, $_POST['q6']) : '';
    $r6 = isset($_POST['r6']) ? mysqli_real_escape_string($conn, $_POST['r6']) : '';
    $c6 = isset($_POST['c6']) ? mysqli_real_escape_string($conn, $_POST['c6']) : '';
    $q7 = isset($_POST['q6']) ? mysqli_real_escape_string($conn, $_POST['q7']) : '';
    $r7 = isset($_POST['r6']) ? mysqli_real_escape_string($conn, $_POST['r7']) : '';
    $c7 = isset($_POST['c6']) ? mysqli_real_escape_string($conn, $_POST['c7']) : '';
    $q8 = isset($_POST['q8']) ? mysqli_real_escape_string($conn, $_POST['q8']) : '';
    $r8 = isset($_POST['r8']) ? mysqli_real_escape_string($conn, $_POST['r8']) : '';
    $c8 = isset($_POST['c8']) ? mysqli_real_escape_string($conn, $_POST['c8']) : '';
    $q9 = isset($_POST['q9']) ? mysqli_real_escape_string($conn, $_POST['q9']) : '';
    $r9 = isset($_POST['r9']) ? mysqli_real_escape_string($conn, $_POST['r9']) : '';
    $c9 = isset($_POST['c9']) ? mysqli_real_escape_string($conn, $_POST['c9']) : '';
    $q10 = isset($_POST['q10']) ? mysqli_real_escape_string($conn, $_POST['q10']) : '';
    $r10 = isset($_POST['r10']) ? mysqli_real_escape_string($conn, $_POST['r10']) : '';
    $c10 = isset($_POST['c10']) ? mysqli_real_escape_string($conn, $_POST['c10']) : '';
    $q11 = isset($_POST['q11']) ? mysqli_real_escape_string($conn, $_POST['q11']) : '';
    $r11 = isset($_POST['r11']) ? mysqli_real_escape_string($conn, $_POST['r11']) : '';
    $c11 = isset($_POST['c11']) ? mysqli_real_escape_string($conn, $_POST['c11']) : '';
    $q12 = isset($_POST['q12']) ? mysqli_real_escape_string($conn, $_POST['q12']) : '';
    $r12 = isset($_POST['r12']) ? mysqli_real_escape_string($conn, $_POST['r12']) : '';
    $c12 = isset($_POST['c12']) ? mysqli_real_escape_string($conn, $_POST['c12']) : '';
    $q13 = isset($_POST['q13']) ? mysqli_real_escape_string($conn, $_POST['q13']) : '';
    $r13 = isset($_POST['r13']) ? mysqli_real_escape_string($conn, $_POST['r13']) : '';
    $c13 = isset($_POST['c13']) ? mysqli_real_escape_string($conn, $_POST['c13']) : '';
    $q14 = isset($_POST['q14']) ? mysqli_real_escape_string($conn, $_POST['q14']) : '';
    $r14 = isset($_POST['r14']) ? mysqli_real_escape_string($conn, $_POST['r14']) : '';
    $c14 = isset($_POST['c14']) ? mysqli_real_escape_string($conn, $_POST['c14']) : '';
    $q15 = isset($_POST['q15']) ? mysqli_real_escape_string($conn, $_POST['q15']) : '';
    $r15 = isset($_POST['r15']) ? mysqli_real_escape_string($conn, $_POST['r15']) : '';
    $c15 = isset($_POST['c15']) ? mysqli_real_escape_string($conn, $_POST['c15']) : '';
    $q16 = isset($_POST['q16']) ? mysqli_real_escape_string($conn, $_POST['q16']) : '';
    $r16 = isset($_POST['r16']) ? mysqli_real_escape_string($conn, $_POST['r16']) : '';
    $c16 = isset($_POST['c16']) ? mysqli_real_escape_string($conn, $_POST['c16']) : '';
    $q17 = isset($_POST['q17']) ? mysqli_real_escape_string($conn, $_POST['q17']) : '';
    $r17 = isset($_POST['r17']) ? mysqli_real_escape_string($conn, $_POST['r17']) : '';
    $c17 = isset($_POST['c17']) ? mysqli_real_escape_string($conn, $_POST['c17']) : '';
    $q18 = isset($_POST['q18']) ? mysqli_real_escape_string($conn, $_POST['q18']) : '';
    $r18 = isset($_POST['r18']) ? mysqli_real_escape_string($conn, $_POST['r18']) : '';
    $c18 = isset($_POST['c18']) ? mysqli_real_escape_string($conn, $_POST['c18']) : '';
    $q19 = isset($_POST['q19']) ? mysqli_real_escape_string($conn, $_POST['q19']) : '';
    $r19 = isset($_POST['r19']) ? mysqli_real_escape_string($conn, $_POST['r19']) : '';
    $c19 = isset($_POST['c19']) ? mysqli_real_escape_string($conn, $_POST['c19']) : '';
    $q20 = isset($_POST['q20']) ? mysqli_real_escape_string($conn, $_POST['c20']) : '';
    $r20 = isset($_POST['r20']) ? mysqli_real_escape_string($conn, $_POST['r20']) : '';
    $c20 = isset($_POST['c20']) ? mysqli_real_escape_string($conn, $_POST['c20']) : '';
    $q21 = isset($_POST['q21']) ? mysqli_real_escape_string($conn, $_POST['c21']) : '';
    $r21 = isset($_POST['r21']) ? mysqli_real_escape_string($conn, $_POST['r21']) : '';
    $c21 = isset($_POST['c21']) ? mysqli_real_escape_string($conn, $_POST['c21']) : '';
    $q22 = isset($_POST['q22']) ? mysqli_real_escape_string($conn, $_POST['c22']) : '';
    $r22 = isset($_POST['r22']) ? mysqli_real_escape_string($conn, $_POST['r22']) : '';
    $c22 = isset($_POST['c22']) ? mysqli_real_escape_string($conn, $_POST['c22']) : '';
    $q23 = isset($_POST['q23']) ? mysqli_real_escape_string($conn, $_POST['c23']) : '';
    $r23 = isset($_POST['r23']) ? mysqli_real_escape_string($conn, $_POST['r23']) : '';
    $c23 = isset($_POST['c23']) ? mysqli_real_escape_string($conn, $_POST['c23']) : '';
    $q24 = isset($_POST['q24']) ? mysqli_real_escape_string($conn, $_POST['c24']) : '';
    $r24 = isset($_POST['r24']) ? mysqli_real_escape_string($conn, $_POST['r24']) : '';
    $c24 = isset($_POST['c24']) ? mysqli_real_escape_string($conn, $_POST['c24']) : '';
    $q25 = isset($_POST['q25']) ? mysqli_real_escape_string($conn, $_POST['c25']) : '';
    $r25 = isset($_POST['r25']) ? mysqli_real_escape_string($conn, $_POST['r25']) : '';
    $c25 = isset($_POST['c25']) ? mysqli_real_escape_string($conn, $_POST['c25']) : '';
    $q26 = isset($_POST['q26']) ? mysqli_real_escape_string($conn, $_POST['c26']) : '';
    $r26 = isset($_POST['r26']) ? mysqli_real_escape_string($conn, $_POST['r26']) : '';
    $c26 = isset($_POST['c26']) ? mysqli_real_escape_string($conn, $_POST['c26']) : '';
    $q27 = isset($_POST['q27']) ? mysqli_real_escape_string($conn, $_POST['c27']) : '';
    $r27 = isset($_POST['r27']) ? mysqli_real_escape_string($conn, $_POST['r27']) : '';
    $c27 = isset($_POST['c27']) ? mysqli_real_escape_string($conn, $_POST['c27']) : '';
    $q28 = isset($_POST['q28']) ? mysqli_real_escape_string($conn, $_POST['c28']) : '';
    $r28 = isset($_POST['r28']) ? mysqli_real_escape_string($conn, $_POST['r28']) : '';
    $c28 = isset($_POST['c28']) ? mysqli_real_escape_string($conn, $_POST['c28']) : '';
    $q29 = isset($_POST['q29']) ? mysqli_real_escape_string($conn, $_POST['c29']) : '';
    $r29 = isset($_POST['r29']) ? mysqli_real_escape_string($conn, $_POST['r29']) : '';
    $c29 = isset($_POST['c29']) ? mysqli_real_escape_string($conn, $_POST['c29']) : '';
    
    

    // ... Repeat the above pattern for all form inputs ...

    // Construct your SQL query with proper column names and values
    $sql = "INSERT INTO `response`( year, name, email,`user_type`, `q1`, `r1`, `c1`, `q2`, `r2`, `c2`, `q3`,
     `r3`, `c3`, `q4`, `r4`, `c4`, `q5`, `r5`, `c5`, `q6`, `r6`, `c6`, `q7`, `r7`, `c7`, `q8`, `r8`, `c8`, `q9`, `r9`, `c9`, `q10`, `r10`, `c10`,
      `q11`, `r11`, `c11`, `q12`, `r12`, `c12`, `q13`, `r13`, `c13`, `q14`, `r14`, `c14`, `q15`, `r15`, `c15`, `q16`, `r16`, `c16`, `q17`, `r17`,
       `c17`, `q18`, `r18`, `c18`, `q19`, `r19`, `c19`, `q20`, `r20`, `c20`, `q21`, `r21`, `c21`, `q22`, `r22`, `c22`, `q23`, `r23`, `c23`, `q24`,
        `r24`, `c24`, `q25`, `r25`, `c25`, `q26`, `r26`, `c26`, `q27`, `r27`, `c27`, `q28`, `r28`, `c28`, `q29`, `r29`, `c29`, `remarks`) 
        VALUES ('$year','$name','$email','$user_type','$q1','$r1','$c1','$q2','$r2','$c2','$q3','$r3','$c3','$q4','$r4','$c4','$q5','$r5','$c5',
        '$q6','$r6','$c6','$q7','$r7','$c7','$q8','$r8','$c8','$q9','$r9','$c9','$q10','$r10','$c10',
        '$q11','$r11','$c11','$q12','$r12','$c12','$q13','$r13','$c13','$q14','$r14','$c14','$q15','$r15','$c15',
        '$q16','$r16','$c16','$q17','$r17',
        '$c17','$q18','$r18','$c18','$q19','$r19','$c19','$q20','$r20','$c20','$q21','$r21','$c21','$q22','$r22','$c22',
        '$q23','$r23','$c23','$q24',
        '$r24','$c24','$q25','$r25','$c25','$q26','$r26','$c26','$q27','$r27','$c27','$q28','$r28','$c28','$q29','$r29','$c29','$remarks')";
}