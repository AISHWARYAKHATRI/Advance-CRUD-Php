<?php 
include('connection.php');
        if(isset($_POST['delete'])){
          
          if(!isset($_POST['check'])){
                echo "<script>alert('No Records Selected!'); window.location.replace('http://localhost/webcreta/advance%20crud%20php/Php%20CRUD/display.php'); 
                </script>";
        }
        else{
          $all_id = $_POST['check'];
          $extract_id = implode(',', $all_id);
          $delquery = "DELETE FROM `form`.`registration` WHERE `id` IN($extract_id)";
          $conn->query($delquery);
          header('location: display.php');
        }
}
?>