<?php
require_once 'lib/twitteroauth/twitteroauth.php';
require_once 'define.php';

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$followers = $twitter->get('followers/ids', array('cursor' => -1));
$friends = $twitter->get('friends/ids', array('cursor' => -1));

$cnt = 0;

foreach ($followers->ids as $i => $id) {
	if (empty($friends->ids) || !in_array($id, $friends->ids)) {
		$twitter->post('friendships/create', array('user_id' => $id));
		sleep(SLEEP_TIME_SEC);
		$cnt++;
		if($cnt >= FOLLOW_UPPER_LIMIT) {
			break;
		}
	}
}
