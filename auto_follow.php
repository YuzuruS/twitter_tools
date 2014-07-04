<?php
require_once 'lib/twitteroauth/twitteroauth.php';

define('CONSUMER_KEY', 'YOUR_CONSUMER_KEY');
define('CONSUMER_SECRET', 'YOUR_CONSUMER_SECRET');
define('ACCESS_TOKEN', 'YOUR_ACCESS_TOKEN');
define('ACCESS_TOKEN_SECRET', 'YOUR_ACCESS_TOKEN_SECRET');
define('SLEEP_TIME_SEC', 60*5);
define('FOLLOW_UPPER_LIMIT', 50);

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$followers = $twitter->get('followers/ids', array('cursor' => -1));
$friends = $twitter->get('friends/ids', array('cursor' => -1));

$cnt = 0;

foreach ($followers->ids as $i => $id) {
	if (empty($friends->ids) or !in_array($id, $friends->ids)) {
		sleep(SLEEP_TIME_SEC);
		$twitter->post('friendships/create', array('user_id' => $id));
		$cnt++;
		if($cnt >= FOLLOW_UPPER_LIMIT) {
			break;
		}
	}
}
