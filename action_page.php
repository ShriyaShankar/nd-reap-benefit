
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nd_manager";
$table = "data";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
    echo "Connection successful <br>";
}

   
if(isset($_POST['submit'])){
    echo "Record submitted. ";

    $name=$_POST['name'];
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];
    $description=$_POST['description'];
    $category=$_POST['category'];
    $location=$_POST['location'];
    $sql = "INSERT INTO data (name, latitude, longitude, category, description, location)
    VALUES ('$name', '$latitude', '$longitude', '$category', '$description', '$location')";
    
if ($conn->query($sql) === TRUE) {
    echo "Redirecting... ";
    header('location: main.php');
    } 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>