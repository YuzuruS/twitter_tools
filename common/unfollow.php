<?php
require_once 'vendor/autoload.php';

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

// フォロアーのscreen_name一覧取得
$friends = $twitter->get('friends/list', array('count' => 200));
$friends_screen_name = array();
foreach($friends->users as $friend) {
        if(!empty($friend->screen_name) && !empty($friend->lang) && $friend->lang != LANG){
                $friends_screen_name[] = $friend->screen_name;
		
        }
}
$cnt = 0;
foreach ($friends_screen_name as $sn) {
	$res = $twitter->post('friendships/destroy', array('screen_name' => $sn));
        echo "Unfollow {$sn}\n";
        sleep(SLEEP_TIME_SEC);
        $cnt++;
        if($cnt >= UNFOLLOW_UPPER_LIMIT) {
                break;
        }
}
