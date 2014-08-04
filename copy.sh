#!/bin/sh

main="kandou_manga1"
for dir in manga_daisuki1 manga_manga11 manga_master1 manga_matsuri manga_syoukai manga_yomitai1 mangameigensyu1 nakeru_manga osusume_manga
do
cp $main/search.php $dir
cp $main/post.php $dir
cp $main/back.php $dir
cp $main/unfollow.php $dir
cp $main/define.php $dir
done
