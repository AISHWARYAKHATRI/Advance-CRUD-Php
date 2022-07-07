<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
    <script src="https://kit.fontawesome.com/1e291dc247.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <style>
      .display{
        display: none;
      }
      .block{
        display: block;
      }
         body {
            min-height: 100vh;
            background-color: #FFE53B;
            background-image: linear-gradient(147deg, #FFE53B 0%, #FF2525 100%);
        }
        .center{
            margin-left: 1500px;
            text-align: center;
        }
        .hover{
          font-size: 20px;
        }
    </style>
</head>
<body>

<?php 
include 'connection.php';

$sql = "SELECT * FROM `form`.`registration`";

$result = $conn->query($sql);

$sql1 = "DELETE FROM `registration` WHERE `registration`.`id` = 1";
?>

<div class="container">
<div class="py-5" class="center">
  <header class="text-center text-white">
    <h1 class="display-4">Responses</h1>
    <div class="row">
      <div class="col">
        <!-- <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3"> -->

      <div id="display" class="display alert alert-success mt-4 alert-dismissible fade show" role="alert" <?php $display=0 ?>>
         <strong>Record Updated!</strong> Your data has been updated successfully.
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
     </div>
        <!-- </nav> -->
      </div>
    </div>

  </header>
 
  <div class="row py-5">
    <div class="mx-auto">
      <div class="rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded" class="center">
        <form action="./multipleDelete.php" method="post">
          <div class="my-3 float-left" style="margin-bottom: 5px;">
            <a href="./index1.php" class="btn btn-primary">Add New Record</a>
            <input class="btn btn-primary" type="submit" name="delete" onclick="return confirm('Are you sure to delete this?')" value="Delete">
          </div>
          <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead>
                <tr>
                <th><input type="checkbox" id="select_all" onchange="checkAll(this)"></th>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Email</th>
                <th>College</th>
                <th>Languages Known</th>
                <th>Action(s)</th>
                </tr>
              </thead>
              <tbody>
              <?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><input type="checkbox" name="check[]" value="<?php echo $row['id']?>"></td>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['name']?></td>
            <td><img src="<?php echo $row['image']?>" height="100px" width="100px"></td>
            <td><?php echo $row['dob']?></td>
            <td><?php echo $row['gender']?></td>
            <td style="white-space: normal"><?php echo $row['languages']?></td>
            <td><?php echo $row['college']?></td>
            <td style="white-space: normal"><?php echo $row['email']?>
            <td style="white-space: nowrap"><a href="profile&gallery.php?rn=<?php echo $row['id']?>&n=<?php echo $row['name']?>&i=<?php echo $row['image']?>&d=<?php echo $row['dob']?>&g=<?php echo $row['gender']?>&e=<?php echo $row['email']?>&c=<?php echo $row['college']?>&h=<?php echo $row['languages']?>"><img class="hover" src="./icons/icons8-eye-100.png" alt="" width= "40" height="auto"></a>
            <a class="a-u" href = "update.php?rn=<?php echo $row['id']?>&n=<?php echo $row['name']?>&i=<?php echo $row['image']?>&d=<?php echo $row['dob']?>&g=<?php echo $row['gender']?>&e=<?php echo $row['email']?>&c=<?php echo $row['college']?>&h=<?php echo $row['languages']?>"><img src="./icons/icons8-edit-32.png" alt=""></a>
            <a href="delete.php?rn=<?php echo $row['id']?>" onclick="return confirm('are you sure to delete this')" class="a-d"><img src="./icons/icons8-delete-32.png"></a></td>
        </tr>
   <?php  
   }

} ?>
             </tbody>
            </table>
          </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>
</div>
</div>

</body>

<!-- SCRIPT FOR DISPLAYING UPDATING RECORD SUCCESSFULLY -->

<script>
  const queryString = window.location.search;
  // console.log(queryString);
  const urlParams = new URLSearchParams(queryString);
  // console.log(urlParams);
  const d = urlParams.get('d');
  // console.log(d);
  if(d == 1){
    var display = document.getElementById('display');
    console.log('display');
    display.classList.remove('display');
    display.classList.add('block');
  }
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src=" https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       <script> $(document).ready(function () {
            $('#example').DataTable();
        });
        </script> 
    </script>
    <!-- SCRIPT FOR CHECKING ALL CHECKBOXES -->
    <script>
      var checkboxes = document.querySelectorAll("input[type = 'checkbox']");
      // console.log(checkboxes);
      function checkAll(myCheckbox){
        if(myCheckbox.checked == true){
          checkboxes.forEach(function(checkbox){
            checkbox.checked = true;
          });
        }
        else{
          checkboxes.forEach(function(checkbox){
          checkbox.checked = false;
          });
        }
      }
    </script>
  </html>




