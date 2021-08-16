

<div class="container">
<div class="col-xl-10 col-lg-12 col-md-9 mt-3">
             <div class="card col-lg-8  bg-login-image">
             <?php 
             
           

             ?>
               <form class="form-signin p-3 "  action="" method="post">
            
           
              
                 <h1 class="h3 mb-3 font-weight-normal">Create up</h1>

                
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
                <a href="customize.php?customize=edit" class="btn btn-sm  mr-2 btn-primary btn-block" name="edit" type="submit">Edit</a> 
               
               
              <a href="../home.php">Home</a>
                 </div>
</div>
                 
</div>

<?php
}
elseif($_GET['customize'] == "edit" && !empty($_GET['inte']) ){
    $id = $_GET['inte'];
    $sg->Edit($id);
    

 }
elseif($_GET['customize'] == 'edit'){
 
 $sg->userCinfo();
    if(isset($_GET['inte']) ){
        if($_GET['customize']== 'YES'){  
        $sg->remove($_GET['inte']);
        }
    
    }

 }
 elseif($_GET['customize'] == 'remove'){
    echo ' <div class="alert alert-danger p-5"> Do you want to remove <a class="btn btn-danger" href="customize.php?customize=edit">NO </a> || <a class="btn btn-danger" href="customize.php?customize=YES&inte='.$_GET['inte'].'">YES </a></</div> ';
      if(isset($_GET['inte'])){
        $sg->remove($_GET['inte']);
      }
      else{
          header('location:customize.php?customize=edit');
          exit();
      }
 }

else{
   echo "<div class='alert alert-success p-6'>spacify your work <a class='btn btn-success' href='../home.php' >Edit</a>  </div>";
}

}
//not addmin
else{
    header('../index.php?access="login"');
    exit();
}


?>