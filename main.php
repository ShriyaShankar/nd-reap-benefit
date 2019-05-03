<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ND Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
    integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
    crossorigin=""></script>

    <!-- Bootstrap CSS for Grid System -->

    <!-- Sweetalert JS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
            #mapid {
            height: 400px;
            z-index: 1;
            }


            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}

            /* Button used to open the contact form - fixed at the bottom of the page */
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
/*              z-index: 1;*/

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
<style>
h2 {
  position: absolute;
  left: 10px;
  top: 330px;
  z-index: 100;
}
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
</style>
</head>
    
<body>
  <div class="container">
    <div id="mapid"></div>
  </div>
    <div>
            
          <h2><button  class="button" onclick="mainApp.logOut()">LogOut</button></h2>



            <form action="action_page.php" method = "POST" class="form-container" enctype="multipart/form-data">
                <!-- <h1>Login</h1> -->
                 <p>The Location is </p>
            <p id="locationdisplay"></p>
                <label for="identifier" id="identifier"></label>
                <input type="text" placeholder="Enter Name" name="name" id="form-name" readonly required>
                <label for="latitude"><b>Latitude</b></label>
                <input type="text" placeholder="Enter latitude" name="latitude" required id="lat">
                <label for="longitude"><b>Longitude</b></label>
                <input type="text" placeholder="Enter longitude" name="longitude" required id="long">


                <label><b>Category:<br><b/></label>
                <select name="category" required>
                    <option disabled="disabled" selected="selected">---Select Category--</option>
                      <option value="waste">Waste</option>
                      <option value="water">Water</option>
                      <option value="air">Air</option>
                      <option value="sanitation">Sanitation</option>
                      <option value='flood'>Urban Flooding</option>
                </select>
                <br>
                <label for="description"><br><b>Description</b></label>
                <input type="text" placeholder="Describe the problem" name="description" required>
                    
                <input type="file" name="fileToUpload" id="fileToUpload">
         <!--       <input type="submit" value="Upload Image" name="submit">  -->
                Severity: <input type="range" name="severity" min="0" max="5">
                
                <label for="location"><b>Location</b></label>
                <input type="text" placeholder="<br>Location:" name="location" required id="lcn">

                <input type="submit" value="Submit" name="submit">

<!--                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>-->
              </form>

    </div>

    <!-- <button class="open-button" onclick="openForm()">Open Form</button> -->



<!-- <div class="form-popup" id="myForm"> -->

</div>

    <script src="firebase.js"></script>
    <script src="main.js"></script>
    <script>
        var mymap = L.map('mapid'), infoWindow;
      //  mymap.locate({setView: true, maxZoom: 18});
            // L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            // // maxZoom: 18,
            // id: 'mapbox.streets',
            // accessToken: 'pk.eyJ1IjoiZ3RtcHJrc2hyYiIsImEiOiJjamZ0bXBqZnMxd3E5MnduejVjdGpuN2R4In0.vvrRpEdZWNwaKUO6vmgRHw'
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            minZoom: 4,
            maxZoom: 20,
            id: 'mapbox.streets',
            //accessToken: 'pk.eyJ1IjoiZ3RtcHJrc2hyYiIsImEiOiJjamZ0bXBqZnMxd3E5MnduejVjdGpuN2R4In0.vvrRpEdZWNwaKUO6vmgRHw'
        }).addTo(mymap);


		mymap.locate({setView: true, maxZoom: 16});
		function onLocationFound(e) {
		  var radius = e.accuracy / 2;
      L.marker(e.latlng).addTo(mymap).bindPopup("You are within " + radius + " meters from this point").openPopup();
      L.circle(e.latlng, radius).addTo(mymap);
      document.getElementById("locationdisplay").innerHTML = e.latlng;
      document.getElementById('lat').setAttribute("value", e.latlng.lat);
      document.getElementById('long').setAttribute("value", e.latlng.lng);
      document.getElementById('lcn').setAttribute("value", `${e.latlng.lat},${e.latlng.lng}`).readonly = true;
      }

		function onLocationError(e) {
      swal({
            icon: 'error',
            title: 'Oops',
            text: e.message,
            button: 'OK',
      });
		}

        mymap.on('locationerror', onLocationError);
        mymap.on('locationfound', onLocationFound);
        swal({
              icon: 'info',
              text: 'Click anywhere on the map to pinpoint location of the problem you wish to report',
              button: 'OK',
        });

    // function onLocationFound(e) {
    //     var radius = e.accuracy / 2;
    //     L.marker(e.latlng).addTo(mymap).bindPopup("You are within " + radius + " meters from this point").openPopup();
    //     L.circle(e.latlng, radius).addTo(mymap);
    //     }
        // mymap.on('locationfound', onLocationFound);


        function onMapClick(e) {
            var location = e.latlng;
            var loc = String(location);
            var one = Math.round(e.latlng.lat * 100000)/100000;
            var two = Math.round(e.latlng.lng * 100000)/100000;
            var res = one + "," + two;
           // alert(one);
          //  loc.push(location);
            swal({
                  icon: 'info',
                  text: 'Thank you for selecting location. Fill form below!',
                  button: 'OK',
            });
            document.getElementById('locationdisplay').innerHTML = location;
            document.getElementById('lat').value = one;
            document.getElementById('long').value = two;
            document.getElementById('lcn').value= res;
        }
        mymap.on('click', onMapClick);

        var category_icon = L.Icon.extend({
        options: {
            iconSize: [25, 25]
        }
        });
        var water = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/67/67780.svg'});
        var waste = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/1/1570.svg'});
        var air = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/62/62832.svg'});
        var sanitation = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/1472/1472279.svg'});
        var flood = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/1092/1092932.svg'});



    </script>
</body>
</html>

<?php
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

$sql = "SELECT latitude, longitude, category, description from data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $floatlat = floatval( $row["latitude"]);
        $floatlng = floatval( $row["longitude"]);
        $cat = $row["category"];
        $desc = $row["description"];
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

    }
} else {
    echo "0 results";
}

$conn->close();
?>
