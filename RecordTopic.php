<?php
//check for required fields from the form
if ((!$_POST[topic_owner]) || (!$_POST[topic_title])
|| (!$_POST[post_text])) {
header("Location: addtopic.html");
exit;
}
 
//connect to server and select database
!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chatroom</title>
    <!--Go to https://console.firebase.google.com-->
    <!--Sign in and add a project "fireMessage"-->
    <!--PASTE SNIPPET HERE-->
<!-- The core Firebase JS SDK is always required and must be listed first -->





<!-- <script src="https://www.gstatic.com/firebasejs/6.3.4/firebase.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

<!--
    
    
    
    <script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyAp4slGWUhcmW4yPpzxs29Kcc_AU2bj3D0",
    authDomain: "firemessage-823ff.firebaseapp.com",
    databaseURL: "https://firemessage-823ff.firebaseio.com",
    projectId: "firemessage-823ff",
    storageBucket: "firemessage-823ff.appspot.com",
    messagingSenderId: "397740607887",
    appId: "1:397740607887:web:513a656215f08c20"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script>
  
//create and issue the first query
$add_topic = "insert into forum_topics values ('', '$_POST[topic_title]',
now(), '$_POST[topic_owner]')";
mysql_query($add_topic,$conn) or die(mysql_error());

//get the id of the last query 
$topic_id = mysql_insert_id();
  
//create and issue the second query
$add_post = "insert into forum_posts values ('', '$topic_id',
'$_POST[post_text]', now(), '$_POST[topic_owner]')";
mysql_query($add_post,$conn) or die(mysql_error());
  
//create nice message for user
$msg = "<P>The <strong>$topic_title</strong> topic has been created.</p>";
?>
<html>
<head>
<title>New Topic Added</title>
</head>
<body>
<h1>New Topic Added</h1>
<?php print $msg; ?>
</body>
</html>
