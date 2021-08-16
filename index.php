<?php require 'header.php'; 

if(isset($_POST['send'])){
    include 'include/module.php';
    $sign = new conn();
    $reg = '0';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass  = $_POST['psw'];
    $ema   = $_POST['email'];
    $sch   = $_POST['school'];
    $gen   = $_POST['gander'];
    $status   = $_POST['st'];
    $in = '';
    $sign->createUser( $fname,$lname,$ema,$pass,$status,$reg,$gen,$in);

   

    


}

?>

<body class="text-center">
<div class="col-xl-10 col-lg-12 col-md-9">
<div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
              <div class="row">
              <!-- //login -->
              <?php if(isset($_POST['signup'])){ ?>
             
          <div class="col-lg-6  bg-login-image">
          
            <form class="form-signin"  action="" method="post">
         
        
           
              <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>
              <input type="hidden" name="st" value="intente">
              <label for="inputFname" class="">Firstname</label>
               <input type="text" id="inputFirstname" name="fname" class="form-control" placeholder="first name" required="" autofocus="">
              
               <label for="inputFname" class="">Lastname</label>
               <input type="text" id="inpurtLastname" name="lname" class="form-control" placeholder="last name" required="" autofocus="">
             
               
               
               <label for="inputEmail" class="">Email</label>
               <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email" required="" autofocus="">
             
               <label for="inputSchool" class="">School</label>
              <input type="text" id="inputSchool" name="school" class="form-control" placeholder="School" required="">
             
        
              
               <label for="inputPassword" class="">Password</label>
              <input type="password" id="inputPassword" name="psw" class="form-control" placeholder="Password" required="">
             
              <div class="checkbox mb-3 text-gray-900">
                <label>
                  <input type="checkbox" name="gander" value="MALE"> MALE
                </label>
                <label>
                  <input type="checkbox" name="gander" value="FEMALE"> FEMALE
                </label>
              </div>
        
              <button class="btn btn-sm  mr-2 btn-primary btn-block" name="send" type="submit">Sign in</button>
              <!-- <p class="mt-5 mb-3 text-muted">© 2019-2018</p> -->
           
          
          
               
        
        
            </form>
              </div>
              <?php } ?>
              <div class="col-lg-6">
<div class="form-signin">
<?php if(!empty($_GET['signup'])){ ?>
            
            <div class="alert alert-success">
          <p class="mt-5 mb-3 text-muted">Wait for admin to register your account </p>
        </div>
      
        <?php } ?>
    <form class="form-signin" method='POST' >
      
      <img class="mb-4" scr="image/avatar.jpg" alt="" width="72" height="72">
      <?php if(!empty($_GET['access'])){ ?>
    
        <div class="alert alert-danger text-center">
      <p class="mt-5 mb-3 text-warnging text-gray-800 ">You need to login  inorder access that page</p>
    </div>
  
    <?php } ?>
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="">Username</label>
       <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Email" required="" autofocus="">
     
       <label for="inputPassword" class="">Password</label>
      <input type="password" id="inputPassword" name="psw" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>

      <button class="btn btn-sm btn-primary btn-block" name="login" type="submit">Login</button>
    
      <!-- <p class="mt-5 mb-3 text-muted">© 2019-2018</p> -->
    </form>
    <form action="" method="post">
      <button class="btn btn-sm btn-primary btn-block" name="signup" type="submit">Sign up </button>
      </form>
      </div>
      </div>
  
      </div>
      </div>
      </div>
      </div>
   </body>




<?php

include 'include/module.php';

if(isset($_POST['login'])){
 $obj = new conn();
 $user = $_POST['username'];
 $pass = $_POST['psw'];
 $obj->login($user,$pass );

}

?>