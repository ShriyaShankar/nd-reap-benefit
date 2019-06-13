<html>
    <head></head>
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
            echo("<script>docuemnt.getElementById('floodimage').innerHTML = '
            <img src=\"$imageURL\" class="img-thumbnail">'</script>");
        }
    }
    else {
        echo "0 results";
    }
    
    // Close connection
    $conn->close();
?>