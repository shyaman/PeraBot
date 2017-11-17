<?php 
require_once('inc/connect.php'); 
echo "hello world heee";

	$qD = "SELECT TOP (1000) [fName]
      ,[lName]
      ,[mailAddress]
  FROM [dbo].[contacts]";
    $qDep = mysqli_query($conn,$qD);
    $DNo = mysqli_fetch_assoc($qDep);
    echo $DNo['mailAddress'];

?>
