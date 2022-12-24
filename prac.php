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
//淺層複製、深層複製，差在看複製的是參考、還是值
const p1={
    name:{first:"john",last:"dou"},age:12;
};
const p2=p1;
const p3={...p1};//js淺層複製
const p4=JSON.parse(JSON.stringify(p1));//js層複製
//深層複製會有結構循環的錯誤
//print_r印出比較好懂得結果
//php是程式人員可以決定傳值或傳參考的
//$_get,$_post拿資料
//header寫伺服器回應的檔頭
//mime type,content-type重要
//php函式不像js，不會往外找變數
//cookie要在html前設定，session也是
//先建資料表結構，再匯入資料(例如在office先打好的csv檔)
//終端機where指令找執行檔在哪