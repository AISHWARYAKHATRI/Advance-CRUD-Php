<?php
include("connection.php");

$n = $_GET['n'];
$i = $_GET['i'];
$d = $_GET['d'];
$newDate = date("Y-m-d", strtotime($d));    
$g = $_GET['g'];
$e = $_GET['e'];
$c = $_GET['c'];
$h = $_GET['h'];
// echo $h;
$h1 = explode(", ", "$h");
// echo $h1;
if(isset($_POST['submit'])){
    
    $id = $_GET['rn'];
    $name = $_POST['name'];
    $img = $_FILES['img'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $college = $_POST['college'];
    $hobbies = $_POST['languages'];
    
    

    $chkstr = implode(", ",$hobbies);

    $filename = $img['name'];
    $fileerror = $img['error'];
    $filetmp = $img['tmp_name'];
    $fileext = explode('.', $filename); // filename "!.jpeg" ! and jpeg separated
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('png', 'jpg', 'jpeg');

    if($filename == ""){
        $query = "SELECT `id`, `image` FROM `form`.`registration` WHERE id = $id";
        $result = $conn->query($query);
        $imageName = $result->fetch_assoc();
        $destfile = $imageName['image'];
      }else{
        $filepath = $img['tmp_name'];
        $fileerror = $img['error'];
        $newImageName = $filename;
        if($fileerror == 0){
            $destfile = 'upload/'.$filename;
            move_uploaded_file($filepath,$destfile);
        }
      }
      
      $sql = "UPDATE `form`.`registration` SET `id`='$id',
        `name`='$name', `image`='$destfile', `dob`='$dob',
        `gender`='$gender', `email`='$email', `college`='$college',`languages`='$chkstr' WHERE `id` = '$id'";

$conn->query($sql);

header('location:display.php?d=1');
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Updation Form</title>
    <!-- MDB icon -->
    <link rel="icon" href="" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />

    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- Start your project here-->
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100" style="">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Form Updation</h3>
                <img src="<?php echo $i?>" style="position: relative;right: -500px; top: -80px; border-radius: 5px;"  id="blah" width=150 height=auto>
            <button class="btn btn-secondary" id="unload" style="position:absolute; z-index: 99;right: 50px; top: 50px; text-align: center; border-radius: px; width: 15px;">x</button>
                <form method="post" action="" enctype="multipart/form-data">
    
                  <div class="row">
                    <div class="col-md-6 mb-4">
    
                      <div class="form-outline">
                        <input type="text" value="<?php echo $n ?>" id="Name" name="name" class="form-control form-control-lg" />
                        <label class="form-label" for="firstName">Name</label>
                      </div>
    
                    </div>
                    <div class="col-md-6 mb-4">
    
                      <div class="form-outline">
                        <input type="file" value="" id="file" name="img" class="form-control form-control-lg" onchange="preview()"/>
                        <label class="form-label" for="lastName"></label>
                      </div>
    
                    </div>
                  </div>
    
                  <div class="row">
                    <div class="col-md-6 mb-4 d-flex align-items-center">
    
                      <div class="form-outline datepicker w-100">
                        <input type="date" value="<?php echo $newDate ?>" class="form-control form-control-lg" name="dob" id="birthdayDate" />
                        <label for="birthdayDate" class="form-label">Birthday</label>
                      </div>
    
                    </div>
                    <div class="col-md-6 mb-4">
    
                      <h6 class="mb-2 pb-1">Gender: </h6>
    
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female"  
                          value="female" <?php if($g != "Male") echo "checked";?>/>
                        <label class="form-check-label" for="femaleGender">Female</label>
                      </div>
    
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" <?php if($g != "Female") echo "checked";?>
                           value="male" />
                        <label class="form-check-label" for="maleGender">Male</label>
                    </div>
    
                    </div>
                  </div>
    
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">
    
                      <div class="form-outline">
                        <input type="email" id="emailAddress" value="<?php echo $e?>" name="email" class="form-control form-control-lg" />
                        <label class="form-label" for="emailAddress">Email</label>
                      </div>
    
                    </div>
                    <div class="col-md-6 mb-4 pb-2">
    
                      <div class="form-outline">
                        <input type="text" id="college" value="<?php echo $c?>" name="college" class="form-control form-control-lg" />
                        <label class="form-label" for="phoneNumber">College/University</label>
                      </div>
    
                    </div>
                  </div>
    
                  <div class="row">
                    <div class="col-12">
    
                    <div>
                        <label for="languages">Languages Known:</label>
                        <input type="checkbox" id="languages" class="chkbox" <?php if(in_array("Java", $h1)){echo "checked";}?> value="Java" name="languages[]" /> Java
                        <input type="checkbox" id="languages" class="chkbox" <?php if(in_array("Javascript", $h1)){echo "checked";}?> value="Javascript" name="languages[]"/>Javascript
                        <input type="checkbox" id="languages" class="chkbox" <?php if(in_array("C", $h1)){echo "checked";}?> value="C" name="languages[]"/> C
                        <input type="checkbox" id="languages" class="chkbox" <?php if(in_array("Python", $h1)){echo "checked";}?> value="Python" name="languages[]"/> Python
                      </div>
    
                    </div>
                  </div>
  
                  <div class="d-flex justify-content-between">
                  <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" <?php $display = 1 ?> />
                  </div>

                  <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" type="submit" name="submit" id="back" value="Back" />
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript">
      var unload = document.getElementById("unload");
        function preview() {
        blah.src=URL.createObjectURL(event.target.files[0]);
    }
    unload.addEventListener('click', e => {
            e.preventDefault();
            document.getElementById('blah').src = null;
            document.getElementById('rem').value = null;
        });

        var back = document.getElementById('back');
        back.addEventListener('click', e => {
          window.location.replace('http://localhost/webcreta/advance%20crud%20php/Php%20CRUD/display.php');
        })
    </script>
  </body>
</html>





