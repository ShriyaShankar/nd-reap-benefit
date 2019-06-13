<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ND Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="row" id="floodimage">
        </div>
    </body>
</html>

<?php
    
    //Credentials
    $servername = "localhost";
    $username = "admin";
    $password = "r3apb3n3fit";
    $dbname = "nd_manager";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    /* To read db and print out rexpective icons with description */
    $sql = "SELECT FloodImageURL from data where category=5";
    $result = $conn->query($sql)

    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $imageURL = $row["FloodImageURL"];
            //echo("<script>docuemnt.getElementById('floodimage').innerHTML = '<img src=\"$imageURL\" class=\"img-thumbnail\">'</script>");
        }
    }
    else {
        echo "0 results";
    }
    
    // Close connection
    $conn->close();
?>