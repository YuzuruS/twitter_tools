<?php
require_once 'lib/twitteroauth/twitteroauth.php';
require_once 'define.php';

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);


// 検索したユーザのscreen_name一覧取得
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$tweets = $twitter->get($url, array('q' => urlencode(SEARCH_QUERRY), 'count' => SEARCH_CNT, 'lang' => 'ja'));
$tweets_screen_name = array();
foreach ($tweets->statuses as $tweet) {
	if (!empty($tweet->user->screen_name)) {
		$tweets_screen_name[] = $tweet->user->screen_name;
	}
}

// フォロアーのscreen_name一覧取得 
$friends = $twitter->get('friends/list');
$friends_screen_name = array();
foreach($friends->users as $friend) {
	if(!empty($friend->screen_name)){
		$friends_screen_name[] = $friend->screen_name;
	}
}

$cnt = 0;
foreach ($tweets_screen_name as $sn) {
	if (!in_array($sn, $friends_screen_name)) {
		$twitter->post('friendships/create', array('screen_name' => $sn));
		echo "Follow {$sn}\n";
		sleep(SLEEP_TIME_SEC);
		$cnt++;
		if($cnt >= FOLLOW_UPPER_LIMIT) {
			break;
		}
	}
}
