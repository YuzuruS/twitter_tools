#!/bin/sh

main="twitter_account1"
for dir in twitter_account2
do
cp $main/*.php $dir
done
