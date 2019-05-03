<!-- <!DOCTYPE html> -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
</html>

<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}

// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
//// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}
//// Check if $uploadOk is set to 0 by an error
//if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File uploaded";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
//}

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
    $severity=$_POST['severity'];
    $sql = "INSERT INTO data (name, latitude, longitude, category, description, location, severity)
    VALUES ('$name', '$latitude', '$longitude', '$category', '$description', '$location', '$severity')";

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
