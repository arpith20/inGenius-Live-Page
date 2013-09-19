<?php
session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "caughtoffside";
$notweets = 30;
$accesstoken = "358530129-07R76k4QIHTS5m0d0XtkG8AeHePVxzMTRIn0LdDg";
$accesstokensecret = "htlakEeMrRO6b75Vq3w0sZVjijRwrvlByLzRFvQkxs";
$consumerkey = "WzSJMMK5AwOt11jsmLqOA";
$consumersecret = "TZcH9VoCSeXuCHpdVwOzzpvnhNCyn1AfE8UYxboQdbY";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
//$cont=json_encode($tweets);
//echo $cont;
//echo $tweets->statuses[0]->text;
?>
