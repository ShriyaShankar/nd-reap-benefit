// Checks whether user exists. If not, creates new user

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
            })
        }
    }
});


function send_verification(){
      var user = firebase.auth().currentUser;
      user.sendEmailVerification().then(function() {
      }).catch(function(error) {
      })
}
