<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css.map">
    <link rel="stylesheet" href="main.css">
    <script>
        function error(){
            alert('username or password error!');
        }
        function success(){
            alert('login Success');
            location.href="index.php";
        }
    </script>
    <?php
        if(!isset($_GET['type']))
            session_start();
        if(isset($_SESSION['login'])){
            header('index.php');
        }
        if(isset($_POST['user'])){
            include_once('mysqlLink.php');
            mysql_select_db('resources_share');
            $selectMemberSQL="select * from `member` where `m_username` ='".$_POST['user']."'";
            $selectMember_query=mysql_query($selectMemberSQL);
            $m=mysql_fetch_assoc($selectMember_query);
            if(!$m){
                echo "<script>error()</script>";
            }elseif(md5($_POST['pwd'])==$m['m_password']){
                $_SESSION['authority']="5";
                $_SESSION['login']="sora";
                echo "<script>success()</script>";
            }else{
                echo "<script>error()</script>";
            }
        }
    ?>
</head>
<body>
      <!--page2，登入畫面開始-->
<center>
  <div class="pag">
    <div class="panel panel-info">
      <div class="panel-heading">Login</div>
      <div class="panel-body">
        <form action="login.php" method="post">
            <input type="text" name="user" class="form-contorl my-input" style="font-size:20px;" placeholder="username" required>
            <input type="password" name="pwd" class="form-contorl my-input" style="font-size:20px;" placeholder="password" required><br>
            <button type="submit" class="btn btn-warning">Login</button>　
            <a href="./">go back..</a>
        </form>
      </div>
    </div>
  </div>
</center>
  <!--page2，登入畫面結束-->
</body>
</html>