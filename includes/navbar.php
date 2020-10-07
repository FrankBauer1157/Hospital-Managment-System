 <!-- Sidebar -->

 <?php
    include('includes/config.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    //include('includes/security.php'); 
    ?>

 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-sms cyan-text"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Dero Clinic</div>
     </a>
     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider">
     <!-- Heading -->
     <div class="sidebar-heading">
         Interface
     </div>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo0" aria-expanded="true" aria-controls="collapseTwo">
             <i class="far fa-comment-dots fa-cog"></i>
             <span>Reception</span>
         </a>
         <div id="collapseTwo0" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Patients Details</h6>
                 <a type="button" class="collapse-item" data-target="#newpatient" data-toggle="modal">New Patient</a>
                 <a class="collapse-item" href="send_sms.php">Discharge Patients</a>
               
             </div>
         </div>




         <!-- Divider -->
         <div class="sidebar-heading">
             Doctors Section
         </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Consultation Room</Address></span>
         </a>
         <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="sgames.php">Consultation Que</a>

             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Laboratory</Address></span>
         </a>
         <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="lab.php">Laboratory Que</a>

             </div>
         </div>
     </li>

     <!-- Nav Item - Pages Collapse Menu -->


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->

 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">

         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

             <!-- Sidebar Toggle (Topbar) -->
             <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                 <i class="fa fa-bars"></i>
             </button>

             <!-- Topbar Search -->
             <form class="hidden-xs">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="col-md-4"></div>
                         <div class="col-md-4">
                             <a class="navbar-brand">
                                 <strong><?php echo $_SESSION['page']; ?> </strong>
                             </a>
                         </div>
                     </div>
                 </div>
             </form>

             <ul class="navbar-nav ml-auto">


                 <div class="topbar-divider d-none d-sm-block"></div>

                 <!-- Nav Item - User Information -->

                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                             <?php
                                $userx =  $_SESSION['username'];
                                ?>
                             <h4><span class="badge badge-primary"><?php echo $userx; ?> </span></h4>

                         </span>
                         <i class="fas fa-user"></i>
                     </a>
                     <!-- Dropdown -  User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                         <a class="dropdown-item" href="#">
                             <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                             Add User
                         </a>
                         <div class="dropdown-divider"></div>

                         <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Logout
                         </a>
                     </div>
                 </li>

             </ul>

         </nav>

         <a class="scroll-to-top rounded" href="#page-top">
             <i class="fas fa-angle-up"></i>
         </a>


         <!-- Logout Modal-->
         <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span>
                         </button>
                     </div>
                     <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                     <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                         <form action="logout.php" method="POST">

                             <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

                         </form>


                     </div>
                 </div>
             </div>
         </div>
         <!-- Add sender id-->

         <div class="modal fade" id="newpatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">

                     <form action="code.php" method="POST">

                         <div class="modal-body">
                             <div class="form-group">
                                 <label allign="center"> <strong>Please Register Patient Details Below</strong></label>
                             </div>
                             <div class="form-row mb-4">
                                 <div class="col">
                                     <!-- First name -->
                                     <div class="form-group">
                                         <label> <strong>First Name</strong> </label>
                                         <input type="text" name="faname" required class="form-control" placeholder="Samuel">
                                     </div>
                                     <div class="form-group">

                                         <label> <strong>Last Name</strong></label>
                                         <input type="text" name="laname" required class="form-control" placeholder="Dedan">
                                     </div>
                                     <div class="form-group">
                                         <label><strong>Phone Number</strong> </label>
                                         <input type="text" name="tael" required class="form-control" placeholder="Promotional">


                                     </div>
                                     <div class="form-group">
                                         <label><strong>Age</strong> </label>
                                         <input type="text" name="age" required class="form-control" placeholder="Ref#101">


                                     </div>

                                 </div>
                                 <div class="col">
                                     <!-- Last name -->
                                     <div class="form-group">
                                         <label><strong>Mode Of Transport</strong> </label>
                                         <select name="mot" class="form-control">
                                             <option selected>Open this select menu</option>
                                             <option value="Ambulance">Ambulance</option>
                                             <option value="Wheel Chair">Wheel Chair</option>
                                             <option value="Self">Self</option>
                                             <option value="Other">Other</option>
                                         </select> </div>
                                     <div class="form-group">
                                         <label><strong>Visit Purpose</strong> </label>
                                         <select name="vp" class="form-control">
                                             <option selected>Open this select menu</option>
                                             <option value="0">Consultation</option>
                                            
                                         </select>
                                     </div>

                                     <div class="form-group">
                                         <label><strong>Accompanied By</strong> </label>
                                         <input type="text" name="ab" required class="form-control" placeholder="Dedan">
                                     </div>
                                     <div class="form-group">
                                         <label><strong>CC</strong> </label>
                                         <select name="cc" class="form-control">
                                             <option selected>Open this select menu</option>
                                             <option value="0">Urgent</option>
                                             <option value="1">Semi-Urgent</option>
                                             <option value="2">Not- Urgent</option>
                                         </select>
                                     </div>
                                 </div>
                             </div>

                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                 <button type="submit" name="savepatient" class="btn btn-primary">Send</button>
                             </div>
                         </div>



                     </form>
                 </div>
             </div>
         </div>