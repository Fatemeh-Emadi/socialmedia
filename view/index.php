<?php include "header.php";

?>

<div class="container">
  <div class="row justify-content-center mt-5">

    <div class="col-lg-5 col-md-10 col-sm-10 col-10 ">
      <div class="card border-0 shadow rounded-3 ">


        
      <div class="card-body">
          <form method="post" action="">
            <div class="mb-3">
              <label class="form-label ">Username</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
              <label class="form-label ">Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label " for="exampleCheck1">Remember me</label>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
            </div>
          </form>
          <a href="#">
            <p class="text-center fs-6">
             Forgot your password?

            </p>
          </a>
          <hr>
          <!-- Button trigger modal -->
          <center>
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width:50%;">
            Sign Up
          </button>
          </center>
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="row g-3 needs-validation" novalidate action="../controller/register.php" method="post">
                    <div class="col-md-4">
                      <label for="validationCustom01" class="form-label">First name</label>
                      <input type="text" class="form-control" id="validationCustom01" name="fname" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="validationCustom02" class="form-label">Last name</label>
                      <input type="text" class="form-control" id="validationCustom02" name="lname" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="validationCustomUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="username" required>
                        <div class="invalid-feedback">
                          Please choose a username.
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Phone </label>
                      <input type="text" class="form-control" placeholder="0915xxxxxxx" name="phone">
                    </div>
                    <label for="inputPassword" class="col-sm col-form-label">Password</label>
                    <div class="mb-3 row">

                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="password">
                      </div>
                    </div>
                    <label for="inputPassword" class="col-sm col-form-label">Confirm Password</label>
                    <div class="mb-3 row">

                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="confirmpass">
                      </div>
                    </div>
                    <div class="col-12 mb-3">
                    <h3 hidden="hidden">From Date</h3>
                    <label for="inputPassword" class="col-form-label ">Birthday</label>
                    
                                                <div class="input-group">
                                                    <span id="dtp1" class="input-group-text cursor-pointer" data-mds-dtp-guid="f43a28f4-a501-4ed8-afe2-13879d016db3" data-bs-original-title="" title="" data-mds-dtp-group="group1" data-from-date="true"> <i class="fas fa-calendar"></i> </span>
                                                    <input type="text"  name="birthday" data-name="dtp1-text" class="form-control" placeholder="1400/01/01">
                                                </div>
                                               
               </div>
                <div class="col-md-3">
                  <label for="validationCustom04" class="form-label">Gender</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault1" value="male" name="gender" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                      male
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault2" value="female" name="gender">
                    <label class="form-check-label" for="flexRadioDefault2">
                      female
                    </label>
                  </div>
                  <div class="invalid-feedback">
                    Please select a valid gender.
                  </div>
                </div>


                <div class="col-12">
                  <input type="submit" class="btn btn-primary">
                </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>


</div>


<?php include "footer.php"; ?>