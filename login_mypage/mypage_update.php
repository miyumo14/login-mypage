<?php
mb_internal_encoding("utf8");

//sessionスタート
session_start();


//DB接続・try　catch文
try{
    //try catch文、DBに接続できなければエラーメッセージを表示
    $pdo=new PDO("mysql:dbname=lesson1;host=localhost;","root","");
    }catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが込み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインをしてください。</P>
    <a href='http://localhost/login_mypage\login.php'>ログイン画面へ</a>");
    }

//preparedステートメント（update）でSQLをセット$ //bindValueメソッドでパラメーターをセット
$stmt=$pdo->prepare("update login_mypage set name = ?, mail = ?, password = ?, comments = ? where id = id");

$stmt->bindvalue(1,$_POST['name']);
$stmt->bindvalue(2,$_POST['mail']);
$stmt->bindvalue(3,$_POST['password']);
$stmt->bindvalue(4,$_POST['comments']);


//execueでクリエを実行
$stmt->execute();

//preparedステートメント（更新された情報をDBからselect文で取得）でSQLをセット$ //bindValueメソッドでパラメーターをセット
$stmt=$pdo->prepare("select * from login_mypage where name = ? && mail =? && password = ? && comments = ? ");

$stmt->bindvalue(1,$_POST['name']);
$stmt->bindvalue(2,$_POST['mail']);
$stmt->bindvalue(3,$_POST['password']);
$stmt->bindvalue(4,$_POST['comments']);

//execueでクリエを実行
$stmt->execute();

//データベースを切断
$pdo=NULL;

//fetch・while文でデータを取得し、sessionに代入
while($row=$stmt->fetch()){
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

//mypageへリダイレクト
header('location:mypage.php');

?>
