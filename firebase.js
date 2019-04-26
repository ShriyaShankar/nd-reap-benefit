var app_fireBase = {};
(function(){

  // Initialize Firebase
	var config = {
    // apiKey: "AIzaSyCTVtJjqlqSsChRV64So4UEfhzbBWnCfHc",
    // authDomain: "dashboard-2fb83.firebaseapp.com",
    // databaseURL: "https://dashboard-2fb83.firebaseio.com",
    // projectId: "dashboard-2fb83",
    // storageBucket: "dashboard-2fb83.appspot.com",
    // messagingSenderId: "835460991139"
    
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