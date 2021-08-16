
<?php include_once 'upgrade.php';


 $lead = new conn();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="str/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<link href="str/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Edit Delete</title>
</head>
<body class="container">
<form action="" method="post">
    <?php
        $lead->retrive();
       
        if(!empty($_REQUEST['delete'])){
            $lead->delete($_REQUEST['delete']);
        }
        
        elseif(!empty($_REQUEST['edit'])){

            $lead->update($_REQUEST['edit'],$_POST['fname'],$_POST['lname'],$_POST['Email'],$_POST['status'],$_POST['password'],$_POST['prev']);
        }
       
       ?>
    
            <select name="prev" id="">
            <option value="1">Register</option>
            <option value="0">Unregister</option>
            
            </select>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    </form>
 


</body>
</html>