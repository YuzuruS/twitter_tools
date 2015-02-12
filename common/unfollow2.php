<?php
require_once 'vendor/autoload.php';

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$follows = $twitter->get('friends/ids', array('cursor' => -1));
$follows_ids = $follows->ids;
$follows_ids = array_reverse($follows_ids);

$cursor = -1;
$followers_ids = [];
while(1) {
	$followers= $twitter->get('followers/ids', array('cursor' => $cursor));
	$followers_ids = array_merge($followers_ids, $followers->ids);
	if (!($cursor = $followers->next_cursor)) {
		break;
	}
}
$ids = array_diff($follows_ids, $followers_ids);
$cnt = 0;
foreach ($ids as $id) {
	$res = $twitter->post('friendships/destroy', array('user_id' => $id));
        sleep(SLEEP_TIME_SEC);
        $cnt++;
        if($cnt >= UNFOLLOW_UPPER_LIMIT) {
        	break;
	}
}
