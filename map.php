<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145741958-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-145741958-1');
    Feature-Policy: geolocation '*'

    </script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eco Ganesha Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Leaflet's CSS -->
    <!-- <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
    integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
    crossorigin=""></script>

    <!-- Sweetalert JS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
            #mapid {
            height: 400px;
            z-index: 1;
            }


            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}

            .open-button {
              background-color: #555;
              color: white;
              padding: 16px 20px;
              border: none;
              cursor: pointer;
              opacity: 0.8;
              position: fixed;
              bottom: 23px;
              right: 28px;
              width: 280px;
            }

            /* The popup form - hidden by default */
            .form-popup {
              display: none;
              position: fixed;
              bottom: 0;
              right: 15px;
              border: 3px solid #f1f1f1;
              z-index: 1000;
            }

            /* Add styles to the form container */
            .form-container {
              max-width: 300px;
              padding: 10px;
              background-color: white;
            }

            /* Full-width input fields */
            .form-container input[type=text], .form-container input[type=password] {
              width: 100%;
              padding: 15px;
              margin: 5px 0 22px 0;
              border: none;
              background: #f1f1f1;
            }

            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container input[type=password]:focus {
              background-color: #ddd;
              outline: none;
            }

            /* Set a style for the submit/login button */
            .form-container .btn {
              background-color: #4CAF50;
              color: white;
              padding: 16px 20px;
              border: none;
              cursor: pointer;
              width: 100%;
              margin-bottom:10px;
              opacity: 0.8;
            }

            /* Add a red background color to the cancel button */
            .form-container .cancel {
              background-color: red;
            }

            /* Add some hover effects to buttons */
            .form-container .btn:hover, .open-button:hover {
              opacity: 1;
            }

    </style>
</head>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
        
        /* LogOut button */
        h2 {
        position: absolute;
        left: 10px;
        top: 340px;
        z-index: 100;
        }
        
        /* Category Key button */
        h3 {
        position: absolute;
        left: 130px;
        top: 340px;
        z-index: 100;
        }
        
        /* Provides padding and makes the keys red and uniform */
        
        .button {
        background-color: #f44336;
        border: none;
        color: white;
        padding: 10px 24px;;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 3px 1px;
        cursor: pointer;
        }

        fieldset {
        overflow: hidden
        }

        .some-class {
        float: left;
        clear: none;
        }

        label {
        float: left;
        clear: none;
        display: block;
        padding: 0px 1em 0 0;
        }

        input[type=radio],
        input.radio {
        float: left;
        clear: none;
        margin: 10px 10 0 2px;
        } 
        
     </style>
</head>

<body>

    <div id="mapid"></div>

    <!-- <script src="firebase.js"></script> -->
    <!-- <script src="main.js"></script> -->


    <script>
        /* Display of map */
        var storeloc;
        var mymap = L.map('mapid'), infoWindow;
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            center: [12.925, 77.595],
            // minZoom: 4,
            // maxZoom: 20,
            id: 'mapbox.streets',
        }).addTo(mymap);

        /* Geolocation - autolocate */
        mymap.locate({setView: true, maxZoom: 16});
        function onLocationFound(e) {
            var radius = e.accuracy / 2;
            L.marker(e.latlng).addTo(mymap).bindPopup("You are within " + radius + " meters from this point").openPopup();
            L.circle(e.latlng, radius).addTo(mymap);
            document.getElementById("locationdisplay").innerHTML = e.latlng;
            document.getElementById('lat').setAttribute("value", e.latlng.lat);
            document.getElementById('long').setAttribute("value", e.latlng.lng);
            document.getElementById('lcn').setAttribute("value", `${e.latlng.lat},${e.latlng.lng}`);
        }
        
        /* Geolocation error */
        function onLocationError(e) {
            // swal({
            // icon: 'error',
            // title: 'Oops',
            // text: e.message,
            // button: 'OK',
            // });
        }

        mymap.on('locationerror', onLocationError);
        mymap.on('locationfound', onLocationFound);


        var category_icon = L.Icon.extend({
            options: {
                iconSize: [25, 25]
                }
        });

        var visarjane = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/1197/1197849.svg'});
        var ganesha = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/805/805294.svg'});
       </script>
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
   // $sql = "SELECT latitude, longitude, category, description from data";
    $sql = "SELECT Latitude, Longitude, Category, Landmark from Clay_Ganesha_Idol";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $floatlat = floatval( $row["Latitude"]);
            $floatlng = floatval( $row["Longitude"]);
            $cat = $row["Category"];
            $landmark = $row["Landmark"];
           // $desc = $row["description"];

            //$getcategory = "Select * from Clay_Ganesha_Idol";
            //$getcategoryresult = $conn->query($getcategory);
            //$getcategoryrow = $getcategoryresult->fetch_assoc();
         //   $cat = $getcategoryrow["primary_category"];    //Assigning the category to the primary key of the enumerated_category table
            echo("<script>console.log('$cat');</script>");

            /* Comparison to pick out appropriate icon */
          //  if($desc != NULL){
           /* if($cat == 'Waste'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: waste}).addTo(mymap);
                   { marker.bindPopup(\"$desc\"); }
            </script>");
            }

            if($cat == 'Water'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: water}).addTo(mymap);
                   { marker.bindPopup(\"$desc\"); }
            </script>");
            }

             if($cat == 'Urban Flooding'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: flood}).addTo(mymap);
                    marker.bindPopup(\"$desc\");
            </script>");
             }

            if($cat == 'Air'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: air}).addTo(mymap);
                    marker.bindPopup(\"$desc\");
            </script>");
            }

            if($cat == 'Sanitation'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: sanitation}).addTo(mymap);
                    marker.bindPopup(\"$desc\");
            </script>");
            }

            if($cat == 'Fallen Tree'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: tree}).addTo(mymap);
                    marker.bindPopup(\"$desc\");
            </script>");
            }
            
            if($cat == 'Public Urination'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: urination}).addTo(mymap);
                    marker.bindPopup(\"$desc\");
            </script>");
            }  */
            if($cat == 'GaneshaIdol'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: ganesha}).addTo(mymap);
                    marker.bindPopup(\"$shop <br> $landmark\"); 
            </script>");
            }

            if($cat == 'GaneshaVisarjane'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: visarjane}).addTo(mymap);
                    marker.bindPopup(\"$shop <br> $landmark\"); 
            </script>");
            }
        // }
        }
    } 
    else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
?>
