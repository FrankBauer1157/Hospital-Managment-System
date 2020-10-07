<?php
session_start();
include('includes/security.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/config.php');

//require('includes/config.php');

?>
<div class="modal fade" id="discharge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Patients Discharge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Select Patient ID </label>
                        <select name="Pid" required class="browser-default custom-select custom-select-md mb-3">
                            <option selected value="#">Choose Patient Below</option>
                            <?php
                            //$connection = mysqli_connect("localhost", "root", "", "angelo");
                            $sql = "SELECT * from reception where  Status = '4'";
                            $query_run = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                                    <option value=" <?php echo $row['Pid']; ?>"> <?php echo $row['Fname']; ?> <?php echo $row['Lname']; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select></div>

                   

                </div>
                <div class="modal-footer">
                    <button type="submit" name="discharge" class="btn btn-primary">Discharge</button>

                </div>
            </form>

        </div>
    </div>
</div>
<hr>
<div>
<button type="button" class="btn btn-warning btn-rounded" data-toggle="modal" data-target="#discharge">
       Discharge Patient
    </button>
  
  <hr>
</div>
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="col-4">
        <h6 class="m-0 font-weight-bold text-primary">
         
        </h6>
      </div>
    </div>

    <div class="card-body">

      <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Alert</strong> <?php echo ":" . $_SESSION['success'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php

        unset($_SESSION['success']);
      } else {
      }


      ?>
      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>ID</th>
              <th>First Name</th>
              <th>Remarks</th>
              <th>Check In</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $u = $_SESSION['orgid'];
            //$connection = mysqli_connect("localhost", "root", "", "angelo");
            $sql = "SELECT * from reception where Status ='4' ";
            $query_run = mysqli_query($connection, $sql);
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {


            ?>
                <tr>

                  <td><a href="#" class="text-info"><?php echo $row['Pid']; ?></a></td>
                  <td> <?php echo $row['Fname']; ?></td>
                  <td> <?php echo $row['remarks']; ?></td>
                 
                  <td> <a href="#" class="badge badge-primary"><?php echo $row['Date']; ?></a></td>

                  </form>

                  </td>

                </tr>
            <?php
              }
            } else {
              $_SESSION['success'] = "";
            }


            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
//include('includes/scripts.php');
include('includes/footer.php');
?>