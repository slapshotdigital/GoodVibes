const select = document.querySelector(".dropdown-content")
    // Your web app's Firebase configuration
   var firebaseConfig = {
    apiKey: "AIzaSyCcPGgok1Ao0NCQRsixOQ4Bhf3BTapLb_4",
    authDomain: "fire-vibes.firebaseapp.com",
    databaseURL: "https://fire-vibes.firebaseio.com",
    projectId: "fire-vibes",
    storageBucket: "fire-vibes.appspot.com",
    messagingSenderId: "408116991751",
    appId: "1:408116991751:web:1a826b2d767f4e7cb857a2"
  };

firebase.initializeApp(firebaseConfig);
var uiConfig = {
   signInSuccessUrl: 'index.html',
   signInOptions: [
     // Leave the lines as is for the providers you want to offer your users.
     firebase.auth.GoogleAuthProvider.PROVIDER_ID,
     firebase.auth.EmailAuthProvider.PROVIDER_ID,
     firebase.auth.PhoneAuthProvider.PROVIDER_ID,
     
   ],
   // tosUrl and privacyPolicyUrl accept either url string or a callback
   // function.
   // Terms of service url/callback.
   tosUrl: '<your-tos-url>',
   // Privacy policy url/callback.
   privacyPolicyUrl: function() {
     window.location.assign('<your-privacy-policy-url>');
   }
 };

 // Initialize the FirebaseUI Widget using Firebase.
 var ui = new firebaseui.auth.AuthUI(firebase.auth());
 // The start method will wait until the DOM is loaded.
 ui.start('#firebaseui-auth-container', uiConfig);

firebase.auth().onAuthStateChanged(function(user){
     // if user is logged in

if (user){
  console.log("HIIIIII"); 
  const a = document.createElement("a");
  const b = document.createElement("a");
  const c = document.createElement("a");
  const d = document.createElement("a");
   d.setAttribute("href", "learning.html")
    d. innerText = "learn something new" 
  c.setAttribute("href", "games.html")
    c. innerText = "Play Games" 
  b.setAttribute("href", "social.html")
  b.innerText = "Posts"
  a.setAttribute("href", "chat.html")
  a.innerText = "Chatroom";
    
   
  select.append(a)
  select.append(b)
  select.append(c)
  select.append(d)
   
}
})
  
  
 // get uid
// from var uiConfig is the js
