<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>阿拉伯數字轉成國字</title>
</head>
<body>
    <?php 
    if(isset($_POST['number01'])){
        $default_val=$_POST['number01'];
    }else{
        $default_val="";
    }
    ?>
    <form action="example02.php" method="post" name="form1" id="form1">
        <p>阿拉伯數字轉成國字程式</p>
        <p>
            <label>請輸入要轉換的阿拉伯數字<br>
                <input type="text" name="number01" value="<?php echo $default_val; ?>" id="number01">
            </label>
        </p>
        <input type="hidden" name="MM_form" id="MM_form" value="form1">
        <p>
            <input type="submit" name="button" value="開始轉換">
        </p>
    </form>
    <?php
    if(isset($_POST['MM_form']) and $_POST['MM_form']=='form1'){
        $elen=strlen($_POST['number01']);
        $tempstr="";
        $retstring="";
        $ctrlprece=$elen;

        for($i=0;$i<=$elen-1;$i++){
            $tempstr=substr($_POST['number01'],$i,1);
            switch($tempstr){
                case "0":
                    $retstring=$retstring."零";
                    break;
                case "1":
                    $retstring=$retstring."壹";
                    break;
                case "2":
                    $retstring=$retstring."貳";
                    break;
                case "3":
                    $retstring=$retstring."參";
                    break;
                case "4":
                    $retstring=$retstring."肆";
                    break;
                case "5":
                    $retstring=$retstring."伍";
                    break;
                case "6":
                    $retstring=$retstring."陸";
                    break;
                case "7":
                    $retstring=$retstring."柒";
                    break;
                case "8":
                    $retstring=$retstring."捌";
                    break;
                case "9":
                    $retstring=$retstring."玖";
                    break;
            }
            if (substr($_POST['number01'],$i,1) != "0"){
                switch($ctrlprece){
                    case 2:
                        $retstring=$retstring."拾";
                    break;
                    case 3:
                        $retstring=$retstring."百";
                    break;
                    case 4:
                        $retstring=$retstring."千";
                    break;
                }
            }
            $ctrlprece--;
        }
        echo "<p>轉換值:".$_POST['number01']."</p>";
        echo "<p>轉換結果:".$retstring."元整</p>";
    }
    ?>
</body>
</html>