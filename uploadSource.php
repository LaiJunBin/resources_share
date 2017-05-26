<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload_Code</title>
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css.map">
    <link rel="stylesheet" href="main.css">
    <?php
    if(!isset($_SESSION['login'])){
        header('location:index.php?type=login');
    }
    ?>
</head>
<body>
    <div style="padding:20px;width:100%;height:50%;">
        <h1>
            <center id="body">
                <p class="bg-warning" style="padding:15px;">upload Resources</p>
            </center>
        </h1>
        <form action="addData.php" method="post" enctype="multipart/form-data">
            <input type="text" name="title" class="form-contorl my-input" style="font-size:20px;" placeholder="Topic" required>
            <br>
            <textarea class="form-contorl uploadText" style="height:200px" name="content" placeholder="key in content.." required></textarea>
            <br>
            <!--<textarea class="form-contorl uploadText" name="code" placeholder="key in code.." required></textarea>-->
            <input type="text" name="dataName"  class="my-input"  required placeholder="上傳檔案的檔案名稱"><br>
            <input type="file" name="file" id="file" class="btn btn-warning" required><br>
            <center>
                <button type="submit" class="btn btn-success">upload</button>　
                <button type="reset" class="btn btn-danger">reset</button>　
                <a href="./">go back..</a>
            </center>
        </form>
    </div>
    
</body>
</html>