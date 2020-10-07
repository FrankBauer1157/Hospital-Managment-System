<?php
session_start();
//include('includes/security.php');
include('includes/header.php');

?>



<div class="container">
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-7">
      <div class="card">
        <form class="text-center border border-light p-5" action="code.php" method="POST">
          <p class="h4 mb-4"><SPAN STYLE="color: green; ">Sign up </span> to send free sms*</p>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
            if (!isset($_SESSION['regsuccess'])) {
                echo "Please sigup Below";
            } else {
                echo $_SESSION['regsuccess'];
                unset ($_SESSION['regsuccess']);
            } ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
          <div class="form-group">
            <label> <strong>Organization Name</strong></label>
            <input type="text" name="orgname" required class="form-control" placeholder="Shule Academy">
          </div>
          <div class="form-row mb-4">
            <div class="col">
              <!-- First name -->
              <div class="form-group">
                <label> <strong>First Name</strong> </label>
                <input type="text" name="fname" required class="form-control" placeholder="Samuel">
              </div>
              <div class="form-group">

                <label> <strong>Last Name</strong></label>
                <input type="text" name="lname" required class="form-control" placeholder="Dedan">
              </div>
              <div class="form-group">
              <label><strong>Mobile Number</strong> </label>
                <input type="tel" name="tel" required class="form-control" placeholder="2547xxxxxxxx">
              

                  </div>

            </div>
            <div class="col">
              <!-- Last name -->
              <div class="form-group">
                <label><strong>Email</strong> </label>
                <input type="email" name="mail" class="form-control" required placeholder="Email">
              </div>

              <div class="form-group">
              <label><strong>Password</strong> </label>
                <input type="password" name="pword" required class="form-control">
           
            
            
            </div>
              <div class="form-group">
                <label><strong>Confirm Password</strong> </label>
                <input type="password" name="pword2" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="form-row mb-4">
            <div class="col">
              <div class="form-group">
                <button class="btn btn-info my-4 btn-block" name="registeruser" type="submit">Register</button>
              </div>
              <small class="form-text text-muted mb-4">
                If you already have account with us,simply login below
              </small>
              <div class="form-group">
                <a class="btn btn-info my-4 btn-block" title="If you already signed up click here to login" href="login.php">Login</a>
              </div>
            </div>
          </div>
          <hr>

          <!-- Terms of service -->
          <p>By clicking
            <em>Register</em> you agree to our
            <a href="#" target="_blank">Terms of service</a>

        </form>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
<?php
include('includes/scripts.php');
?>