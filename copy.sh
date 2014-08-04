#!/bin/sh

main="twitter_account1"
for dir in twitter_account2
do
cp $main/search.php $dir
cp $main/post.php $dir
cp $main/back.php $dir
cp $main/unfollow.php $dir
cp $main/define.php $dir
done
