<?php
mb_internal_encoding("utf8");
$pdo=new

//BD接続
PDO("mysql:dbname=lesson1;host=localhost;","root","");

//prepared statementでSQLの型を作る
$stmt=$pdo->prepare("insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)");

//bindValueメソッドでバラメータをセット
$stmt->bindvalue(1,$_POST['name']);
$stmt->bindvalue(2,$_POST['mail']);
$stmt->bindvalue(3,$_POST['password']);
$stmt->bindvalue(4,$_POST['path_filename']);
$stmt->bindvalue(5,$_POST['comments']);

//executeでクリエを実行
$stmt->execute();
$pdo = NULL;

header('location:after_register.html');
?>
