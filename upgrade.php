<?php 




class conn {

  protected  $host = 'localhost';
  protected  $user = 'chris';
  protected  $pass = 'bbbbb';
  protected  $dbname = 'intent_ms';
  protected  $dns;



       
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

  public function retrive(){
 
    $sql = "SELECT * from users ";
    $stmt = $this->link->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll() ;
    $st = '';
    $preve = '';
    
    echo '<table class="table table-dark">
    <thead>
        <tr>
            <th>
                fname
            </th>
            <th>
                lname
            </th>
            <th>
            Email
        </th>
        <th>
               intente/cuser
            </th>
            <th>
                Password
            </th>
            <th>
                Occupation
            </th>
            <th>
            Previlegis
        </th>
        <th>
            Allow
        </th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>';

    foreach( $rows as $row){
     
        if($row['status'] == 'cuser' && $row['reg'] == '1' ){
            $st = ' Company user ' ;
            $preve = 'Regestered';
           
        }
        elseif($row['status'] == 'cuser' && $row['reg'] == '0'){
            $preve = 'Unregestered';
            $st = ' Requesting to work ' ;

        }
        elseif($row['status'] == 'intente' && $row['reg'] == '0'){
            $st  = ' Requesting for internalship ' ;
            $preve = 'Unregestered';

        }
        elseif($row['status'] == 'admin' ){
            $preve = 'Regestered';
            $st  = ' Adminstrator ' ;
        }
     else{
        $preve = 'Regestered';
        $st  = ' Company user ' ;
     
    }
        echo '
        
        <tr>
      
                <td><input style="border:none ; outline:none" name="fname" type="text" value="'. $row['fname'] .'"></td>
             
                <td><input style="border:none ; outline:none" name="lname" type="text" value="'. $row['lname'] .'"></td>
                <td><input style="border:none ; outline:none" name="Email" type="text" value="'. $row['Email'] .'"></td>
                <td><input style="border:none ; outline:none" name="status" type="text" value="'. $row['status'] .'"></td>
                <td><input style="border:none ; outline:none" name="password" type="text" value="'. $row['password'] .'"></td>
                <td>  '.$preve .' </td>
                <td> 
                 <select name="prev" id="">
                <option value="1">Register</option>
                <option value="0">Unregister</option>
                
                </select> </td>
                
                <td> '.$st.' </td>
                <td><a  class="btn btn-info" href="table_edite.php?edit='. $row['userid'] .'">Edit</a> || <a  class="btn btn-danger" href="table_edite.php?delete='. $row['userid'] .'">Delete</a></td>
    
                </tr>


        ';

      
    }
   }
   public function update($id,$fname,$lname,$email,$status,$pass,$reg){
   $sql = "UPDATE users set fname=:fname ,lname=:lname,Email=:Email,status=:statu,password=:pass,reg=:reg where userid=:id";
   $stm = $this->link->prepare($sql);
   if($stm->execute(['fname'=>$fname,':lname'=>$lname,':Email'=>$email,':statu'=>$status,':pass'=>$pass,':reg'=>$reg,':id'=>$id])){
       echo '<div class="alert alert-success"> updated</div>  ';
   }

   }
   public function delete($id){
            

   } 

}