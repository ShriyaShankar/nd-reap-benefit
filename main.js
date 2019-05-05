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

    //mainApp.logOut = logOut;
    //
    // function testAlert(){
    //     alert("Test");
    // }
    //
    // mainApp.testAlert = testalert;

    //Firebase storage image Upload
    var floodImage = document.getElementById('floodImage');
    //var floodImageURL;
    floodImage.addEventListener('change', function(e) {
      console.log("Works!");
      var file = e.target.files[0];
      const storageService = firebase.storage();
      const storageRef = storageService.ref();

      const leadTimestamp = Math.floor(Date.now() / 1000);

      //create a storage ref
      //firebase.storage().ref('FoundKid/' + file.name);
      //upload file
      var task = storageRef.child(`FloodImages/${firebase.auth().currentUser.email}_${leadTimestamp}`).put(file);
  //    fileTypeF = file.name.split('.').pop();
      console.log(file.name.split('.').pop());
      // Listen for state changes, errors, and completion of the upload.
task.on(firebase.storage.TaskEvent.STATE_CHANGED, // or 'state_changed'
  function(snapshot) {
    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
    var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
    console.log('Upload is ' + progress + '% done');
    document.getElementById('ProgressBar').innerHTML = `Upload is ${Math.round(progress)}% done`
    switch (snapshot.state) {
      case firebase.storage.TaskState.PAUSED: // or 'paused'
        console.log('Upload is paused');
        break;
      case firebase.storage.TaskState.RUNNING: // or 'running'
        console.log('Upload is running');
        break;
    }
  }, function(error) {

  // A full list of error codes is available at
  // https://firebase.google.com/docs/storage/web/handle-errors
  switch (error.code) {
    case 'storage/unauthorized':
      // User doesn't have permission to access the object
      break;

    case 'storage/canceled':
      // User canceled the upload
      break;



    case 'storage/unknown':
      // Unknown error occurred, inspect error.serverResponse
      break;
  }
}, function() {
  // Upload completed successfully, now we can get the download URL
  task.snapshot.ref.getDownloadURL().then(function(downloadURL) {
    console.log('File available at', downloadURL);
    //floodImageURL = downloadURL;
    document.getElementById("floodImageURL").setAttribute("value", downloadURL);


  });
});
    });

})()
