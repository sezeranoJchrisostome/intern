<?php 

class conn {

    protected $host = 'localhost';
    protected $user = 'root';
    protected $pass = '';
    protected $dbname = 'intent_ms';
    protected $link ;

   
public function __construct(){
    try{
        $dns = 'mysql:host='.$this->host.';dbname='.$this->dbname.';';
      $this->link = new PDO($dns,$this->user,$this->pass);
      $this->link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

  }

  catch(PDOException  $e){
      echo $e->getMessage();
  }
}



public function login($username,$pass){
    if(empty($username) && empty($pass)){
       header('location:index.php?error=emptyfild&name='.$username.'&pass='.$pass);
       exit();
 
    }
    else{
    
        //prepare statements
     $sq ="SELECT * FROM users where Email=:email && password=:pass";
     $stmt = $this->link->prepare($sq);
     $stmt->execute([':email'=>$username , ':pass'=>$pass]);
     $row = $stmt->fetch();
     $count = $stmt->rowCount();
     if($count == 1){
         session_start();
         $_SESSION['userName'] = $row['Email'];
         $_SESSION['status'] = $row['status'];
         $_SESSION['fname'] = $row['fname'];
         $_SESSION['id'] = $row['userid'];
         $_SESSION['lname'] = $row['lname'];
         $_SESSION['password'] = $row['password'];
         header('location:home.php?report=de');
     }
     else{
 
         if($row['userName'] == $username && $row['password'] !== $pass){
             header('location:index.php?error=wrongpassword');
             exit();
         }
         elseif($row['userName'] !== $username && $row['password'] == $pass){
             header('location:index.php?error=wrongusername');
             exit();
         }
         else{
             header('location:index.php?error=unknownuser');
             exit();
 
         }
 
       
 
     }
    
 }
 }

 

public function logout(){
   
     session_destroy();
     session_start();
     header('location:index.php');
  
    } 


 


    
    public function createUser($fname,$lname,$email,$passw,$status,$reg,$gender,$int){


        if(!empty($fname) && !empty($email)){
          
          

                    $sq = "SELECT * FROM users WHERE Email=:em ";
                    $stmt = $this->link->prepare($sq);
                    $stmt->execute([':em'=>$email]);
                    $row = $stmt->rowCount(); 
        
                    if($count > 0){
        
                        header('location:index.php?error=usertaken');
                        exit();
                    }
                    else{
                       
                        $data = [
                            
                            'fname' => $fname,
                            'lname' => $lname ,
                            'Email' => $email ,
                            'password' => $passw,
                            'status' => $status,
                            'reg' => $reg ,
                            'gander' => $gender , 
                            'intid' => $int
                        ];
                      $sq ="INSERT INTO users (userid,fname,lname,Email,password,status,reg,gander,intid) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ?) ";
                      $st = $this->link->prepare($sq)->execute([ $ui , $fname, $lname ,$email , $passw , $status , $reg , $gender ,$int ]);

                        header('location:index.php?signup=success');
                        exit();
                     
        
                    }
        
        
        
                }
        else{
            header('location:index.php?error=param');
            exit();
        
    
    
        }
    
        
     }



     public function createCuser($fname,$lname,$email,$passw,$status,$reg,$gender,$int){


        if(!empty($fname) && !empty($email)){
          
          

                    $sq = "SELECT * FROM users WHERE Email=:em ";
                    $stmt = $this->link->prepare($sq);
                    $stmt->execute([':em'=>$email]);
                    $row = $stmt->rowCount(); 
        
                    if($row > 0){
          
                    echo "<div class=' card border-left-danger alert alert-danger '><p class='text-gray-900'> User email exist </p> </div>";
                    }
                    
                    
                    else{
                        $ui = '';
                        $data = [
                            
                            'fname' => $fname,
                            'lname' => $lname ,
                            'Email' => $email ,
                            'password' => $passw,
                            'status' => $status,
                            'reg' => $reg ,
                            'gander' => $gender , 
                            'intid' => $int
                        ];
                      $sq ="INSERT INTO users (userid,fname,lname,Email,password,status,reg,gander,intid) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ?) ";
                      $st = $this->link->prepare($sq)->execute([ $ui , $fname, $lname ,$email , $passw , $status , $reg , $gender ,$int ]);                    
        
                    }
        
        
        
                }
        else{
            echo "<div class='card border-left-danger alert alert-danger '><p class='text-gray-900'>Param error</p> </div>";
           
    
    
        }
    
        
     }


