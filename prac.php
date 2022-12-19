<?php
$came='eric';
define("a", 5);//自訂義常數
//單雙引號有差，雙引號可讀出變數
echo "hello ,{$came}!"; 
echo __DIR__; //所在資料夾
echo __FILE__;//包含路徑
echo __LINE__;//目前在第幾行
echo a;
//query string就是url變數
//變數不用的話可用unset()刪掉
//程式語言不能用數字當開頭，是為了避免與指數衝突
//var_dump更清楚的看到物件的類型和值
//用isset確認有沒有相關設定