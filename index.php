<script>
    function logout(){
        alert('logout!');
        location.href="index.php";
    }
</script>
<?php
session_start();
// var_dump($_SESSION);
    if(!isset($_GET['id']) && !isset($_GET['type']))
    {
        include_once('AllSource.php');
    }elseif(isset($_GET['id'])){
        include_once('SourceView.php');
    }
    if(isset($_GET['type'])){
        if($_GET['type']=="upload"){
            include_once('uploadSource.php');
        }
        if($_GET['type']=="m_upload"){
            include_once('member_uploadSource.php');
        }
        if($_GET['type']=="login"){
            header('location:login.php');
        }
        if($_GET['type']=="logout"){
            unset($_SESSION['login']);
            unset($_SESSION['authority']);
            echo "<script>logout();</script>";
        }
    }
?>