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
    $sql = "SELECT Latitude, Longitude, Category, description from Clay_Ganesha_Idol";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $floatlat = floatval( $row["Latitude"]);
            $floatlng = floatval( $row["Longitude"]);
            $cat = $row["Category"];
          //  $desc = $row["description"];

            /* Comparison to pick out appropriate icon */

            if($cat == 'waste'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: waste}).addTo(mymap);
                marker.bindPopup(\"$desc\");
            </script>");
            }

            if($cat == 'water'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: water}).addTo(mymap);
                marker.bindPopup(\"$desc\");
            </script>");
            }

             if($cat == 'flood'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: flood}).addTo(mymap);
                marker.bindPopup(\"$desc\");
            </script>");
             }

            if($cat == 'air'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: air}).addTo(mymap);
                marker.bindPopup(\"$desc\");
            </script>");
            }

            if($cat == 'sanitation'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: sanitation}).addTo(mymap);
                marker.bindPopup(\"$desc\");
            </script>");
            }

            if($cat == 'tree'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: tree}).addTo(mymap);
                marker.bindPopup(\"$desc\");
            </script>");
            }

            if($cat == 'Ganesha_Idol'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: Ganesha_Idol}).addTo(mymap);
            }
        }
    } 
    else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
?>