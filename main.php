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

  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->


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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style>
h2 {
  position: absolute;
  left: 10px;
  top: 340px;
  z-index: 100;
}
h3 {
  position: absolute;
  left: 130px;
  top: 340px;
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
    </div>


    <div id="mapid"></div>



<!-- Button trigger modal -->
<h3><button type="button" class="button" data-toggle="modal" data-target="#exampleModalScrollable">
  Category Key
</button></h3>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle"><b><b>Let us understand the categories better</b></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>Air: </b>Air pollution is a mix of particles and gases that can reach harmful concentrations both outside and indoors. Its effects can range from higher disease risks to rising temperatures. Soot, smoke, mold, pollen, methane, and carbon dioxide are a just few examples of common pollutants. <br><br>
          
        <b>Sanitation: </b>It refers to the provision of facilities and services for the safe disposal of human urine and faeces.  Lack of adequate means of disposing waste is a growing nuisance for heavily populated areas, carrying the risk of infectious disease. <br><br>
          
        <b>Urban Flooding: </b>Urban flooding is specific in the fact that the cause is a lack of drainage in an urban area. As there is little open soil that can be used for water storage nearly all the precipitation needs to be transport to surface water or the sewage system. High intensity rainfall can cause flooding when the city sewage system and draining canals do not have the necessary capacity to drain away the amounts of rain that are falling.<br><br>
              
        <b>Waste: </b>Let's say goodbye to Garbage City and help Bengaluru go back to being the Garden City by reporting garbage accumulated regions and dump sites in our neighbourhood.<br><br>
          
        <b>Water: </b>Water pollution occurs when toxic substances enter water bodies such as lakes, rivers, oceans and so on, getting dissolved in them, lying suspended in the water or depositing on the bed. This degrades the quality of water.<br><br>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



    <div>


          <h2><button  class="button" onclick="mainApp.logOut()">LogOut</button></h2>



            <form action="action_page.php" method = "POST" class="form-container" enctype="multipart/form-data">
                <!-- <h1>Login</h1> -->

                 <p>The Location is <p id="locationdisplay"></p> </p>
                <div class="form-group">
                  <label for="identifier" id="identifier"></label>
                  <input type="text" placeholder="Enter Name" name="name" id="form-name" readonly required />
                </div>
                <div class="form-group">
                  <label for="latitude"><b>Latitude</b></label>
                  <input type="text" placeholder="Enter latitude" name="latitude" required id="lat" />
                </div>
                <div class="form-group">
                  <label for="longitude"><b>Longitude</b></label>
                  <input type="text" placeholder="Enter longitude" name="longitude" required id="long" />
                </div>

                <div class="form-group">
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
                </div>
              <!--   <input type="file" name="fileToUpload" id="fileToUpload">
               <input type="submit" value="Upload Image" name="submit">  -->
            <!--   <div class="form-group">
                Severity: <br> <p class="text-left" style="display:inline !important;"> Low </p> <p class="text-right" style="display:inline !important; float:right !important;">High</p><input type="range" name="severity" min="0" max="5" />
              </div> -->
               <fieldset>
                  <div class="some-class">
                    <input type="radio" class="radio" name="x" value="y" id="y" />
                    <label for="y">Mild</label>
                    <input type="radio" class="radio" name="x" value="z" id="z" />
                    <label for="z">Moderate</label>
                    <input type="radio" class="radio" name="x" value="p" id="p" />
                    <label for="p">Severe</label>
                  </div>
                </fieldset> 

              <div class="form-group">
                <label for="location"><b><br><br>Location</b></label>
                <input type="text" placeholder="<br>Location:" name="location" required id="lcn">
              </div>
                <style>
                                                                input[type=file] {
                                                                      width: auto;

                                                                      padding: 14px 20px;
                                                                      margin: 8px 0;
                                                                      border: none;
                                                                      border-radius: 20px;
                                                                      cursor: pointer;
                                                                  }
                                                                input[type=file]:hover{
                                                                  opacity: 0.8;
                                                                }
                </style>
                <div class="form-group">
                <form action="POST">
                Upload Image: <input type="file"  style="width: 90%;" value="Upload" id="floodImage" accept="image/*;capture=camera">
                <p id="ProgressBar"></p>
                </form>
                </div>
                <input type="url" hidden name="floodImageURL" id="floodImageURL">

                <div class="form-group">
                  <label for="description"><br><b>Description</b></label>
                  <input type="text" placeholder="Describe the problem" name="description" required>
                </div>

                <input class="btn btn-success" type="submit" value="Submit" name="submit">

<!--                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>-->
              </form>




    </div>

    <!-- <button class="open-button" onclick="openForm()">Open Form</button> -->



<!-- <div class="form-popup" id="myForm"> -->


<!--- <div>
    <IMG STYLE="position:absolute; LEFT:500px; TOP:450px; WIDTH:50px; HEIGHT:50px" SRC="https://image.flaticon.com/icons/svg/67/67780.svg">
    <IMG STYLE="position:absolute; LEFT:500px; TOP:550px; WIDTH:50px; HEIGHT:50px" SRC="https://image.flaticon.com/icons/svg/1/1570.svg">
    <IMG STYLE="position:absolute; LEFT:500px; TOP:650px; WIDTH:50px; HEIGHT:50px" SRC="https://image.flaticon.com/icons/svg/62/62832.svg">
    <IMG STYLE="position:absolute; LEFT:500px; TOP:750px; WIDTH:50px; HEIGHT:50px" SRC="https://image.flaticon.com/icons/svg/1472/1472279.svg">
    <IMG STYLE="position:absolute; LEFT:500px; TOP:850px; WIDTH:50px; HEIGHT:50px" SRC="https://image.flaticon.com/icons/svg/1092/1092932.svg">

</div> -->


    <script src="firebase.js"></script>
    <script src="main.js"></script>
    <script>
        var storeloc;
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
            //var location = e.latlng;
            //var loc = String(location);
            storeloc = e.latlng;
            console.log(storeloc);
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
            // L.marker(e.latlng).addTo(mymap).bindPopup("You are within " + radius + " meters from this point").openPopup();
            L.marker(e.latlng).addTo(mymap).bindPopup("You are within " + radius + " meters from this point").openPopup();

            L.circle(e.latlng, radius).addTo(mymap);
            document.getElementById('locationdisplay').innerHTML = storeloc;
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
