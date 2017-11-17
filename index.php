<?php 
require_once('inc/connect.php'); 
echo "hello world heee";

	$qD = "SELECT * FROM contacts";
    $qDep = $conn->query("qD");
    
    echo "<table>"; 
        echo '<tr><th>fName</th><th>lName</th><th>email</th></tr>';
        while($row = $qDep->fetch()){  
            echo "<tr><td>" . $row['fName'] . "</td><td>" . $row['lName'] . "</td><td>" . $row['email'] . "</td></tr>";  
            }

        echo "</table>";

?>
