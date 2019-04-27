<?php
$servername = "srv-captain--mysqldb-db";
$username = "root";
$password = "S0lvesm@lld3ntbig";
$dbname = "nd_manager";
$table = "data";
// // Create connection
// $conn = new mysqli($servername, $username, $password);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
// echo "Connected successfully";
// $conn->close();

$dbh = new PDO('mysql:host=srv-captain--mysqldb-db;dbname=nd_manager', $username, $password);
if ($dbh != null) {
    echo "Connected";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>

