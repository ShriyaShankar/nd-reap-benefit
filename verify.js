firebase.auth().onAuthStateChanged(firebaseUser => {
           if(firebaseUser){
             if(firebaseUser.emailVerified===true){
               window.location = "page1.html";
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
           else{
             hide.classList.add('hide');
             swal({
               icon: "error",
               title: "Oops!",
               text: "Please Sign In. Try Again!",
               button: "OK",
               closeOnClickOutside: false
             }).then(function(){
               window.location="login.html";
             });
           }
       });


function send_verification(){
  var user = firebase.auth().currentUser;

  user.sendEmailVerification().then(function() {

  }).catch(function(error) {
    // An error happened.
  })
}
