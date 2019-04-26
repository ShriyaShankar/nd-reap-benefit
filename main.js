var mainApp = {};

(function(){
    var firebase = app_fireBase;
var uid = null;
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            uid = user.uid;
          // User is signed in.
          // Returns the signed-in user's display name.
          function getUserName() {
              return firebase.auth().currentUser.displayName;
          }
console.log(firebase.auth().currentUser);
          var userName = getUserName();
          if(userName==null) {
            userName = firebase.auth().currentUser.phoneNumber;
            console.log(firebase.auth().currentUser);
          }
          document.getElementById("form-name").setAttribute("value", userName);
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
