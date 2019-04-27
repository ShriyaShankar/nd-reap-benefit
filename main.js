var mainApp = {};

(function(){
    var firebase = app_fireBase;
var uid = null;
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            uid = user.uid;
          // User is signed in.
          // Returns the signed-in user's display name.
          function getUserEmail() {
              document.getElementById("identifier").innerHTML = "<b>Email</b>";
              return firebase.auth().currentUser.email;
          }
          var identifier = getUserEmail();
          if(identifier==null) {
            document.getElementById("identifier").innerHTML = "<b>Phone Number</b>";
            identifier = firebase.auth().currentUser.phoneNumber;
          }
          document.getElementById("form-name").setAttribute("value", identifier);
         if(firebase.auth().currentUser.emailVerified===false && firebase.auth().currentUser.email!=null){
               window.location = "/verify.html";
         }

        } else {
            uid = null;
            window.location.replace("index.html");
        }

      });

    function logOut(){
        firebase.auth().signOut();
    }

    mainApp.logOut = logOut;

    function testAlert(){
        alert("Test");
    }

    mainApp.testAlert = testalert;
})()
