# auto_follow
## searh.php
### 検索キーワードをつぶやいているユーザをフォローします。
## back.php
### 自分がフォローしていないフォロアーをフォローします。

# 使い方

define.phpにそれぞれの項目設定を変更してください。
* CONSUMER_KEY → API KEY
* CONSUMER_SECRET → API SECRET
* ACCESS_TOKEN → access token
* ACCESS_TOKEN_SECRET → access token secret
* SLEEP_TIME_SEC → フォロー毎にスリープする秒数(凍結対策)
* FOLLOW_UPPER_LIMIT → 一回の実行でフォローする上限(凍結対策)
* SEARCH_QUERRY → 検索クエリ
* SEARCH_CNT → 検索ツイート最大数


# 実行方法
$ php hoge.php  
crontabを使って1日に1回実行などしてください。

# Version
2014/07/05 Version 1.0.1 search.php 追加  
2014/07/04 Version 1.0.0  
