<?php
include('includes/header.php');

?>
<div class="container">
  <div class="row">
    <div class="col-md-0"></div>
    <div class="col-md-7">

      <div class="card-body">

        <div align="center" class="card-header">
          <H3>Registration Form</h3>
        </div>
        <div class="table-responsive">
          <form action="code.php" method="POST">

            <div class="form-row mb-4">
              <div class="form-group">
                <label> <strong>Organization Name</strong></label>
                <input type="text" name="username" class="form-control" placeholder="i.e Shule Academy">
              </div>
              <div class="form-group">
                <label> First Name </label>
                <input type="text" name="username" class="form-control" placeholder="i.e Samuel">
              </div>
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="email" name="email" class="form-control" placeholder="i.e Jane">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Valid Email">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="email" name="email" class="form-control" placeholder="Mobile No. 2547xxxxxxx">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>



            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="registerbtn" class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>



      </div>
    </div>
    <div class="col-md-5">

      <div class="table-responsive">
        <!-- Card Dark -->
        <div class="card">

          <!-- Card image -->
          <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg" alt="Card image cap">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <!-- Card content -->
          <div class="card-body elegant-color white-text rounded-bottom">

            <!-- Social shares button -->
            <a class="activator waves-effect mr-4"><i class="fas fa-share-alt white-text"></i></a>
            <!-- Title -->
            <h4 class="card-title">Card title</h4>
            <hr class="hr-light">
            <!-- Text -->
            <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk
              of the card's content.</p>
            <!-- Link -->
            <a href="#!" class="white-text d-flex justify-content-end">
              <h5>Read more <i class="fas fa-angle-double-right"></i></h5>
            </a>

          </div>

        </div>
        <!-- Card Dark -->
      </div>

    </div>
  </div>
</div>


<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>