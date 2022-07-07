<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Registration Form</title>
    <!-- MDB icon -->
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
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
              <div class="card-body p-4 p-md-5">
                <div class="d-flex">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                </div>
                <img src="#" style="position: relative;right: -500px; top: -80px; border-radius: 5px;" id="blah" width=150 height=auto>
                <button class="btn btn-secondary" id="unload" style="position:absolute; z-index: 99;right: 50px; top: 50px; text-align: center;">x</button>
                <form action="./response.php" method="post" enctype="multipart/form-data">
    
                  <div class="row">
                    <div class="col-md-6 mb-4">
    
                      <div class="form-outline">
                        <input type="text" value="" id="Name" name="name" class="form-control form-control-lg" />
                        <label class="form-label" for="firstName">Name</label>
                      </div>
    
                    </div>
                    <div class="col-md-6 mb-4">
    
                      <div class="form-outline">
                        <input type="file" value="" id="rem" name="img[]" onchange="preview()" class="form-control form-control-lg" multiple/>
                        <label class="form-label" for="image"></label>
                      </div>
                      <span class="text-dark">*upload 5 images</span>

                    </div>
                  </div>
    
                  <div class="row">
                    <div class="col-md-6 mb-4 d-flex align-items-center">
    
                      <div class="form-outline datepicker w-100">
                        <input type="date" value="" class="form-control form-control-lg" name="dob" id="birthdayDate" />
                        <label for="birthdayDate" class="form-label">Birthday</label>
                      </div>
    
                    </div>
                    <div class="col-md-6 mb-4">
    
                      <h6 class="mb-2 pb-1">Gender: </h6>
    
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female"
                          value="Female" checked />
                        <label class="form-check-label" for="femaleGender">Female</label>
                      </div>
    
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male"
                          value="Male" />
                        <label class="form-check-label" for="maleGender">Male</label>
                    </div>
    
                    </div>
                  </div>
    
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">
    
                      <div class="form-outline">
                        <input type="email" id="emailAddress" value="" name="email" class="form-control form-control-lg" />
                        <label class="form-label" for="emailAddress">Email</label>
                      </div>
    
                    </div>
                    <div class="col-md-6 mb-4 pb-2">
    
                      <div class="form-outline">
                        <input type="text" id="college" value="" name="college" class="form-control form-control-lg" />
                        <label class="form-label" for="phoneNumber">College</label>
                      </div>
    
                    </div>
                  </div>
    
                  <div class="row">
                    <div class="col-12">
    
                    <div>
                        <label for="languages">Languages Known:</label>
                        <input type="checkbox" id="languages" class="chkbox" value="Java" name="languages[]" /> Java
                        <input type="checkbox" id="languages" class="chkbox" value="Javascript" name="languages[]"/> Javascript
                        <input type="checkbox" id="languages" class="chkbox" value="C" name="languages[]"/> C
                        <input type="checkbox" id="languages" class="chkbox" value="Python" name="languages[]"/> Python
                      </div>
    
                    </div>
                  </div>
    
                  <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" />
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
</script>
  </body>
</html>
