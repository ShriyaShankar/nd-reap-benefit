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

    // Form values are mapped to database fields
    if(isset($_POST['submit']))
    {
        echo "Record submitted. ";
        $name=$_POST['name'];
        $latitude=$_POST['latitude'];
        $longitude=$_POST['longitude'];
        $description=$_POST['description'];
        $category=$_POST['category'];
        $location=$_POST['location'];
        $severity=$_POST['severity'];
        $FloodImageURL = $_POST['floodImageURL'];
        
        //Get row where category is equal to the subcategory
        $getcategory = "Select * from enumerated_category where $category=sub_category"
        $getcategoryresult = mysqli_query($conn, $getcategory);
        $getcategoryrow = mysqli_fetch_array($getcategoryresult);
        $category = $getcategoryrow[id];    //Assigning the category to the primary key of the enumerated_category table

        // Query to insert values into database
        $sql = "INSERT INTO data (name, latitude, longitude, category, description, location, severity, FloodImageURL)
        VALUES ('$name', '$latitude', '$longitude', '$category', '$description', '$location', '$severity', '$FloodImageURL')";

        // For successful record submission, display message
        if ($conn->query($sql) === TRUE)
        {
            echo "Redirecting... ";
            echo("<script>swal({
                  icon: 'success',
                  title: 'Congratulations!',
                  text: 'You are a great citizen! Thanks for the submission :)',
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
    }
?>