     public function note() {
            
        $sql = " SELECT  * from users where reg ='0' ";
        $stmt = $this->link->prepare($sql);
        $stmt->execute();
        $stmt->fetchAll();
        $rows = $stmt->rowCount();  
     echo $rows;
     }


     public function noteUser(){
        $sql = " SELECT  * from users where reg ='0' ";
        $stmt = $this->link->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll();
        $rows = $stmt->rowCount(); 
        if($rows > 0){
          foreach($row as $re ){
              echo '
              
              <a class="dropdown-item d-flex align-items-center" href="home.php?report=1&user='. $re['userid'] .'">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-user text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">'. $re['fname'] .' '. $re['lname'] .'</div>'
                    . $re['Email']  .
                  '</div>
                </a>
              
              ';
          }
        }
        else{
            echo '<a class="dropdown-item text-center small text-gray-500" href="#">No More internership request</a>';
         
           }
     }

   public function userInfo($userid){

            
            $sq = "SELECT * FROM users WHERE userid=:em and status = 'intente' and reg ='0'";
            $stmt = $this->link->prepare($sq);
            $stmt->execute([':em'=>$userid]);
            $row = $stmt->rowCount(); 
            $rows = $stmt->fetchAll();
            if($rows){
                echo '
               
                        <div class="container">
                                <table  class="table table-striped ">
                        <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Status</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                
                
                
                ';
 //   <td><a class="btn btn-danger" href="register.php?del='. $res['userid'] .'">Cancel</a>  </td>
                //     </tr>
                    
                foreach($rows  as $res){
                
                    echo '
                    
                    <tr>
                  <td>'. $res['fname'] .'</td>
                  <td>'. $res['lname'] .'</td>
                  <td>'. $res['Email'] .'</td>
                  <td>'. $res['status'] .'</td>
                  
                    </tr>
                   
                    ';

                }
            echo'
               </tbody>
                </table>
                <form action="home.php?report=1&user='. $res['userid'] .'" method="POST">
                <input type="hidden" name="userid" value="'. $res['userid'] .'"  >
                <button type="submit"  name="allow" class="btn btn-info" >Register</button>  
                </form>
                </div>';
            }

   } 
   public function setInte($ui){
       $sq = 'UPDATE users set  reg= "canceled" , status = "canceled" WHERE userid =:ui ';
       $stmt = $this->link->prepare($sq);
       $stmt->execute([':ui'=>$ui]);

        //    header('location:home.php?report=a');
        //    exit();
       
   }


public function malnote($username){

    $sql = "SELECT users.* , massage.* from massage join users using(userid) where  massage.Email =:em and live != 0 ";
    $stmt = $this->link->prepare($sql);
    $stmt->execute([':em'=>$username]); 
    $row = $stmt->fetchAll();
    $count = $stmt->rowCount();
    
    echo $count;

}

public function mailnote($username){

    $sql = "SELECT users.fname,users.lname,users.email as'sender' ,massage.Email as'receiver' ,massage.mId , massage.massage ,massage.date,massage.status from massage join users using(userid) where massage.Email = :em and live=1  group by massage.Email order by mId desc  ";
    $stmt = $this->link->prepare($sql);
    $stmt->execute([':em'=>$username]); 
    $rows = $stmt->fetchAll();
    $count = $stmt->rowCount();
    $t ='';
    if($count < 1){
        $t = '<a class="dropdown-item text-center small text-gray-500" href="#">All seen</a>';
    }
   
    else {

       $t = '<a class="dropdown-item text-center small text-gray-500" href="#">Messages 1+</a>';
  
    }
  foreach($rows as $row) { 
    echo '
    
    <a class="dropdown-item d-flex align-items-center" href="home.php?report=a&readms='. $row['sender'] .'&msi='. $row['mId'] .'">
                  <div class="dropdown-list-image mr-3">
                  <div class="icon-circle bg-success">
                  <i class="fas fa-user text-white"></i>
                 </div>
                    <div class="status-indicator bg-warning"> </div>
                  </div>
                  <div>
                    <div class="text-truncate">'. $row['massage'] .'</div>
                    <div class="small text-gray-500">'. $row['fname'] .' '.$row['lname'] .' '. $row['date'].' </div>
                  </div>
                </a>
    
    ';
   
    
  }
  echo $t ;
}

