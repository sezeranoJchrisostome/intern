<!DOCTYPE html>
<html lang="en">
<head>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Home</title>

<link href="str/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<link href="str/css/sb-admin-2.min.css" rel="stylesheet">


</head>
  <body >

<?php 
session_start();
$_GET['user'] = '';
$_GET['allow'] = '';


$_SESSION['status'] == '';

$_REQUEST['allow'] = $_GET['user'];
 include_once('include/module.php');
$lead = new conn();
if($_SESSION['status'] == 'admin'){
  if(isset($_POST['logout'])){
    
     $lead->logout();
    
    
    }

    
   
?>


<div id="wrapper">

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon ml-3">
            <i class="fas fa-w fa-amilia"></i>
        </div>
        <div class="sidebar-brand-text mx-3">INTENTE_ms </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

    
      <li class="nav-item active">
        <a class="nav-link" href="home.php?report=daily">
          <i class="fas fa-w fa-address-book"></i>
          <span>Daily</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Customise
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-info"></i>
          <span>Users info</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Compony user:</h6>
            <!-- function of users -->

            <?php $lead->cuser('cuser','cuser'); ?>
            <h6 class="collapse-header">Intentee user:</h6>
            <div class="collapse-divider"></div>
            <?php $lead->iuser('intente'); ?>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Add lebour</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User:</h6>
            <a class="collapse-item" href="home.php?report=a&customize=create">Create</a>
            <h6 class="collapse-header">Customise User:</h6>
            <a class="collapse-item" href="home.php?report=a&customize=create">Edit</a>
           
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        USER
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user"></i>
          <span>Logout</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login into:</h6>
            <form action="" method="post">
            <button class="collapse-item" name="logout" style="background-color:transparent; border:none" >Other account</button>
            <button  class="collapse-item"  name="logout" style="background-color:transparent; border:none" >Logout</button>
            </form>
      </div></div></li>


     


    
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <form method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" required="require"  name="shvalue" class="form-control bg-light border-0 small" placeholder="Search for fname/lname" aria-label="Search" aria-describedby="basic-addon2">
              
              <select name="date"  required="require" class="form-control bg-light ml-2 border-1 small" id="">
              <option value="2019">default 2019..</option>
              <option value="2019">2019</option>
              <option value="2017">2017</option>
              <option value="2016">2016</option>
              <option value="2015">2015</option>
              <option value="2014">2014</option>
              <option value="2013">2013</option>
              </select>
              
              
              <div class="input-group-append">
                <button class="btn btn-primary"  name="search" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
 
          <ul class="navbar-nav ml-auto">

          

          
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
             
                <span class="badge badge-danger badge-counter"><?php $lead->note();  ?></span>
              </a>
 
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Internership Request
                </h6>
                <!-- request from users registration -->
                <?php $lead->noteUser() ?>
               
               
                
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                
                <span class="badge badge-danger badge-counter"><?php $lead->malnote($_SESSION['userName']) ?></span>
              </a>
        
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message 
                </h6>
                
               
                <?php $lead->mailnote($_SESSION['userName']); ?>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['userName']  ?></span>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center" href="#" data-toggle="modal" data-target="#logoutModal">
                  <form action="" method="post"><a href="#">
                <button  class="dropdown-item"  name="logout" style="background-color:transparent; border:none" >Logout</button>
                </form>
</a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800"><?php echo $_SESSION['fname'] .' '. $_SESSION['lname']  ?></h1>
           
            <a href="home.php?report=pr" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export Report</a>
        
          </div>

          <!-- Content Row -->
         
<div class="row">

<?php 

if(isset($_POST['search'])){

  $value = $_POST['shvalue'];
  $date = $_POST['date'];
  $lead->sea($value,$date);


}

?>

</div>


          <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-5 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Reports  </div>
           
           <div class=" mb-0 font-weight-bold text-gray-800"><?php $lead->noteReport(); ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Request</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $lead->note() ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-bell fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 
task acconmplished-->
<!-- <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- Pending Requests mails-->
<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Messages </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $lead->malnote($_SESSION['userName']) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
          </div>




<?php if(isset($_REQUEST['readms'])){  ?>



  <div class="row">


      <div class="col-xl-7 col-lg-12">
          <div class="card shadow mb-4">
           
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Message </h6>
              <h6 class="m-0 ml-7 font-weight-bold text-primary"> <a href="home.php?report=a"> × </a>  </h6>
            
            </div>
           
      <?php  
      
      $lead->rems($_REQUEST['readms'] , $_REQUEST['msi']);
      if(isset($_POST['replay'])){
            $msg = $_POST['message'];
            $id = $_SESSION['id'];
            $rec =  $_REQUEST['readms'] ;
            $st = $_SESSION['status'];
            $lead->send( $id, $msg ,$rec,$st );
      }
      
      ?>
        
             
  
          </div>
  
          </div>

</div>
<?php } ?>



<?php
    
         
          
          if(isset($_REQUEST['cus']) ){ 
            
            $receiver = $_REQUEST['cus'] ;        
                
                $lead->custom_send($_SESSION['userName'] , $receiver);
              
                if(isset($_POST['sendmsg'])){
                  $msg = $_POST['message'];
                  $id = $_SESSION['id'];
                  $rec =  $_POST['receiver'] ;
                  $st = $_SESSION['status'];
                  
                  if($lead->send( $id, $msg ,$rec,$st )){
                    echo "?><div class=' text-xs font-weight-bold text-success text-uppercase mb-1'>  Sent</div> <?php";
                  }
            }
             
                  
       } ?>




<!-- 
          if report -->
   <?php  
   
   if($_GET['report'] == 'pr'){
             ?>
<div class="row">


    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
         
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Reports </h6>
            <h6 class="m-0 ml-7 font-weight-bold text-primary"> <a href="home.php?report=de"> × </a></h6>
          
          </div>
          <div class="card-body">

       <?php
              $lead->printR();
  ?>
            </div>

        </div>

        </div>
        </div>

          <div class="row">

            

       <?php     }
       elseif(!empty($_REQUEST['rid']) ){
        $lead->printRbyid($_REQUEST['rid']);
       }
            ?>
              
 <?php  
 
 if(!empty($_REQUEST['user']) ) {

    
  ?>


               <div class="col-xl-8 col-lg-7">
                 <div class="card shadow mb-4">
                   <!-- Card Header - Dropdown -->
                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Request </h6>
                     <h6 class="m-0 ml-7 font-weight-bold text-primary"> <a href="home.php?report=a"> × </a>  </h6>
                   
                   </div>
                   <div class="card-body">
                     <?php
                      $se = $_REQUEST['user'];
                      
                      $lead->userInfo($se);
                 if(isset($_POST['allow'])){
                      $s = $_POST['userid'];
                      $lead->allow($s);
                      
                   
                    }
                  
                  
                      
                     
                      }
                    
?>
                    </div>
                
              
                  
               
   

                  </div>
                </div>
      
               

       
        <?php
        
        $_REQUEST['user'] = $_GET['allow'];
        $_REQUEST['allow'] = $_GET['allow'];
        $_GET['customize'] = '';

        if(isset($_REQUEST['customize']) ){ 
        
         
     
         
            $_GET['inte'] = '';
            $_SESSION['edit'] = '';
            $row['fname'] = '';
            $row['lname'] = '';
            $row['password'] = '';
            $row['Email'] = '';
    
    
    
    
       
       if(isset($_POST['create'])){
    
        
    $reg = $_POST['reg'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass  = $_POST['psw'];
    $ema   = $_POST['email'];
    $sch   = $_POST['school'];
    $gen   = $_POST['gander'];
    $status   = $_POST['st'];
    $in = $_POST['st'];
    $lead->createCuser( $fname,$lname,$ema,$pass,$status,$reg,$gen,$in);
       }
     ?>
    
      

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Users </h6>
                  <h6 class="m-0 ml-7 font-weight-bold text-primary"> <a href="home.php?report=a"> × </a>  </h6>
                
                </div>
                <div class="card-body">
                  
                  <div class="col-xl-10 col-lg-12  mt-3">
                    <div class=' card border-left-succes alert alert-success '>
                      <p class='text-gray-900'> Create User </p>
                    </div>
                
                   <form class="form-signin col-lg-12  "  action="" method="post">              
                       
                    
                     <label for="inputFname" class="">Firstname</label>
                      <input type="text" id="inputFirstname" name="fname"  class="form-control" placeholder="first name" required="" autofocus="">
                     
                      <label for="inputFname" class="">Lastname</label>
                      <input type="text" id="inpurtLastname" name="lname"  class="form-control" placeholder="last name" required="" autofocus="">
                   
                      
                      <label for="inputEmail" class="">Email</label>
                      <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email" required="" autofocus="">
                    
                      <label for="inputSchool" class="">School</label>
                     <input type="text" id="inputSchool" name="school" value="" class="form-control" placeholder="School" required="">
                    
                      
                    
                      <select name="reg" class="form-control mt-2"  require="required" id="">
                          <option value="0">Add to wishlist</option>
                          <option value="1">register  </option>
    
                     </select>
    
                     <select name="st" class="form-control mt-2" require="required" id="">
                          <option value="intente">intente</option>
                          <option value="cuser">Company user </option>
    
                     </select>
                     
                      <label for="inputPassword" class="">Password</label>
                     <input type="password" id="inputPassword"  name="psw" class="form-control" placeholder="Password" required="">
                    
                     <div class="checkbox mb-3 text-gray-900">
                       <label>
                         <input type="checkbox" name="gander" value="MALE"> MALE
                       </label>
                       <label>
                         <input type="checkbox" name="gander" value="FEMALE"> FEMALE
                       </label>
                     </div>
               <div class="mt-2">
                  
                   
                        <button class="btn btn-sm  mr-2 btn-primary btn-block" name="create" type="submit">Create</button> 
                    
                     <!-- <p class="mt-5 mb-3 text-muted">© 2019-2018</p> -->
                     </div>
                  
               
                   </form>
                    <!-- <a href="customize.php?customize=edit" class="btn btn-sm  mr-2 btn-primary btn-block" name="edit" type="submit">Edit</a> 
                    -->
               
                     
    </div>
                     
                </div>
    
    <?php
    }
    ?>
                </div>
                
              
            

      </div>

        

          



<?php } 
//not a doctor
elseif($_SESSION['status'] == 'cuser'){ ?>

  <?php if(isset($_POST['logout'])){

    $lead->logout();
  
  }
  elseif(isset($_POST['report'])){
      
    $dom = $_POST['documantation'];
    $id = $_POST['userid'];
    $live = $_POST['live'];
    $status = $_POST['status'];
    $task = $_POST['task'];
    $date = date(DATE_ATOM);
    $lead->create_report($id,$dom,$live,$task,$date); }

  ?>
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
    
      <div class="input-group">
          <input  type="hidden" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
           
          </div>
        </div>

      

      
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
         
            <span class="badge badge-danger badge-counter"><?php $lead->note();  ?></span>
          </a>

          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Internership Request
            </h6>
            <!-- request from users registration -->
            <?php $lead->noteUser() ?>
            
          </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter"><?php $lead->malnote($_SESSION['userName']) ?></span>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
              Message 
            </h6>           
           
            <?php $lead->mailnote($_SESSION['userName']); ?>

            </div>
        </li>

        <!-- Suggestion -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              
              <span class="badge badge-warning  badge-counter">send</span>
            </a>
           
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
                Suggest
              </h6>           
             
              
  
              </div>
          </li>


        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['userName']  ?></span>
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-center" href="#" data-toggle="modal" data-target="#logoutModal">
              <form action="" method="post"><a href="#">
            <button  class="dropdown-item"  name="logout" style="background-color:transparent; border:none" >Logout</button>
            </form>
</a>
          </div>
        </li>

      </ul>

    </nav>

    <div class="col-xl-3 card border-left-primary shadow-sm ml-5 p-5 col-lg-12">
      <div class="card-body">
          <i class="fas fa-fw fa-share-alt"></i>
          <span>Share </span>
        </a>
        
          <div class="bg-white py-2 text-center collapse-inner rounded">
            <h6 class="collapse-header">Compony user:</h6>
            <!-- function of users -->

            <?php $lead->cuser('cuser','cuser'); ?>
            <h6 class="collapse-header mr-3">Intentee user:</h6>
            <div class="collapse-divider"></div>
            <?php $lead->iuser('intente'); ?>
            
          </div>
        </div>
  
    </div>


    <div class="container mt-3 p-5">
    <?php if(isset($_REQUEST['readms']) ){  ?>



      <div class="row">
    
    
        
          <div class="col-xl-7 col-lg-12">
              <div class="card shadow mb-4">
               
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Message </h6>
                  <h6 class="m-0 ml-7 font-weight-bold text-primary"> <a href="home.php?report=a"> × </a>  </h6>
                
                </div>
            
                
               
          <?php  
          
          $lead->rems($_REQUEST['readms'] , $_REQUEST['msi']);
          if(isset($_POST['replay'])){
                $msg = $_POST['message'];
                $id = $_SESSION['id'];
                $rec =  $_REQUEST['readms'] ;
                $st = $_SESSION['status'];
                $lead->send( $id, $msg ,$rec,$st );
          }
          
          ?>
            
                 
      
              </div>
      
              </div>
    
    </div>
    <?php } ?>

   
   
      

    
<?php
    
         
          
if(isset($_REQUEST['cus']) ){ 
  
  $receiver = $_REQUEST['cus'] ;        
      
      $lead->custom_send($_SESSION['userName'] , $receiver);
    
      if(isset($_POST['sendmsg'])){
        $msg = $_POST['message'];
        $id = $_SESSION['id'];
        $rec =  $_POST['receiver'] ;
        $st = $_SESSION['status'];
        $lead->send( $id, $msg ,$rec,$st );
  }
   
        
} ?>






  <div class="col-xl-10 col-lg-12  mt-1">
      <div class=' card border-left-succes alert alert-success '>
        <p class='text-gray-900'> CREATE REPORT </p>
       </div>
       
   
                   <form class="form-signin col-lg-12  "  action="" method="post">              
                       
                      <input type="hidden" name="userid"  class="form-control"  value="<?php  echo $_SESSION['id'] ?>" autofocus="">
                     
                      <label for="dom" class="">Documantation</label>
                      <input type="text"  name="documantation"  class="form-control" placeholder="State" required="" autofocus="">
                   
                      
                      <input type="hidden"  name="live" value="1" class="form-control"   >
                     
                 
                     <input type="hidden" name="status"  class="form-control"  value="<?php  echo $_SESSION['status'] ?>" autofocus="">
                            
                      <label for="task" class="mt-2">Task (Briefly)</label>
                     <input type="text"  name="task" class="form-control" placeholder="task" required="">
                    
                    
               <div class="mt-2">
                  
                   
                        <button class="btn btn-sm  mr-2 btn-primary btn-block" name="report" type="submit">Create</button> 
                    
                     <!-- <p class="mt-5 mb-3 text-muted">© 2019-2018</p> -->
                     </div>
                  
               
                   </form>
                    <!-- <a href="customize.php?customize=edit" class="btn btn-sm  mr-2 btn-primary btn-block" name="edit" type="submit">Edit</a> 
                    -->
               
                     
    </div>
                     
  </div>
  
    
    


<?php } 

elseif($_SESSION['status'] == 'intente'){ 

  if(isset($_POST['logout'])){

    $lead->logout();
  
  }

 ?>
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
   
    <!-- Topbar Search -->
   
    <div class="input-group">
        <input  type="hidden" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          
        </div>
      </div>

    <ul class="navbar-nav ml-auto">

     

    
      

     
      <li class="nav-item ml-7 dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <!-- Counter - Messages -->  <span class="badge badge-danger badge-counter"><?php $lead->malnote($_SESSION['userName']) ?></span>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
          <h6 class="dropdown-header">
            Message 
          </h6>           
         
          <?php $lead->mailnote($_SESSION['userName']); ?>

          </div>
      </li>

      <!-- Suggestion -->
      <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            
            <span class="badge badge-warning  badge-counter">send</span>
          </a>
         
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
              Suggest
            </h6>           
           
            

            </div>
        </li>


      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['userName']  ?></span>
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          
         
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-center" href="#" data-toggle="modal" data-target="#logoutModal">
            <form action="" method="post"><a href="#">
          <button  class="dropdown-item"  name="logout" style="background-color:transparent; border:none" >Logout</button>
          </form>
</a>
        </div>
      </li>

    </ul>

  </nav>


  <div class="container mt-3 p-5">
      <h1 class="h3 mb-0 text-gray-800"><?php echo $_SESSION['fname'] .' '. $_SESSION['lname']  ?></h1>
  <?php if(isset($_REQUEST['readms'])){  ?>



    <div class="row">
  
  
        <div class="col-xl-7 col-lg-12">
            <div class="card shadow mb-4">
             
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Message </h6>
                <h6 class="m-0 ml-7 font-weight-bold text-primary"> <a href="home.php?report=a"> × </a>  </h6>
              
              </div>
             
        <?php  
        
        $lead->rems($_REQUEST['readms'] , $_REQUEST['msi']);
        if(isset($_POST['replay'])){
              $msg = $_POST['message'];
              $id = $_SESSION['id'];
              $rec =  $_REQUEST['readms'] ;
              $st = $_SESSION['status'];
              $lead->send( $id, $msg ,$rec,$st );
        } 
        
      
        
        ?>
          
               
    
            </div>
    
            </div>
  
  </div>
  <?php } ?>
  



<div class="col-xl-10 col-lg-12  mt-3">
    <div class=' card border-left-succes alert alert-success '>
      <p class='text-gray-900'> CREATE REPORT </p>
     </div>
     
 
                 <form class="form-signin col-lg-12  "  action="" method="post">              
                     
                    <input type="hidden" name="userid"  class="form-control"  value="<?php  echo $_SESSION['id'] ?>" autofocus="">
                   
                    <label for="dom" class="">Documantation</label>
                    <input type="text"  name="documantation"  class="form-control" placeholder="State" required="" autofocus="">
                 
                    
                    <input type="hidden"  name="live" value="1" class="form-control"   >
                   
               
                   <input type="hidden" name="status"  class="form-control"  value="<?php  echo $_SESSION['status'] ?>" autofocus="">
                          
                    <label for="task" class="mt-2">Task (Briefly)</label>
                   <input type="text"  name="task" class="form-control" placeholder="task" required="">
                  
                  
             <div class="mt-2">
                
                 
                      <button class="btn btn-sm  mr-2 btn-primary btn-block" name="report" type="submit">Create</button> 
                  
                   <!-- <p class="mt-5 mb-3 text-muted">© 2019-2018</p> -->
                   </div>
                
             
                 </form>
                  <!-- <a href="customize.php?customize=edit" class="btn btn-sm  mr-2 btn-primary btn-block" name="edit" type="submit">Edit</a> 
                  -->
             
                   
  </div>
                   
</div>





 <?php }
 else{


  header('location:index.php?access=denied');

 } 

require 'footer.php';

?>