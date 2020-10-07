<?php
session_start();
include('includes/security.php');
$_SESSION['page'] = "Consultation Room";
include('includes/header.php');
include('includes/navbar.php');
require('includes/config.php');
//$ud = "Bauer";
//$_SESSION['title'] = "Reception Listx";
?>


<div class="modal fade" id="patientdesc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Patients For Lab Check</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Select Patient Name </label>
                        <select name="Pid" required class="browser-default custom-select custom-select-md mb-3">
                            <option selected value="#">Choose Patient Below</option>
                            <?php
                            //$connection = mysqli_connect("localhost", "root", "", "angelo");
                            $sql = "SELECT * from lab where status = '1'";
                            $query_run = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                                    <option value=" <?php echo $row['pid']; ?>"> <?php echo $row['pid']; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select></div>

                    <div class="form-group green-border-focus">
                        <label><strong> Labe Results</strong></label>
                        <textarea class="form-control" name="results" placeholder="Enter Results found" id="exampleFormControlTextarea5" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="sendtoco" class="btn btn-primary">Send to Doctor</button>
                 
                </div>
            </form>

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2"><a href="#">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-l font-weight-bold text-primary text-uppercase mb-1">Lab QUE</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    //
                                    $sql = "SELECT count(pid) as tot from lab where `status` = '1' "; //and date = '$ud'";
                                    $query_run = mysqli_query($connection, $sql);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                    ?>

                                            <h4><a href="#" class="badge badge-info"><?php echo $row['tot']; ?></a></h4>
                                    <?php
                                        }
                                    }else{
                                        ?>
                                        <h4><a href="#" class="badge badge-info">0</a></h4>
                               <?php
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
                </a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
      

      
    </div>
    <hr>
    <button type="button" class="btn btn-warning btn-rounded" data-toggle="modal" data-target="#patientdesc">
        Attend New Patient
    </button>
  
    <hr>
    <?php
      if (isset($_SESSION['tolab']) && $_SESSION['tolab'] != '') {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Alert</strong> <?php echo ":" . $_SESSION['tolab'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php

        unset($_SESSION['tolab']);
      } else {
      }


      ?>
    <hr>
    <div class="col-md-12">
        <div class="table-responsive">
            <h1 class="h3 mb-0 text-success" align="center"><?php echo $_SESSION['title'] ?></h1>
            <?php
            if ($_SESSION['title'] != "") {
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="blue lighten-4">
                        <tr>

                            <th>Patient Id</th>
                            <th>Test</th>
                          

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //$connection = mysqli_connect("localhost", "root", "", "angelo");
                        $sql = "SELECT * from lab where Status = '1'";
                        $query_run = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td> <a class="text-info"><?php echo $row['pid']; ?></a></td>
                                    <td><a class=" text-info"><?php echo $row['test']; ?></a></td>
                                         </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
            }
            ?>
        </div>
    </div>

</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>