# twitter_tools 
## searh.php
検索キーワードをつぶやいているユーザをフォローします。
## back.php
自分がフォローしていないフォロアーをフォローします。
## post.php
data/tweet.txtに記載されているテキストをランダムでつぶやきます。
## unfollow.php
設定した国籍以外のフォローをアンフォローします。
## unfollow2.php
自分をフォローしていないユーザーをアンフォローします。

# 使い方

define.phpとoauth.phpにそれぞれ設定してください。  

composer install を実行してください。  

# 実行方法
$ php hoge.php  
crontabを使って1日に1回実行などしてください。

# Version
2015/02/12 Version 1.0.5 unfollow2.php追加  
2014/08/04 Version 1.0.4 unfollow.php追加  
2014/08/03 Version 1.0.3 post.php追加  
2014/07/30 Version 1.0.2 composer 対応  
2014/07/05 Version 1.0.1 search.php 追加  
2014/07/04 Version 1.0.0  
