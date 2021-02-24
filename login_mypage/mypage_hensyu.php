<?php
mb_internal_encoding("utf8");

//セッションスタート
//mypage.phpからの導線以外は、『login_error.php』にリダイレクト
if (empty($_POST['from_mypage'])) {
    header("Location:login_error.php");
}

session_start();

?>

<!DOCTTYPE HTML>
    <html lang="ja">
    <meta charset="UTF-8">

    <head>
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>

    <body>
        <!このbodyの中に、マイページとして表示する部分句を記述していく（HTMLとsessionを記述。編集できるように、sessionはValueに入れる。）-->
            <header>
                <img src="4eachblog_logo.jpg">
                <div class="logout"><a href="log_out.php">ログアウト</a></div>
            </header>

            <main>
                <div class="box">
                    <div class="box_contents">
                        <h2>会員情報</h2>
                        <div class="hello">
                            <?php echo "こんにちは！".$_SESSION['name']."さん"; ?>
                        </div>

                        <form action="mypage_update.php" method="post">
                            <div class="profile_pic">
                                <img src="<?php echo $_SESSION['picture']; ?>">
                            </div>

                            <div class="basic_info">
                                <p>氏名：<input type="text" size="30" value="<?php echo $_SESSION['name']; ?>" name="name"></p>
                                <p>メール：<input type="text" size="30" value="<?php echo $_SESSION['mail']; ?>" name="mail"></p>
                                <p>パスワード：<input type="text" size="30" value="<?php echo $_SESSION['password']; ?>" name="password"></p>
                            </div>

                            <div class="hensyu_comments">
                                <textarea rows="5" cols="77" name="comments"><?php echo $_SESSION['comments'];?></textarea>
                            </div>

                            <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage_hensyu">
                            <div class="hensyubutton">
                                <input type="submit" class="submit_button" size="35" value="この内容に変更する">
                            </div>
                        </form>
                    </div>
                </div>
            </main>

            <footer>
                © 2018 InterNous.inc. ALL rights reserved
            </footer>

    </body>

    </html>
