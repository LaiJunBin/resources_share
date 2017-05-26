<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Source</title>
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css.map">
    <link rel="stylesheet" href="main.css">
    <?php
        function callDB($selectDBName,$d){
        if($d==0){
            $d="`s_authority` ='0'";
        }else{
            $d="`s_authority` >='1'"; 
        }
        $buttonColor=array('primary','success','info','warning','danger');
        $oneString = strtolower(substr($selectDBName,0,1));
        include_once('mysqlLink.php');
        mysql_select_db('resources_share');
        $codeSql="select * from `".$selectDBName."` where ".$d;
        $code_query=mysql_query($codeSql);
        echo "<center id=body>";
        $id=1;
        ?>
        <table border="1" style="text-align:center;" class="table" > 
        <th  style="text-align:center" height="40px">No.</th>
        <th style="text-align:center">Source</th>
        <?php
            if($d=="`s_authority` >='1'"){ ?>
                <td style="text-align:center">權限</td>
        <?php } ?>
        <!--<th style="text-align:center">date</th>-->
        <?php
        while($code=mysql_fetch_assoc($code_query)){
            ?>
            <tr ><td style="padding:20px;" >
            <?php
                echo $id.".";
                $id+=1;
                $color=$id %5; 
            ?>
                </td>
                <td width="80%" style="vertical-align:middle" ><a href="index.php?id=<?php echo $code[$oneString."_id"]?>"><button class="btn btn-<?php echo $buttonColor[$color]?>" style="width:100%;"><?php echo $code[$oneString."_title"]?></button></a></td>
                <?php
                if($d=="`s_authority` >='1'"){ ?>
                    <td style="vertical-align:middle" >
                        <?php
                            if(isset($_SESSION['authority']) && $_SESSION['authority']>=$code[$oneString."_authority"])
                                $AuthorityColor= "blue";
                            else 
                                $AuthorityColor= "red";
                        ?>
                        <font color="<?php echo $AuthorityColor ?>">
                            <?php echo $code[$oneString."_authority"]?>
                        </font>
                    </td>
                <?php } ?>
                <!--<td  ><font size="-2" color="black">上傳時間：<?php echo $code[$oneString."_date"];?></font></td>-->
            <tr>
        <?php }  ?>
        </table>
        <?php
        echo "</center>";
        }
    ?>
    <script src="jquery1.2.1.js"></script>
    <script>
        function test(){
            alert("開發中...");
            location.href="./";
        }
        $(function () {
            $("li").click(function () {
                var pa = $(this).attr("pa");
                if(pa!="logout"){
                    $("li").removeClass("active");
                    $(this).addClass("active");
                    $(".pag").attr("hidden",false);
                    $("#pag"+pa).removeAttr("hidden");
                }else{
                    location.href="index.php?type=logout";
                }
            });
        });
    </script>
</head>
<body>
  <ul class="nav nav-tabs">
    <li class="active" pa="1"><a href="#" >All</a></li>
    <li pa="2"><a href="#" >Power</a></li>
    <?php if(isset($_SESSION['login'])) { ?>
    <li pa="logout"><a href="#" >logout</a></li>
    <?php }else{ ?>
    <li pa="login"><a href="index.php?type=login" >login</a></li>
    <?php } ?>
    <!--<li pa="3"><a href="javascript:void(0);" onclick="javascript:test();">...</a></li>-->
    <!--<li pa="3"><a href="#">...</a></li>-->
    <!--<li pa="3"><a href="#">提案列表</a></li>
    <li pa="4"><a href="#">我要提案</a></li>
    <li pa="5"><a href="#">回報</a></li>-->
  </ul>

  <!--page1，首頁開始-->
  <div id="pag1" class="pag">
    <div class="panel panel-warning">
      <div class="panel-heading">All Resource　　<a href="index.php?type=upload"><button class="btn btn-info">upload Resources</button></a></div>
      <div class="panel-body">
        <?php
            echo callDB("source","0");
        ?>
      </div>
    </div>
  </div>
  <!--page1，首頁開始-->

  <!--page2，Power開始-->
  <div id="pag2" class="pag" hidden>
    <div class="panel panel-info">
      <div class="panel-heading">All Resource　　<a href="index.php?type=m_upload"><button class="btn btn-info">upload Resources</button></a></div>
      <div class="panel-body">
            <?php
                echo callDB("source","1");
            ?>
      </div>
    </div>
  </div>
  <!--page2，Power結束-->
</body>
</html>