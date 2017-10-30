<?php
require_once 'connect.php';
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(empty($_SESSION['user_id'])){
        header('Location:loginform.inc.php');
    
    //unset($_SESSION['loggedin']);
}
?>
<?php


    $result1= mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_piece`,`P_unitprice`,`P_model` FROM project.`categories` INNER JOIN project.`product`ON project.`categories`.`Cat_id`=project.`product`.`Cat_id`WHERE project.`product`.`D_id`='1';");
$query=mysql_query("SELECT `Cat_name`FROM project.`categories`WHERE project.`categories`.`D_id`='1'  ORDER BY  `Cat_id` ");
$query_p=mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_model`
FROM project.`product`
INNER JOIN project.`categories` ON project.`categories`.`Cat_id`=project.`product`.`Cat_id` 
 WHERE project.`categories`.`D_id`='1'ORDER BY project.`product`.`P_name`");
$query_z=mysql_query("SELECT project.`categories`.`Cat_name`,project.`product`.`P_name`,`P_model`
FROM project.`product`
INNER JOIN project.`categories` ON project.`categories`.`Cat_id`=project.`product`.`Cat_id` 
 WHERE project.`categories`.`D_id`='1'ORDER BY project.`product`.`P_name`");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sales Section</title>
        <link rel="stylesheet" href="style.css">
        <style>
/*        input:focus {*/
/*    background-color: yellow;*/
/*}*/
    .right{
             -webkit-transition: width 2s,height 3s; /* For Safari 3.1 to 6.0 */
    transition: width 2s,height 3s;
    width:300px;
        height:500px;
    float:right;
        text-align:left;
    padding:10px;
        }
        </style>
    </head>
         <body bgcolor=" #FFFFC0">

        <header>
        <h1>Add New Product</h1>
        </header>

        <nav>
            <div class="submit">
         <form action="product.php" method="POST"><input type="submit" class="cat"style="font-face: 'Comic Sans MS'; font-size: smaller; color: teal; background-color: #FFFFC0; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></form></div>
        


        </nav>

   
        <!DOCTYPE html>
        <html>
        <head>
        <style>
                
        table {
            width:100%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        table#t01 tr:nth-child(even) {
            background-color: #eee;
        }
        table#t01 tr:nth-child(odd) {
           background-color:#fff;
        }
        table#t01 th	{
            background-color: black;
            color: white;
        }
        

        </style>
        </head>
        <body>
          
                 <section>
            <form action="addproductpage.php" method="POST"><br>
                <?php
