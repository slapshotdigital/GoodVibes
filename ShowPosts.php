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
<?php
//check for required info from the query string
if (!$_GET[topic_id]) {
header("Location: topiclist.php");
exit;
}

//connect to server and select database
$conn = mysql_connect("localhost", "joeuser", "somepass")
or die(mysql_error());
mysql_select_db("testDB",$conn) or die(mysql_error());

//verify the topic exists
$verify_topic = "select topic_title from forum_topics where
topic_id = $_GET[topic_id]";
$verify_topic_res = mysql_query($verify_topic, $conn)
or die(mysql_error());

if (mysql_num_rows($verify_topic_res) < 1) {
//this topic does not exist
$display_block = "<P><em>You have selected an invalid topic.
Please <a href=\"topiclist.php\">try again</a>.</em></p>";
} else {
//get the topic title
$topic_title = stripslashes(mysql_result($verify_topic_res,0,
'topic_title'));

//gather the posts
$get_posts = "select post_id, post_text, date_format(post_create_time,
'%b %e %Y at %r') as fmt_post_create_time, post_owner from
forum_posts where topic_id = $_GET[topic_id]
order by post_create_time asc";
 
$get_posts_res = mysql_query($get_posts,$conn) or die(mysql_error());

//create the display string
$display_block = "
<P>Showing posts for the <strong>$topic_title</strong> topic:</p>

<table width=100% cellpadding=3 cellspacing=1 border=1>
<tr>
<th>AUTHOR</th>
<th>POST</th>
</tr>";

while ($posts_info = mysql_fetch_array($get_posts_res)) {
$post_id = $posts_info['post_id'];
$post_text = nl2br(stripslashes($posts_info['post_text']));
$post_create_time = $posts_info['fmt_post_create_time'];
$post_owner = stripslashes($posts_info['post_owner']);

//add to display
$display_block .= "
<tr>
<td width=35% valign=top>$post_owner<br>[$post_create_time]</td>
<td width=65% valign=top>$post_text<br><br>
<a href=\"replytopost.php?post_id=$post_id\"><strong>REPLY TO
POST</strong></a></td>
</tr>";
}
 
//close up the table
$display_block .= "</table>";
}
?>
<html>
<head>
<title>Posts in Topic</title>
</head>
<body>
<h1>Posts in Topic</h1>
<?php print $display_block; ?>
</body>
</html>
