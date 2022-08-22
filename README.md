# Project_4
專案名稱: 投票系統

相簿功能:
1. 
2. 
3. 

檔案介紹:  

## 1

## 2

### 1.1

## 3

# MySQL設置
```sql
CREATE TABLE `vote`(     
    `id` int auto_increment primary key,
    `name` VARCHAR(30),  
    `options_content` text,  
    `score` int

);
CREATE TABLE `users`(     
    `id` VARCHAR(10) UNIQUE,
    `name` VARCHAR(30)
	
);
```
# PHP與MySQL連線
localhost:主機名或IP地址  
root:MySQL用戶名  
07360514:MySQL密碼  
```php
<?php
  function create_connection(){
    $link = mysqli_connect("localhost","root","07360514") or die("無法連接".mysqli_connect_error());  //
    return $link;
  }
  function execute_sql($link ,$database,$sql){
    mysqli_select_db($link,$database) or die("開啟資料庫失敗".mysqli_error($link));
    $result = mysqli_query($link,$sql);
    return $result;
  }
?>
```




