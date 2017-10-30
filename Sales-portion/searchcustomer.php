<?php
require_once 'connect.php';
session_start();
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
    //unset($_SESSION['loggedin']);
}
?>
<?
if(isset($_REQUEST['submit'])){
    $name=$_POST['fname'];
    $sql=" SELECT * FROM customer WHERE fname like '%".$name."%' ";
    $q=mysql_query($sql);
}
else{
    $sql="SELECT * FROM users";
    $q=mysql_query($sql);
}
?>
<form method="post">
    <table width="200" border="1">
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" value="<?php echo $name;?>" /></td>
    <td>Email</td>
    <td><input type="text" name="email" value="<?php echo $email;?>" /></td>
    <td><input type="submit" name="submit" value=" Find " /></td>
  </tr>
</table>
</form>
<table>
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Address</td>
    </tr>
    <?php
    while($res=mysql_fetch_array($q)){
    ?>
    <tr>
        <td><?php echo $res['fname'].' '.$res['lname'];?></td>
        <td><?php echo $res['user_email'];?></td>
        <td><?php echo $res['address'];?></td>
    </tr>
    <?php }?>
</table>