   public function cuser( $st , $inte){
      $ex = $_SESSION['userName'];

    $sq = "SELECT * FROM users WHERE  status= :st and intid = :cu and Email !=:ex  and reg='1' or status= 'admin' ";
            $stmt = $this->link->prepare($sq);
            $stmt->execute([':cu'=> $inte , ':st'=>$st , ':ex'=>$ex]);
            $row = $stmt->rowCount(); 
            $rows = $stmt->fetchAll();
            foreach($rows as $re){
                   echo ' <a class="collapse-item text-center " href="home.php?report=a&cus='. $re['userid'] .'">'. $re['fname'] .' '. $re['lname']  .'</a> || ';
            }
   }

   public function iuser( $st ){

    $sq = "SELECT * FROM users WHERE  status= :st  and reg='1' ";
            $stmt = $this->link->prepare($sq);
            $stmt->execute([':st'=> $st ]);
            $row = $stmt->rowCount(); 
            $rows = $stmt->fetchAll();
            foreach($rows as $re){
                echo ' <a class="collapse-item text-center " href="home.php?report=a&cus='. $re['userid'] .'">'. $re['fname'] .' '. $re['lname']  .'</a> || ';
            }
   }
   public function userCinfo(){

            
    $sq = "SELECT * FROM users where intid != 'master' and intid != 'none'";
    $stmt = $this->link->prepare($sq);
    $stmt->execute();
    $row = $stmt->rowCount(); 
    $rows = $stmt->fetchAll();
    if($rows){
        echo '
                <div class="container">
                        <table class="table table-dark  mt-5">
                <thead>
                    <tr class="text-gray-900" >
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Password</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
        
        
        
        ';
//   <td><a class="btn btn-danger" href="register.php?del='. $res['userid'] .'">Cancel</a>  </td>
        //     </tr>
            
        foreach($rows  as $res){
        
     echo '
            
            <tr>
          <td>'. $res['fname'] .'</td>
          <td>'. $res['lname'] .'</td>
          <td>'. $res['Email'] .'</td>
          <td>'. $res['status'] .'</td>
          <td>'. $res['password'] .'</td>
          <td> <a class="btn btn-danger" href="customize.php?customize=remove&inte='. $res['userid'].'" >Remove</a></td>
          
            
           
            ';
            
        }
        echo'
               </tbody>
                </table>
                <a class="btn btn-info" href="../home.php">Home</a>  
                </div>';

    }

} 


public function edit($id){
    
    $se =  " SELECT * from users  where userid= :id" ;
    $stmt = $this->link->prepare($se);
    $stmt->execute([':id'=>$id]);
    $row = $stmt->fetchAll();
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['lname'] = $row['lname'];
    $_SESSION['Email'] = $row['Email'];
    $_SESSION['password'] = $row['password'];
    echo '
    

    <form class="form-signin p-3 "  action="" method="post">


 
    <h1 class="h3 mb-3 font-weight-normal">Create up</h1>

   
    <label for="inputFname" class="">Firstname</label>
     <input type="text" id="inputFirstname" name="fname" value='. $_SESSION['fname'] .' class="form-control" placeholder="first name" required="" autofocus="">
    
     <label for="inputFname" class="">Lastname</label>
     <input type="text" id="inpurtLastname" name="lname" value="'. $_SESSION['lname'] .'" class="form-control" placeholder="last name" required="" autofocus="">
  
     
     <label for="inputEmail" class="">Email</label>
     <input type="text" id="inputEmail" name="email" value="'. $_SESSION['Email'] .'" class="form-control" placeholder="Email" required="" autofocus="">
   
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
    <input type="password" id="inputPassword" value="'.$_SESSION['password'] .'" name="psw" class="form-control" placeholder="Password" required="">
   
    <div class="checkbox mb-3 text-gray-900">
      <label>
        <input type="checkbox" name="gander" value="MALE"> MALE
      </label>
      <label>
        <input type="checkbox" name="gander" value="FEMALE"> FEMALE
      </label>
    </div>
<div class="mt-2">
 
  
       <button class="btn btn-sm  mr-2 btn-primary btn-block" name="edit" type="submit">edit</button> 
   
   
    </div>
 

  </form>
   
  
  
 <a href="../home.php">Home</a>
    </div>
</div>
    
</div>


    ';


}

public function remove($d){
   $sql = "UPDATE users SET intid = 'none' where userid = :d and intid != 'admin' ";
   $stmt = $this->link->prepare($sql);
   $stmt->execute([':d'=>$d]);
   $row = $stmt->rowCount();
   if($row > 0){
       echo ' <div class="alter alter-success p-5"> Has been deleted </div> ';
       header('location:customize.php?customize=edit');
       exit();
   }
   else{
    echo ' <div class="alter alter-danger p-5"> Has not been deleted </div> ';
    header('location:customize.php?customize=edit');
    exit();
   }
}

public function allow($ed){
     
    $sq = 'UPDATE users set  reg= "1" , status = "intente" WHERE userid =:ui ';
    $stmt = $this->link->prepare($sq);
    if($stmt->execute([':ui'=>$ed])){

    echo '<div class="alert  mr-3 p-3 alert-succes">REGESTERED</div>';

     
}

}


public function dismiss($ed){
     
    $sq = 'UPDATE users set  reg= "canceled" , status = "canceled" WHERE userid =:ui ';
    $stmt = $this->link->prepare($sq);
    if($stmt->execute([':ui'=>$ed])){

    echo '<div class="alert  mr-3 p-3 alert-succes">REGESTERED</div>';

     
}


}

public function  create_report($userid,$doc,$live,$task,$date){
    $tid = '';
      $sql = "INSERT INTO work_done VALUES (:tid,:usid,:doc,:live,:task,:date) ";
      $stmt = $this->link->prepare($sql);
      $stmt->execute([':tid'=>$tid ,':usid'=>$userid , ':doc'=> $doc , ':live'=>$live ,':task'=>$task ,':date'=>$date ]);
      
      $row = $stmt->rowCount() ;
      if($row > 0){
        echo "<div class=' card  border-left-success alert alert-success p-5 mr-6 '>  Reported</div>";

      }
      else{
          echo "<div class=' card  border-left-danger alert alert-danger p-5 mr-6 '> Not reported</div>";
      }

}


public function noteReport(){
    //intentee ^
  $inte  = "SELECT users.fname , users.lname ,users.status ,work_done.tId from work_done join users using(userid)  where live = 1 and status = 'intente';";
    $int = $this->link->prepare($inte);
    $int->execute(); 
    $intecount = $int->rowCount();
    $row = $int->fetch();
    //cuser ^
    $re  = "SELECT users.fname , users.lname ,users.status ,work_done.tId from work_done join users using(userid)  where live = 1 and status = 'cuser';";
    $stmt = $this->link->prepare($re);
    $stmt->execute(); 
    $rows = $stmt->fetch();
    $count = $stmt->rowCount();
  $sum =$count + $intecount;
    if($count < 1 && $intecount < 1){
        echo '<div class=" text-gray-700  "> No report </div>';
    }

    else{
       echo ' <div class=" text-gray-700  "> <a href="home.php?report=pr&rid='. $rows['tId'] .'" >Lebour report '. $count .'</a> ||   <a href="home.php?report=pr&rid='. $row['tId'] .'" >  intente reports '. $intecount .' </a> all report '. $sum .' </div> ';
    }





}

public function printR(){

    $re  = "SELECT users.fname ,users.status , users.lname , users.Email,work_done.tId , work_done.documantation ,work_done.task , mid(date ,1,10 ) as'date'  from work_done join users using(userid)  where live = 1 order by tId desc ;
    ";
    $stmt = $this->link->prepare($re);
    $stmt->execute(); 
    $rows = $stmt->fetchAll();
    $count = $stmt->rowCount();
    $st = '';
   if($count > 0){ 
        
    
    echo '
         
    

         <div class="container">
            <table class="table table-striped ">
        <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th> Done </th>
            <th>Dail/task</th>
            <th> date </th>
            <th> From </th>
            <th> Check </th>

        
        </tr>
        </thead>
        <tbody>';
    foreach($rows as $row){
  if($row['status'] == 'cuser'){
      $st = 'Company user';
  }
  elseif($row['status'] == 'intente'){
   $st = 'intente ';
  }
        echo '
         <tr>
        <td> '. $row['fname'] .' </td>
        <td> '. $row['lname'] .' </td>
        <td> '. $row['Email'] .' </td>
        <td> '. $row['documantation'] .' </td>
        <td> '. $row['task'] .' </td>
        <td> '. $row['date'] .' </td>
        <td> '. $st .' </td>
        <td> <a href="home.php?report=select&rid='. $row['tId'] .'" >Select</a> </td>
        
        </tr>
        
        
        ';

    }
    echo '
    
     
    </tbody>
    </table>
    </div>
    
    ';
}



}


public function printRbyid($id){

    $re  = "SELECT users.fname , users.lname , users.Email , work_done.documantation ,work_done.task , work_done.tId , mid(date ,1,10 ) as'date'  from work_done join users using(userid)  where live = 1 and work_done.tId =:tid ;
    ";
    $stmt = $this->link->prepare($re);
    $stmt->execute([':tid'=>$id]); 
    $rows = $stmt->fetchAll();
    $count = $stmt->rowCount();
   if($count > 0){ 
         echo '
         
         <div class="row">


    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
         
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Reports </h6>
            <h6 class="m-0 ml-7 font-weight-bold text-primary"> <a href="home.php?report=de"> × </a></h6>
          
          </div>
          <div class="card-body">

         <div class="container">
            <table class="table table-striped ">
        <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th> Done </th>
            <th>Dail/task</th>
            <th> date </th>
        
        </tr>
        </thead>
        <tbody>';
    foreach($rows as $row){

        echo '
         <tr>
        <td> '. $row['fname'] .' </td>
        <td> '. $row['lname'] .' </td>
        <td> '. $row['Email'] .' </td>
        <td> '. $row['documantation'] .' </td>
        <td> '. $row['task'] .' </td>
        <td> '. $row['date'] .' </td>
        
        </tr>
        
        
        ';

    }
    echo '
    
    </div>

        </div>

        </div>
        </div>
    </tbody>
    </table>
    </div>
    
    ';
}



}




public function rems($em,$mi){

    $sql = " SELECT users.fname,users.lname,users.email as'sender' ,massage.Email as'receiver' ,massage.mId , massage.massage ,massage.date,massage.status from massage join users using(userid) where users.Email = :em and live=1 and mid = :mi  group by massage.Email order by mId desc ;";
    $stmt = $this->link->prepare($sql);
    $stmt->execute([':em'=>$em , ':mi'=>$mi]); 
    $rows = $stmt->fetchAll();
    $count = $stmt->rowCount();
    
    

 foreach($rows as $row){
    $st = $row['status'];
    $t = '';

    if($st == 'cuser' ){
        $up = "UPDATE massage set live = 0 where mId =:em";
        $ty = $this->link->prepare($up);
        $ty->execute([':em'=>$row['mId']]);
       
        $t = 'Company users';
    }
    elseif($st == 'admin'){

        $up = "UPDATE massage set live = 0 where mId =:em";
        $ty = $this->link->prepare($up);
        $ty->execute([':em'=>$row['mId']]);
       
        $t = 'Company owner';
    }
    else{
        $up = "UPDATE massage set live = 0 where mId =:em";
        $ty = $this->link->prepare($up);
        $ty->execute([':em'=>$row['mId']]);
        $t = 'Part time user';
    }
        echo '
        <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold  text-uppercase mb-1">'. $row['fname'] .' '. $row['lname'] .'</div>
           
           <div class=" mb-0 alert alert-primary d-block text-gray-800">'. $row['massage'] .' </div>
        </div>
        <div class="col-auto">
  <form method="post" action >
        <textarea type="text"   name="message"  class="form-control" >    </textarea>

        
        <button class="btn btn-sm mt-2 mr-2 btn-primary btn-block" name="replay" type="submit">Replay</button> 
                    
            </form>         
        </div>
      </div>
    </div>
    <div class=" dropdown-item text-center small text-gray-500">
    . from '. $t .'  on '. $row['date'] .'

    </div>
        
        ';
 }

}


public function send($id,$msg,$rec,$sta){
$mi = '';
$sendto = 'massage';
$live = 1;
 $date = date(DATE_ATOM);
    $sql = "INSERT INTO massage VALUES(:mi,:id,:msg,:re,:da,:sta,:typ,:live)";
    $stmt = $this->link->prepare($sql);
    $stmt->execute(['mi'=>$mi ,':id'=>$id , ':msg'=>$msg, ':re'=>$rec ,':da'=>$date ,':sta'=>$sta,':typ'=>$sendto,':live'=>$live]);
    $row = $stmt->rowCount();
    if($row > 0){
        echo "<div class=' text-xs font-weight-bold text-success text-uppercase mb-1'>  Sent</div>";
        
    } 
    else{
        echo "<div class=' text-xs font-weight-bold text-danger text-uppercase mb-1'>Not Sent</div>";

    }

}

// for message send to



public function custom_send($sender  , $receiver){
//receiver

    $sqlreceiver = "SELECT * FROM users where userid=:re";
    $restmt = $this->link->prepare($sqlreceiver);
    $restmt->execute([':re'=>$receiver]);
    $rerow = $restmt->fetch();



//sender
    $sqlsender = "SELECT * FROM users where Email=:se";
    $sestmt = $this->link->prepare($sqlsender);
    $sestmt->execute([':se'=>$sender]);
    $serow = $sestmt->fetch();
   
    //currente message
    $current = "SELECT * from massage where Email =:sd and userid=:re  order by mId desc limit 1 ";
    $st = $this->link->prepare($current);
    $st->execute([':sd'=>$serow['Email'] , ':re'=>$rerow['userid']]); 
    $currente_msg = $st->fetch();

    //$st = $row['status'];
  

 
        echo '
        <div class="row">
    
    
        <div class="col-xl-7 col-lg-12">
            <div class="card shadow mb-4">
             
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Message </h6>
                <h6 class="m-0 ml-7 font-weight-bold text-primary"> <a href="home.php?report=a"> × </a>  </h6>
              
              </div>
        <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold  text-uppercase mb-1"> to '. $rerow['fname'] .' '. $rerow['lname'] .'</div>
           
           <div class=" mb-0 alert alert-primary d-block text-gray-800">'. $currente_msg ['massage'] .' </div>
        </div>
        <div class="col-auto">
  <form method="post" action >
        <input type="hidden" name="receiver" value="'. $rerow['Email']  .'">
        <input type="hidden" value="'. $rerow['Email']  .'">
        <textarea type="text"   name="message"  class="form-control" >    </textarea>
        <button class="btn btn-sm mt-2 mr-2 btn-primary btn-block" name="sendmsg" type="submit">Send</button> 
                    
            </form>         
        </div>
      </div>
    </div>
    <div class=" dropdown-item text-center small text-gray-500">
     from '. $sender.'

    </div>
    </div>
      
    </div>

</div>
        
        ';
 

}

// new function for searching report based fname lname and year only

public function sea($name , $date){

    $sql = " SELECT users.fname ,users.status , users.lname , users.Email,work_done.tId , work_done.documantation ,work_done.task , mid(date ,1,10 ) as'date'  from work_done join users using(userid)  where live = 1 and  date like concat( :date, '%') and fname like concat( :dangerousstring, '%') or lname like concat( :dangerousstring, '%')  or  status like concat( '%', :dangerousstring, '%')   order by tId desc ;
    ";
    $stmt = $this->link->prepare($sql);
    $stmt->execute([':dangerousstring'=>$name , ':date'=>$date]);
    $rows = $stmt->fetchAll();
    $count = $stmt->rowCount();
    if($count < 1){
        echo ' <div class="card  border-left-warning  shadow mb-5 ml-3" >
      
        <div class="card-header p-3"  >
        <p> '. $date .' <a class=" ml-7 font-weight-bold text-primary  " href="home.php?report=de"> × </a> </p>
    
        </div>
        <div class="card-body"  >
          <div class=" alert alert-warning p-5 "> <h6> No Report on that search  </h6> </div>
        </div>
        </div> ';
    }

    else{

      echo '  <div class="row">

     


    <div class="col-xl-12 col-lg-12">
        <div class="card  border-left-success shadow mb-5 ml-3">
         
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Result  on '. $name  .' and year '. $date.' </h6>
            <h6 class="m-0 ml-7 font-weight-bold text-primary"> <a href="home.php?report=de"> × </a></h6>
          
          </div>
          <div class="card-body">

      



         
         
    

          <div class="container">
             <table class="table table-striped ">
         <thead>
         <tr>
             <th>First name</th>
             <th>Last name</th>
             <th>Email</th>
             <th> Done </th>
             <th>Dail/task</th>
             <th> date </th>
             <th> From </th>
            
 
         
         </tr>
         </thead>
         <tbody>';
     foreach($rows as $row){
   if($row['status'] == 'cuser'){
       $st = 'Company user';
   }
   elseif($row['status'] == 'intente'){
    $st = 'intente ';
   }
         echo '
          <tr>
         <td> '. $row['fname'] .' </td>
         <td> '. $row['lname'] .' </td>
         <td> '. $row['Email'] .' </td>
         <td> '. $row['documantation'] .' </td>
         <td> '. $row['task'] .' </td>
         <td> '. $row['date'] .' </td>
         <td> '. $st .' </td>
        
         
         </tr>
         
         
         ';
 
     }
     echo '
     
      
     </tbody>
     </table>
     </div>
     </div>

     </div>

     </div>
     </div>
     
     ';








        
    }
}




}

