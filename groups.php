<?php
session_start();

include('includes/security.php');
$_SESSION['page'] = "Group Address Manager";
include('includes/header.php');
include('includes/navbar.php');
require('includes/config.php');
?>


<div class="modal fade" id="group" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Group Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

          <div class="form-group green-border-focus">
            <label>Group Name</label>
            <textarea class="form-control" name="gnamex" placeholder="i.e Staff,Class 6" id="exampleFormControlTextarea5" rows="1"></textarea>
          </div>


          <div class="form-group green-border-focus">
            <label><strong> Description</strong></label>
            <textarea class="form-control" name="descr" placeholder="Enter brief description(Optional)" id="exampleFormControlTextarea5" rows="3"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="creategrp" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">

        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#group">
          Create Group
        </button>


        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#grpsend">
          Send Group Message
        </button>
      </h6>
    </div>

    <div class="card-body">

      <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
      ?>
        <?php $c = $_SESSION['color']; ?>
        <div class="<?php echo "$c" ?> alert-dismissible fade show" role="alert">
          <strong>Info!</strong> <?php echo ":" . $_SESSION['success'] ?>
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

              <th>Group Name</th>
              <th>Description</th>
              <th>Members</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //
            $sql = "SELECT * from groupname where `status` = '0' and uid = '$ud'";
            $query_run = mysqli_query($connection, $sql);
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <tr>


                  <td><?php echo $row['groupname']; ?></td>
                  <td> <?php echo $row['description']; ?></td>
                  <td> <?php echo $row['totalcnts']; ?> </td>
                  <td class="d-none d-sm-table-cell">
                    <form action="code.php" method="POST">
                      <a href="del.php?delid=<?php echo $row['id']; ?>" onclick="return confirm('Do you really want to Delete this group address? remeber all the contacts attached to this address will never be recovered,are you sure you want to delete?');"> <i class="fa fa-trash fa-delete" aria-hidden="true"></i></a>
                      <a href="#<?php echo $row['id']; ?>" onclick="return confirm('Do you really want to Delete ?');"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                    </form>
                  </td>



                  </td>

                </tr>
            <?php
              }
            }


            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<div class="modal fade" id="grpsend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send SMS to ALL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label> Sender </label>
            <select required name="shortcode" class="browser-default custom-select custom-select-sm mb-3">
              <option value="254SMS" selected><?php echo  $_SESSION['xsender'] ?></option>
            </select>
          </div>

          <div class="form-group green-border-focus">
            <label><strong>Group Name</strong></label>
            <select name="grname" required class="browser-default custom-select custom-select-md mb-3">
              <option selected>Select Group</option>

              <?php
              $sql = "SELECT * from groupname  where `status` = '0' and totalcnts > 0 and uid = '$ud' ";
              $query_run = mysqli_query($connection, $sql);
              if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
                  <option value="<?php echo $row['id']; ?>"> <?php echo $row['groupname']; ?></option>
              <?php
                }
              }         ?>
            </select></div>

          <div class="form-group green-border-focus">

            <label>Message</label>
            <textarea class="form-control" onkeyup="count_up(this);" required name="msg" placeholder="Type the message here. 1 sms  = 140 characters" id="msg" rows="3"></textarea>
            <span t class="text-muted pull-right" name="count" id="count1">0</span><span> characters </span>
          </div>
        </div>
        <script>
          function count_up(obj) {
            document.getElementById('count1').innerHTML = obj.value.length;

          }
        </script>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" onclick="return confirm('Do you want to discard this message ?');">Cancel</button>
          <button type="submit" name="grpsend" class="btn btn-primary">Send</button>
        </div>
      </form>

    </div>
  </div>
</div>




<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>