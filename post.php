<?php
require_once 'vendor/autoload.php';
require_once 'define.php';

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$url = 'https://api.twitter.com/1.1/statuses/update.json';
$file_path = __DIR__ . '/data/tweet.txt';
$fp = fopen($file_path, "r");
$file_count = count(file($file_path));
$i = time()%$file_count;
$cnt = 0;
while ($line = fgets($fp)) {
	if($i == $cnt) {
		$tweets = $twitter->OAuthRequest($url, "POST", array("status" => $line));
		$result = json_decode($tweets);
		var_dump($result);
		break;
	}
	$cnt++;
}
fclose($fp);
