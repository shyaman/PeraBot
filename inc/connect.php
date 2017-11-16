<?php 
try {
    $conn = new PDO("sqlsrv:server = tcp:perabot.database.windows.net,1433; Database = perabot", "perabotDev", "per@bot1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>