if(isset($_SESSION['Duality'])&&!empty($_SESSION['Duality'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>This product is already in the database.</strong></p>";
    unset($_SESSION['Duality']);
}
if(isset($_SESSION['dualityi'])&&!empty($_SESSION['dualityi'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>This product is already have an image.</strong></p>";
    unset($_SESSION['dualityi']);
}
if(isset($_SESSION['done'])&&!empty($_SESSION['done'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Image is added.</strong></p>";
    unset($_SESSION['done']);
}
if(isset($_SESSION['imagetype'])&&!empty($_SESSION['imagetype'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Please select an imagetype file.</strong></p>";
    unset($_SESSION['imagetype']);
}
if(isset($_SESSION['noimage'])&&!empty($_SESSION['noimage'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Select an image.</strong></p>";
    unset($_SESSION['noimage']);
}
if(isset($_SESSION['nodatai'])&&!empty($_SESSION['nodatai'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>No saved image for this product.</strong></p>";
    unset($_SESSION['nodatai']);
}
if(isset($_SESSION['fillc'])&&!empty($_SESSION['fillc'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Fill up the requirements to add an image.</strong></p>";
    unset($_SESSION['fillc']);
}


if(isset($_SESSION['added'])&&!empty($_SESSION['added'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>New Product Added.</strong></p>";
    unset($_SESSION['added']);
}
if(isset($_SESSION['Sorry'])&&!empty($_SESSION['Sorry'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>No data added.Try again.</strong></p>";
    unset($_SESSION['Sorry']);
}
if(isset($_SESSION['fill'])&&!empty($_SESSION['fill'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Please fill up the requirements.</strong></p>";
    unset($_SESSION['fill']);
}
if(isset($_SESSION['deletei'])&&!empty($_SESSION['deletei'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Image has been deleted successfully.</strong></p>";
    unset($_SESSION['deletei']);
}
if(isset($_SESSION['nodata'])&&!empty($_SESSION['nodata'])){
      echo "<p style='color:red;text-align:left;font-size:21px;
                                        padding-top:5px'>
                               <strong>Select a product first.</strong></p>";
    unset($_SESSION['nodata']);
}

?>

<h3>Product Details</h3>
                Product name : <input type="text"style="font-face: 'Comic Sans MS';font-size: medium; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"   name="p_name"pattern="[a-zA-Z0-9\s]+" title="The product name must in A-Z a-z format"><br><br>
                
 Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <select name="p_category"style="font-face: 'Comic Sans MS'; font-size: medium; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"    > <option disabled selected style='display: none;'>Category name.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
            <!-- Loop For Fetch Result -->        
            <?php 
while($row = mysql_fetch_array($query,MYSQL_NUM) ) : 
                ?>
             <option  >
                 <?php 
echo($row[0]);
?></option>
            <?php endwhile; ?> 
            <!-- End Loop for Fetch Result -->
    </select><br><br>

                                
                piece    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="number" style="font-face: 'Comic Sans MS'; font-size: medium; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  min="1"name="p_piece"><br><br>
                Price   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="number" style="font-face: 'Comic Sans MS'; font-size: medium; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  min="0" name="p_price"><br><br>
                Model    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text"style="font-face: 'Comic Sans MS'; font-size: medium; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"   name="p_model"><br><br>
        <div class="sub"><input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Add New Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                </div>
		  
         </form>
            	<form action="imagecheck.php" method="post" enctype="multipart/form-data" >
		  <div>
		  	<h3>Image Upload:</h3>
		  </div>
		  <div>
		  	<label>Image</label>
<!--		  	<input type="hidden" name="MAX_FILE_SIZE" value="500000">-->
			<input type="file" name="image" /><br><br>
                Product name:<select name="o_pn"style="font-face: 'Comic Sans MS'; font-size: medium; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  >
               <option disabled selected style='display: none;'>Product name(category[model])
      
            <!-- Loop For Fetch Result -->        
<?php 
while($row = mysql_fetch_array($query_p,MYSQL_NUM) ) : 
?>
<?php 
print  '<option >'.$row[1].'('.$row[0].'['.$row[2].']'.')'.'</option>';
?>
            <?php endwhile; ?> 
            <!-- End Loop for Fetch Result -->
              </select><br><br></div>
		     <div class="sub"><input type="submit" name="submit" style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
		  </div>
		</form>
                    <form action="deleteimage.php" method="post">
        <h3>Image Delete:</h3>
          Product name:<select name="o_pn"style="font-face: 'Comic Sans MS'; font-size: medium; color: teal; background-color:#E6E6FA ; border: 1pt ridge lightgrey"  >
               <option disabled selected style='display: none;'>Product name(category[model])
      
            <!-- Loop For Fetch Result -->        
<?php 
while($row = mysql_fetch_array($query_z,MYSQL_NUM) ) : 
?>
<?php 
print  '<option >'.$row[1].'('.$row[0].'['.$row[2].']'.')'.'</option>';
?>
            <?php endwhile; ?> 
            <!-- End Loop for Fetch Result -->
    </select><br><br>
        <div class="sub"><input type="submit" style="font-face: 'Comic Sans MS'; font-size: medium;cursor:pointer; color: white; background-color: #667A44; border: 1pt ridge lightgrey" value="&nbsp;&nbsp;&nbsp;&nbsp;Delete Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></div>
    </form>                

  
                </div>
   

        </section>
        <footer>
        Admin Panel
        </footer>

    </body>
        
</html>
