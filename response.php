<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    </head>
<body>
<?php 
include("connection.php");
if(isset($_POST['submit'])){
$name = $_POST['name'];
$img = $_FILES['img'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$languages = $_POST['languages'];

$filename = $img['name'][0];
$fileerror = $img['error'][0];
$filetmp = $img['tmp_name'][0];
$fileext = explode('.', $filename); // filename "!.jpeg" ! and jpeg separated
$filecheck = strtolower(end($fileext));
$fileextstored = array('png', 'jpg', 'jpeg');

if($name != ""  && $dob != "" && $gender != "" && $email != "" && $college != "" && $languages != ""){
// CHECKBOX FIELD
$chkstr = implode(", ",$languages);  // checkbox array converted to string separated by comma and this has to be stored in database
// echo "$chkstr<br>";

// IMAGE FILE FIELD
// print_r($img);

if(in_array($filecheck, $fileextstored)){
    $destfile = 'upload/'.$filename;
    move_uploaded_file($filetmp, $destfile); // move file from source to the dest folder
    
        $sql = "INSERT INTO `form`.`registration` (`name`, `image`, `dob`, `gender`, `languages`, `college`, `email`, `dt`) VALUES ('$name', '$destfile', '$dob', '$gender', '$chkstr', '$college', '$email', current_timestamp())";

        if($conn->query($sql) === TRUE){ ?>
            <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>Your response has been submitted successfully;<br/> we'll be in touch shortly!</p>
        <a href="./display.php" class="btn btn-primary">Display Responses</a>
        <a href="./index1.php" class="btn btn-primary">Back</a>
      </div>
        <?php }else{
            echo "Error: ".$sql."<br>".$conn->error;
        }
        // echo $sql; 
        $sql1 = "SELECT `id` FROM `form`.`registration` WHERE `registration`.`name`= '$name' AND `registration`.`email`= '$email'";
        $result = $conn->query($sql1);
        $row = $result->fetch_assoc();
        $id = $row['id'];
        // echo $id;

        forEach($_FILES['img']['name'] as $key=>$val){
          $file = 'upload/'.$val;
          move_uploaded_file($_FILES['img']['tmp_name'][$key], $file);
          $sql2 = "INSERT INTO `form`.`multiple_images_upload`(`registration_id_fk`, `images`) VALUES($id, '$file')";
          $data = $conn->query($sql2);
          if($data){
            echo "<br>Image uploaded.<br>";
          }
          else{
            echo "Failed to upload";
          }
        }
    }
} else{ ?>
    <script>alert("Please fill all details!");
    window.location.replace('http://localhost/webcreta/advance%20crud%20php/Php%20CRUD/index1.php'); 
    </script>
<?php
}
}?>

</body>
</html>