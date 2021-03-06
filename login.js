// This is the file executed for the user to sign in / log in

(function(){
    
    // Initialize the FirebaseUI Widget using Firebase.
    var ui = new firebaseui.auth.AuthUI(firebase.auth());
    var uiConfig = {
        callbacks: {
            signInSuccessWithAuthResult: function(authResult, redirectUrl) {
                // Return type determines whether we continue the redirect automatically
                return true;
            },
            uiShown: function() {
                document.getElementById('loader').style.display = 'none';
            }
        },
        // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
        signInFlow: 'popup',
        signInSuccessUrl: 'main.php',
        signInOptions: [
              // Provides various log in methods to user
           /*   firebase.auth.FacebookAuthProvider.PROVIDER_ID,
              firebase.auth.TwitterAuthProvider.PROVIDER_ID,
              firebase.auth.GithubAuthProvider.PROVIDER_ID, */
              firebase.auth.GoogleAuthProvider.PROVIDER_ID,
              firebase.auth.EmailAuthProvider.PROVIDER_ID,
              firebase.auth.PhoneAuthProvider.PROVIDER_ID
        ],
        
        // Terms of service url.
        tosUrl: 'www.google.com',
        
        // Privacy policy url.
        privacyPolicyUrl: '<your-privacy-policy-url>'
        
      };

      // The start method will wait until the DOM is loaded.
      ui.start('#firebaseui-auth-container', uiConfig);

      firebase.auth().onAuthStateChanged(function(user)
      {
          console.log(firebase.auth().currentUser);
          if(firebase.auth().currentUser)
          {
                window.location = "/main.php";
          }
      });

})()
