<!-- This code is executed after the form is submitted by user -->

<!-- For sweet alert -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
</html>

<?php

    // Credentials to access MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "S0lvesm@lld3ntbig";
    $dbname = "nd_manager";
    //$table = "data";
    $table = "Diwali_Data";

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

    // Form values are mapped to database fields
  //  if(isset($_POST['submit']))
  //  {
       /* $name=$_POST['name'];
        $latitude=$_POST['latitude'];
        $longitude=$_POST['longitude'];
        $description=$_POST['description'];
        $category=ucfirst($_POST['category']);
        $location=$_POST['location'];
        $severity=$_POST['severity'];
        $FloodImageURL = $_POST['floodImageURL'];
        $TypeOfIdol = $_POST['idol'];
        */
      //  echo "Entered if";
        $name=$_POST['name'];
        $latitude=$_POST['latitude'];
        $longitude=$_POST['longitude'];
      //  $category=ucfirst($_POST['category']);
        $location=$_POST['location'];
      //  $landmark=$_POST['landmark'];
     //   $FloodImageURL = $_POST['floodImageURL'];
        $WardNumber = $_POST['WardNumber'];
        $PhoneNumber = $_POST['PhoneNumber'];
       
        //Get row where category is equal to the subcategory
      //  $getcategory = "Select * from enumerated_category where '$category'=sub_category";
      //  $getcategoryresult = $conn->query($getcategory);
      //  $getcategoryrow = $getcategoryresult->fetch_assoc();
       // $category = $getcategoryrow["id"];    //Assigning the category to the primary key of the enumerated_category table

        // Query to insert values into database
        $sql = "INSERT INTO Diwali_Data (Name, WardNumber, PhoneNumber, Latitude, Longitude)
        VALUES ('$name', '$WardNumber', '$PhoneNumber', '$latitude', '$longitude')";
        echo "Record submitted. ";


        // For successful record submission, display message
        if ($conn->query($sql) === TRUE)
        {
            echo "Redirecting... ";
            echo("<script>swal({
                  icon: 'success',
                  title: 'Congratulations!',
                  text: 'You are a great citizen! Thanks for the submission :',
                  button: 'OK',
                  closeOnClickOutside: false
            }).then(function(){window.location='main.php'});</script>");
        }
        
        // Error message for unsuccessful attempt
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo("<script>swal({
                  icon: 'error',
                  title: 'Oops!',
                  text: 'There's an error on our end :(. Contact us!',
                  button: 'OK',
                  closeOnClickOutside: false
            }).then(function(){window.location='main.php'});</script>");
        }
        
        // Close connection
        $conn->close();
 //   }
?>
