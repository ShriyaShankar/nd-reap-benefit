firebase.auth().onAuthStateChanged(firebaseUser => {
           if(firebaseUser){
             if(firebaseUser.emailVerified===true){
               window.location = "/main.php";
             }
             else{
               hide.classList.remove('hide');
               var user = firebase.auth().currentUser;

               user.sendEmailVerification().then(function() {

               }).catch(function(error) {
                 // An error happened.
               })
             }
           }
       });


function send_verification(){
  var user = firebase.auth().currentUser;

  user.sendEmailVerification().then(function() {

  }).catch(function(error) {
    // An error happened.
  })
}
