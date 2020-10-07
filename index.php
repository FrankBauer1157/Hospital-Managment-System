<?php
session_start();
include('includes/security.php');
$_SESSION['page'] = "#StaySafe";
include('includes/header.php');
include('includes/navbar.php');
require('includes/config.php');
?>


<!-- Begin Page Content -->
<div class="container">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>Dero Online Clinic</strong>
    </h1>
   </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-l font-weight-bold text-primary text-uppercase mb-1">New Patients</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                //
                $sql = "SELECT count(id) as tot from reception where DATE(Date) = CURDATE() "; //and date = '$ud'";
                $query_run = mysqli_query($connection, $sql);
                if (mysqli_num_rows($query_run) > 0) {
                  while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                    <h4><?php echo $row['tot'] ?></h4>
                <?php
                  }
                }
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard-teacher"></i>
              <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-l font-weight-bold text-success text-uppercase mb-1">Active Patients</div>
              <?php
              //
              $sql = "SELECT count(id) as tot from reception where `status` = '0' "; //and date = '$ud'";
              $query_run = mysqli_query($connection, $sql);
              if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['tot'] ?></div>
              <?php
                }
              }
              ?>
            </div>
            <div class="col-auto">

              <i class="fas fa-chart-line fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-l font-weight-bold text-info text-uppercase mb-1">Lab Que</div>
              <?php
              //
              $sql = "SELECT count(ID) as tot from lab where `status` = '1' "; //and date = '$ud'";
              $query_run = mysqli_query($connection, $sql);
              if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['tot'] ?></div>
              <?php
                }
              }
              ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-chart-line-list fa-2x text-info-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class=" font-weight-bold text-danger text-uppercase mb-2">Discharge Que</div>
              <?php
              //
              $sql = "SELECT count(id) as tot from reception where `Status` = '4' "; //and date = '$ud'";
              $query_run = mysqli_query($connection, $sql);
              if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['tot'] ?></div>
              <?php
                }
              }
              ?>


            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <!-- Content Row -->
  <div class="container">
    <div class="row">
      

      <div class="col-md-12">
        <div class="table-responsive">
          <h1 class="h3 mb-0 text-warning" align ="center">Active Patients Tracker</h1>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="blue lighten-4">
              <tr>

                <th>Patient Id</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Room</th>

              </tr>
            </thead>
            <tbody>
              <?php
              //$connection = mysqli_connect("localhost", "root", "", "angelo");
              $sql = "SELECT * from reception where Status = '0'";
              $query_run = mysqli_query($connection, $sql);
              if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
                  <tr>
                    <td> <a href="#"><?php echo $row['Pid']; ?></a></td>
                    <td><a class=" text-info"><?php echo $row['Fname']; ?></a></td>
                    <td><a class=" text-info"><?php echo $row['Lname']; ?></a></td>

                    <td> <a href="#" class="badge badge-primary"><?php echo $row['Visit']; ?></a></td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <hr>

    </div>
  </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>