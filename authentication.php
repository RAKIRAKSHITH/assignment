<?php      
    include('connection.php');  
if (isset($_POST['submit']))
 {

    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
     

        $sql = "SELECT * FROM accounts where  username = '$username' and password = '$password'";  
    
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
      if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
}

   $sql = "SELECT * FROM accounts";  
$result = mysqli_query($con, $sql);  
if($count ==1)
{
?>



    <link rel = "stylesheet" type = "text/css" href = "style2.css">  
<table border=1  align="center" style="border-collapse:collapse">
<tr>
 <th  colspan="2" > <h2>ACCOUNT TABLE</h2></th>
</tr>
<tr > 
<th>NAME</th>
<th>PASSWORD</th>
</tr>
<?php

while($rows=mysqli_fetch_array($result)) 
  {
     echo "<tr>
	<td>".$rows['username']."</td>
	<td>".$rows['password']."</td>
            </tr>";
  }
}
  else
   {
	
   }

mysqli_close($con);
?>  
</table>  



