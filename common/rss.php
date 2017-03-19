<?php
use YuzuruS\Rss\Feed;
require_once 'vendor/autoload.php';

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$url = RSS_URL;
$ua = USER_AGENT;
$res = Feed::load($url, $ua, true);

$url = 'https://api.twitter.com/1.1/statuses/update.json';
$i = rand(0,19);
if(!empty($res['item'][$i])) {
	$line = "{$res['item'][$i]['title']} {$res['item'][$i]['link']}" . RSS_ADD_TEXT;
	$tweets = $twitter->OAuthRequest($url, "POST", array("status" => $line));
	$result = json_decode($tweets);
	var_dump($result);
}