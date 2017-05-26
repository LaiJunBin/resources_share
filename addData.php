<?php
    include_once('mysqlLink.php');
    mysql_select_db('resources_share');
    if(isset($_FILES['file']['tmp_name'])){
    $tmp=$_FILES['file']['tmp_name'];
    $type=explode(".",$_FILES['file']['name']);
	$pic="uploadData/".date('YmdHis').".".$type[count($type)-1];
	($_FILES['file']['tmp_name']!="")?
	move_uploaded_file($tmp,$pic):
	$pic='';
    }
    $uploadSQL ="insert into `source` (`s_title`,`s_content`, `s_fileName` , `s_fileDownload`) values (";
    $uploadSQL.="'".$_POST['title']."',";
    $uploadSQL.="'".$_POST['content']."',";
    $uploadSQL.="'".$_POST['dataName']."',";
    $uploadSQL.="'".$pic."')";
    mysql_query($uploadSQL);
    if(isset($_POST['authority'])){
        $updateSQL="update `source` set `s_authority` ='".$_POST['authority']."' where `s_fileDownload` ='".$pic."'";
        mysql_query($updateSQL);
    }
    header('location:index.php');
?>