var mainApp = {};

(function(){
    var firebase = app_fireBase;
var uid = null;    
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            uid = user.uid;
          // User is signed in.
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


