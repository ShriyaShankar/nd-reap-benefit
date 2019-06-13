<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ND Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://2019.kmun.in/css/agency.min.css">
    </head>
    <body>
        <!-- Portfolio Grid -->
    <section id="portfolio">
      <div class="container">
        <div class="row">
          <!-- <div class="col-lg-12 text-center"> -->
            <h2 class="section-heading text-uppercase">Images</h2>
            <h3 class="section-subheading"></h3>
</div>
<div class="row" id="images">
</div>
         <!-- </div> -->
        </div>
</div>
</section>

        <script>
            var imgArray = [];
        </script>

        <script>
            var innerhtml;
                for(int i=0; i<imgArray.length; i++)
                {
                    innerhtml += `
                }
                document.getElementById('images').innerHTML = innerhtml;
        </script>

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
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $imageURL = $row["FloodImageURL"];
            if($imageURL != NULL && $imageURL != '')
            {
                echo("<script>imgArray.push(\'<a href=\"$imageURL\">$imageURL</a>\');</script>");
            }
        }
    }
    else {
        echo "0 results";
    }
    
    // Close connection
    $conn->close();
?>


</body>
</html>