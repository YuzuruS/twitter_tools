# auto_follow
フォローしてないユーザに対してフォローします。

# 使い方

auto_follow.phpのdefineをそれぞれの設定に変更してください。
* CONSUMER_KEY → API KEY
* CONSUMER_SECRET → API SECRET
* ACCESS_TOKEN → access token
* ACCESS_TOKEN_SECRET → access token secret
* SLEEP_TIME_SEC → フォロー毎にスリープする秒数(凍結対策)
* FOLLOW_UPPER_LIMIT → 一回の実行でフォローする上限(凍結対策)

# 実行方法
$ php auto_follow.php


# Version
2014/07/04 Version 1.0.0
