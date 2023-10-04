<?php
include('config.php');
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM questions WHERE question_id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "deleted successfully";
        header('location:new.php');
    }
    else{
        die(mysqli_error($conn));
    }
}

?>
