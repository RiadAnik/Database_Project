<?php
require_once 'connect.inc.php';
require_once 'core.inc.php';
if(isset($_POST['username']) && isset($_POST['password'])){
$username=$_POST['username'];
$password=$_POST['password'];
$password_hash=md5($password);
    
    
    if(!empty($username) && !empty($password)){
        $user=mysql_real_escape_string($username);
        $pass=mysql_real_escape_string($password);
    
        $query="SELECT `id` FROM `user` WHERE `username`='$user' AND `password`='$pass' ";
        if($query_run=mysql_query($query)){
        $query_num_rows=mysql_num_rows($query_run);
            if($query_num_rows==0){
                   $_SESSION['v']='v';
 header('Location:loginform.inc.php');
            }
            else if($query_num_rows>=1){
                $user_id=mysql_result($query_run,0,'id');
                $_SESSION['user_id']=$user_id;
 header('Location:login2.php');
                
            }
        
        } 
        
    }
}
?>