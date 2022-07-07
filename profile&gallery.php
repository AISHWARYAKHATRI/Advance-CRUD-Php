<?php 
include('connection.php');

$id = $_GET['rn'];
$n = $_GET['n'];
$i = $_GET['i'];
$d = $_GET['d'];
// $newDate = date('Y-m-d', strtotime($d));
$g = $_GET['g'];
$e = $_GET['e'];
$c = $_GET['c'];
$h = $_GET['h'];
// $h1 = explode(', ', $h);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
  rel="stylesheet"
/>
    <title>Document</title>
</head>
<body>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <h1 class="text-center">Registered User Profile</h1>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo $i ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $n?></h5>
            <!-- <p class="text-muted mb-1">Full Stack Developer</p>
            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary" id="back">Back</button>
              <!-- <button type="button" class="btn btn-outline-primary ms-1">Message</button> -->
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $n ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $g ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Languages Known</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $h ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><p class="mb-0"><?php echo $e ?></p></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">College</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $c ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- IMAGE  GALLERY -->
<?php 
include('connection.php');

$sql = "SELECT `images` FROM `form`.`multiple_images_upload` WHERE `registration_id_fk` = $id";
$result = $conn->query($sql);

if($result->num_rows > 0){ ?>
  <div class="container">

  <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Your Gallery</h1>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-start">

  <?php while($row = $result->fetch_assoc()){ ?>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail" src="<?php echo $row['images'] ?>" alt="">
      </a>
    </div>
    <?php } ?>
    </div>

</div>


<?php } ?>

<section class="">
  <!-- Section: Images -->
  <section class="">
    <!--  -->
  <!-- Section: Modals -->
</section>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
  <script>
    var back = document.getElementById('back');
    back.addEventListener('click', e => {
        window.location.replace('http://localhost/webcreta/advance%20crud%20php/Php%20CRUD/display.php');
    })
  </script>
</body>
</html>