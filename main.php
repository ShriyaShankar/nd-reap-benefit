<!-- This is the file executed after the user logs in -->

<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145741958-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    Feature-Policy: geolocation '*'
    gtag('config', 'UA-145741958-1');
    </script> -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145741958-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-145741958-1');
        </script>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ND Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Leaflet's CSS -->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
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

        #form {
            border-radius: 10px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        
     </style>
</head>

<body>

    <div id="mapid"></div>
    
    <!-- Category key button with h3 tag 
    <h3><button type="button" class="button" data-toggle="modal" data-target="#exampleModalScrollable">
        Category Key
    </button></h3> -->

    <!-- Scrollable category key -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Let us understand the categories better</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <!-- Category Key contents -->
        
                <div class="modal-body">
                <b>Air: </b>Air pollution is a mix of particles and gases that can reach harmful concentrations both outside and indoors. Its effects can range from higher disease risks to rising temperatures. Soot, smoke, mold, pollen, methane, and carbon dioxide are a just few examples of common pollutants. <br><br>

                <b>Sanitation: </b>It refers to the provision of facilities and services for the safe disposal of human urine and faeces.  Lack of adequate means of disposing waste is a growing nuisance for heavily populated areas, carrying the risk of infectious disease. <br><br>

                <b>Urban Flooding: </b>Urban flooding is specific in the fact that the cause is a lack of drainage in an urban area. As there is little open soil that can be used for water storage nearly all the precipitation needs to be transport to surface water or the sewage system. High intensity rainfall can cause flooding when the city sewage system and draining canals do not have the necessary capacity to drain away the amounts of rain that are falling.<br><br>

                <b>Waste: </b>Let's say goodbye to Garbage City and help Bengaluru go back to being the Garden City by reporting garbage accumulated regions and dump sites in our neighbourhood.<br><br>

                <b>Water: </b>Water pollution occurs when toxic substances enter water bodies such as lakes, rivers, oceans and so on, getting dissolved in them, lying suspended in the water or depositing on the bed. This degrades the quality of water.<br><br>

                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
                </div>
            </div>
        </div>
    </div>




    <div id="form">
        <h3>Please fill out the form:</h3>
        <br/>
        <form action="/action_page.php" method="POST">

        <div class="form-group">
            Name
            <input type="text" placeholder="Enter name" name="name" id="name" required />
        </div>

        <div class="form-group">
            Ward Number
            <input type="text" placeholder="Enter your ward number" name="ward" id="ward" required />
        </div>

        <div class="form-group">
            Phone Number
            <input type="text" placeholder="Enter Name" name="PhoneNumber" id="PhoneNumber" required />
        </div>

        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" placeholder="Enter latitude" name="latitude" required id="lat" />
        </div>
        
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" placeholder="Enter longitude" name="longitude" required id="long" />
        </div>

        <input type="submit" value="Submit">

        </form>

    </div>

  <!--  <div>
        
         LogOut button -->
      <!--  <h2><button  class="button" id="logOut">LogOut</button></h2> -->
      <!-- 
           

        <form action="action_page.php" method = "POST" class="form-container" enctype="multipart/form-data">
        <p>The Location is <p id="locationdisplay"></p> </p>
            
       
        <div class="form-group">
            <label for="identifier" id="identifier">Name</label>
            <input type="text" placeholder="Enter Name" name="name" id="form-name" required />
        </div>

        <div class="form-group">
            <label for="ward" id="ward">Ward Number</label>
            <input type="text" placeholder="Enter your ward number" name="ward" id="ward" required />
        </div>
        
        <div class="form-group">
            <label for="PhoneNumber"><br><b>Phone Number</b></label>
            <input type="text" placeholder="Enter your mobile number" name="PhoneNumber" required >
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
                    <option value="GaneshaIdol">Clay Ganesha Idol</option>
                    <option value="GaneshaVisarjane">Ganesha Visarjane</option>
                   <option value="Waste">Waste</option>
                    <option value="Water">Water</option>
                    <option value="Air">Air</option>
                    <option value="Sanitation">Sanitation</option>
                    <option value='Flood'>Urban Flooding</option>
                    <option value='Tree'>Fallen Tree</option>
                    <option value='Urination'>Public Urination</option> 
                </select>
                <br>
        </div> 
            
          
        <label><b><br>Status of Problem: <b/><br></label>
        <div class="some-class">
            <input type="radio" class="radio" name="severity" value="mild" id="y" />
            <label for="y">Mild</label>
            <input type="radio" class="radio" name="severity" value="moderate" id="z" />
            <label for="z">Moderate</label>
            <input type="radio" class="radio" name="severity" value="severe" id="p" />
            <label for="p">Severe</label>
        </div>
    
    <label><b><br>Type of Ganesha Idol: <b/><br></label>
        <div class="some-class">
            <input type="radio" class="radio" name="idol" value="clay" id="y" />
            <label for="y">Clay Idol</label>
            <input type="radio" class="radio" name="idol" value="PoP" id="z" />
            <label for="z">PoP Idol</label>
        </div> 

         Location 
        <div class="form-group">
            <label for="location"><b><br><br>Location</b></label>
            <input type="text" placeholder="Location" readonly name="location" required id="lcn">
        </div>
      
       <div class="form-group">
            <label for="description"><br><b>Landmark</b></label>
            <input type="text" placeholder="Landmark nearby, if any" name="landmark" >
        </div>

        <div class="form-group">
            <label for="shop"><br><b>Shop Name</b></label>
            <input type="text" placeholder="If applicable" name="shop" >
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
            
         Image upload 
        <div class="form-group">
            <form action="POST">
                Upload Image: (optional)<input type="file"  style="width: 90%;" value="Upload" id="floodImage" accept="image/*;capture=camera">
                <p id="ProgressBar"></p>
            </form>
        </div>
        <input type="url" hidden name="floodImageURL" id="floodImageURL">

        <button type="submit" name="submit">Submit</button>
            
         Description 
        <div class="form-group">
            <label for="description"><br><b>Number of idols:</b></label>
            <input type="text" placeholder="Mention for each type of idol" name="description" >
        </div> 
            
        

       </form>
    </div>
       -->
       

    <script src="firebase.js"></script>
    <script src="main.js"></script>
    <script>
        
        /* Display of map */
        var storeloc;
        var mymap = L.map('mapid'), infoWindow;
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            minZoom: 4,
            maxZoom: 20,
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
          //  document.getElementById('lcn').setAttribute("value", `${e.latlng.lat},${e.latlng.lng}`);
        }
        
        /* Geolocation error */
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
        
        /* Prompt for user to click on map */
        swal({
            icon: 'info',
            text: 'Click anywhere on the map to pinpoint location of the problem you wish to report',
            button: 'OK',
        });

        /* obtains lat-lng values and rounds it off */
        function onMapClick(e) {
            storeloc = e.latlng;
            console.log(storeloc);
            var one = Math.round(e.latlng.lat * 100000)/100000;
            var two = Math.round(e.latlng.lng * 100000)/100000;
            var res = one + "," + two;
            swal({
                icon: 'info',
                text: 'Thank you for selecting location. Fill form below!',
                button: 'OK',
                });
            document.getElementById('locationdisplay').innerHTML = storeloc;
            document.getElementById('lat').value = one;
            document.getElementById('long').value = two;
            document.getElementById('lcn').value= res;
        }
        mymap.on('click', onMapClick);

        /* Creating icon characteristics for inserting icon based on category */
        var category_icon = L.Icon.extend({
            options: {
                iconSize: [25, 25]
                }
        });
        
        /* We want bin to be smaller since map looks conjusted */
        var bin_icon = L.Icon.extend({
            options: {
                iconSize: [18,18]
            }
        })
        
        /* Creating icon instance for each category */
        var water = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/427/427112.svg'});
        var waste = new bin_icon({iconUrl: 'https://image.flaticon.com/icons/svg/148/148973.svg'});
        var air = new category_icon({iconUrl: 'https://image.flaticon.com/icons/png/512/1782/1782255.png'});
        var sanitation = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/1472/1472279.svg'});
        var flood = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/1777/1777481.svg'});
        var tree = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/490/490091.svg'});
        var urination = new category_icon({iconUrl: 'https://cdn.iconscout.com/icon/premium/png-256-thumb/urination-problem-3-1046617.png'});
        var ganesha = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/805/805294.svg'});
        var visarjane = new category_icon({iconUrl: 'https://image.flaticon.com/icons/svg/1197/1197849.svg'});
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
    $sql = "INSERT INTO Diwali_Data (Name, WardNumber, PhoneNumber, Latitude, Longitude)
    VALUES ('$name', '$WardNumber', '$PhoneNumber, '$latitude', '$longitude')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $name=$_POST['name'];
            $latitude=$_POST['latitude'];
            $longitude=$_POST['longitude'];
        //  $category=ucfirst($_POST['category']);
            $location=$_POST['location'];
        //  $landmark=$_POST['landmark'];
            $FloodImageURL = $_POST['floodImageURL'];
            $WardNumber = $_POST['ward'];
            $PhoneNumber = $_POST['PhoneNumber'];

            //$getcategory = "Select * from Clay_Ganesha_Idol";
            //$getcategoryresult = $conn->query($getcategory);
            //$getcategoryrow = $getcategoryresult->fetch_assoc();
         //   $cat = $getcategoryrow["primary_category"];    //Assigning the category to the primary key of the enumerated_category table
          //  echo("<script>console.log('$cat');</script>");

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
        /*    if($cat == 'GaneshaIdol'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: ganesha}).addTo(mymap);
                    marker.bindPopup(\"$shop <br> $landmark\"); 
            </script>");
            }

            if($cat == 'GaneshaVisarjane'){
                echo("<script> var marker = L.marker([$floatlat, $floatlng], {icon: visarjane}).addTo(mymap);
                    marker.bindPopup(\"$shop <br> $landmark\"); 
            </script>");
            } */
        // }
        }
    } 
    else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
?>
