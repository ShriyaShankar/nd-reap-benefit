<!-- <!DOCTYPE html> -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
</html>

<?php
$servername = "localhost";
$username = "admin";
$password = "r3apb3n3fit";
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
    echo("<script>swal({
          icon: 'success',
          title: 'Congratulations!',
          text: 'You are a great citizen! Thanks for the submission :)',
          button: 'OK',
          closeOnClickOutside: false
    }).then(function(){window.location='main.php'});</script>");
    }
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo("<script>swal({
          icon: 'error',
          title: 'Oops!',
          text: 'There's an error on our end :(. Contact us!',
          button: 'OK',
          closeOnClickOutside: false
    }).then(function(){window.location='main.php'});</script>");
    }
    $conn->close();
}

?>
