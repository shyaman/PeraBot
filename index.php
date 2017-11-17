<?php 
require_once('inc/connect.php'); 
echo "hello world heee";

	$qD = "SELECT TOP (1000) [fName]
      ,[lName]
      ,[mailAddress]
  FROM [dbo].[contacts]";
    $qDep = mysqli_query($conn,$qD);
    $DNo = mysqli_fetch_assoc($qDep);
    
    echo "<table>"; 
        echo '<tr><th>fName</th><th>lName</th><th>email</th></tr>';
        while($row = mysqli_fetch_assoc($result)){  
            echo "<tr><td>" . $row['fName'] . "</td><td>" . $row['lName'] . "</td><td>" . $row['email'] . "</td></tr>";  
            }

        echo "</table>";

?>
