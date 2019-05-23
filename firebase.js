// Code to get Firebase started

var app_fireBase = {};
(function()
 {
  // Initialize Firebase
	var config = {
        apiKey: "AIzaSyA9IvOsNE9ZSEpW7FfkgCd3sDlHQ9a3VU8",
        authDomain: "ndmanager-c2186.firebaseapp.com",
        databaseURL: "https://ndmanager-c2186.firebaseio.com",
        projectId: "ndmanager-c2186",
        storageBucket: "ndmanager-c2186.appspot.com",
        messagingSenderId: "609277700050"
     };
  firebase.initializeApp(config);
  app_fireBase = firebase;

})()