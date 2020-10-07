 <!-- Sidebar -->

 <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    //include('includes/security.php'); 
    ?>
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-sms cyan-text"></i>
         </div>
         <div class="sidebar-brand-text mx-3">BAUERSMS</div>
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


     <div class="modal fade" id="singlesms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                             <label> Shortcode </label>
                             <select name="shortcode" class="browser-default custom-select custom-select-lg mb-3">
                                 <option selected>Open this select menu</option>
                                 <option value="254SMS">254SMS</option>
                             </select></div>

                         <div class="form-group green-border-focus">
                             <label>Message</label>
                             <textarea class="form-control" name="msg" placeholder="Type the message here" id="exampleFormControlTextarea5" rows="3"></textarea>
                         </div>


                         <div class="form-group green-border-focus">
                             <label>Mobile Numbers</label>
                             <textarea class="form-control" name="mobile" placeholder="Enter Mobile Numbers here separated by new line" id="exampleFormControlTextarea5" rows="3"></textarea>
                         </div>




                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                         <button type="submit" name="sendsms" class="btn btn-primary">Send</button>
                     </div>
                 </form>

             </div>
         </div>
     </div>
     <!-- Nav Item - Pages Collapse Menu -->

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo0" aria-expanded="true" aria-controls="collapseTwo">
             <i class="far fa-comment-dots fa-cog"></i>
             <span>SMS</span>
         </a>
         <div id="collapseTwo0" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Send SMS</h6>
                 <a type="button" class="collapse-item" data-target="#singlesms" data-toggle="modal">Send Single SMS</a>
                  <h6 class="collapse-header">Message Options</h6>
                 <a class="collapse-item" href="send_sms.php">Sent</a>
                 
             </div>
         </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
             <i class="far fa-address-book"></i>
             <span>Address Book</Address></span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="contacts.php">Contacts</a>
                 <a class="collapse-item" href="groups.php">Group Address</a>

             </div>
         </div>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Admin
     </div>

     <!-- Nav Item - Pages Collapse Menu -->


     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" enabled = "false" data-toggle="collapse" data-target="#collapsePagesx" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-tools"></i>
             <span>Settings</Address></span>
         </a>
         <div id="collapsePagesx" class="collapse" aria-labelledby="headingthree" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="#">Networks</a>
                 <a class="collapse-item" href="#">General Settings</a>
                 <a class="collapse-item" href="#">Header/Footer</a>
                 <a class="collapse-item" href="#">Partner Networks</a>

             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesy" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fingerprint"></i>
             <span>Sender ID's</Address></span>
         </a>
         <div id="collapsePagesy" class="collapse" aria-labelledby="headingthree" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="#">Sender Id</a>
                 <a class="collapse-item" href="#">Sender Id Mappings</a>
             </div>
         </div>
     </li>


     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesf" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-money-bill-wave"></i>
             <span>Credits</Address></span>
         </a>
         <div id="collapsePagesf" class="collapse" aria-labelledby="headingthree" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="#">Partner Credits</a>
                 <a class="collapse-item" href="#">Credit History</a>
                 <a class="collapse-item" href="#">Purchase Credits</a>
             </div>
         </div>
     </li>

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

                 <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                 <!-- Nav Item - Alerts -->
                 <a href="#">Purchase Credits</a>
                 <!-- Nav Item - Messages -->


                 <div class="topbar-divider d-none d-sm-block"></div>

                 <!-- Nav Item - User Information -->

                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                             <?php

                                $userx = "Bauer"; // $_SESSION['username'];

                                ?>
                             <h4><span class="badge badge-primary"><?php echo $userx; ?> </span></h4>



                         </span>
                         <i class="fas fa-user"></i>
                     </a>
                     <!-- Dropdown -  User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                         <a class="dropdown-item" href="#">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             Profile
                         </a>
                         <a class="dropdown-item" href="#">
                             <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                             Partners
                         </a>
                         <a class="dropdown-item" href="#">
                             <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                             Users
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