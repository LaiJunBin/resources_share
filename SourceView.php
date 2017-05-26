<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>subject</title>
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css.map">
    <link rel="stylesheet" href="main.css">
    <?php
        include_once('mysqlLink.php');
        mysql_select_db('resources_share');
        $oneString = strtolower(substr("source",0,1));
        if(empty($_GET['id'])){
            header('location:index.php');
        }else{
            $codeSql="select * from `source` where `".$oneString."_id`='".$_GET['id']."'";
        }
        $code_query=mysql_query($codeSql);
        $code=mysql_fetch_assoc($code_query);
        if(!$code){
            header('location:index.php');
        }
    ?>
</head>

<body >
    <center id="body" style="padding:20px;">
        <?php echo $code[$oneString."_title"];?>
    </center>
    <div class="pag">
    <div class="panel panel-info">
      <div class="panel-heading">topic:</div>
      <div class="panel panel-warning">
      <div class="panel-heading"><?php echo $code[$oneString."_content"]?><br>檔案名稱:<?php echo $code['s_fileName'];?><br>
        <?php if(isset($_SESSION['authority']) && $_SESSION['authority']>=$code[$oneString."_authority"] || $code[$oneString."_authority"]==0){ ?>
           <a href="<?php echo $code[$oneString."_fileDownload"]; ?>" download><button class="btn btn-info">按我下載</button></a><br>
        <?php }elseif(!isset($_SESSION['authority']) || $_SESSION['authority']<$code[$oneString."_authority"]){ ?>
           <a href="javascript:void(0)" onclick="javascript:alert(權限不足無法下載);"><button class="btn btn-danger">無法下載</button></a><br>
        <?php } ?>
           上傳時間：<?php echo $code['s_date'];?>
      </div>
      <br>
    <center id="body" style="padding-bottom:30px;">
        <a href="index.php" ><button class="btn btn-danger">Select Subject</button></a>
    </center>
</body>

</html>