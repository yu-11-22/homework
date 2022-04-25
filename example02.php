<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>阿拉伯數字轉成國字</title>
    <link rel="stylesheet" href="example.css">
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
        <p class="title">阿拉伯數字轉成國字程式</p>
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
    // if(isset($_POST['MM_form']) and $_POST['MM_form']=='form1'){
    //     $elen=strlen($_POST['number01']);
    //     $tempstr="";
    //     $retstring="";
    //     $ctrlprece=$elen;

    //     for($i=0;$i<=$elen-1;$i++){
    //         $tempstr=substr($_POST['number01'],$i,1);
    //         switch($tempstr){
    //             case "0":
    //                 $retstring=$retstring."零";
    //                 break;
    //             case "1":
    //                 $retstring=$retstring."壹";
    //                 break;
    //             case "2":
    //                 $retstring=$retstring."貳";
    //                 break;
    //             case "3":
    //                 $retstring=$retstring."參";
    //                 break;
    //             case "4":
    //                 $retstring=$retstring."肆";
    //                 break;
    //             case "5":
    //                 $retstring=$retstring."伍";
    //                 break;
    //             case "6":
    //                 $retstring=$retstring."陸";
    //                 break;
    //             case "7":
    //                 $retstring=$retstring."柒";
    //                 break;
    //             case "8":
    //                 $retstring=$retstring."捌";
    //                 break;
    //             case "9":
    //                 $retstring=$retstring."玖";
    //                 break;
    //         }
    //         if (substr($_POST['number01'],$i,1) != "0"){
    //             switch($ctrlprece){
    //                 case 2:
    //                     $retstring=$retstring."拾";
    //                 break;
    //                 case 3:
    //                     $retstring=$retstring."百";
    //                 break;
    //                 case 4:
    //                     $retstring=$retstring."千";
    //                 break;
    //             }
    //         }
    //         $ctrlprece--;
    //     }
    //     echo "<p>轉換值:".$_POST['number01']."</p>";
    //     echo "<p>轉換結果:".$retstring."元整</p>";
    // }
    ?>
    <?php
    function num2cht($num){
        $numc ="零,壹,貳,參,肆,伍,陸,柒,捌,玖";
        $unic = ",拾,佰,仟";
        $unic1 = ",萬,億,兆,京";
        $numc_arr = explode(",", $numc);
        $unic_arr = explode(",", $unic);
        $unic1_arr = explode(",", $unic1);
        $i = str_replace(",","", $num); //把每個數字中間加上,
        $c0 = 0;
        $str = array();
        $jN = substr($i, -4);
        $jM = substr($i, -8 ,4);
        $jO = substr($i, -12 ,4);
        $jP = substr($i, -16 ,4);
        do{
            $aa = 0;
            $c1 = 0;
            $s = "";
            $lan = (strlen($i) >= 4) ? 4 : strlen($i); //strlen為回傳字串長度，以四個數字為一個單位
            $j = substr($i, -$lan);
            while($j > 0){ //選取後四位的數字
                $k = $j % 10; //將四位數除以10取餘數
                if($k > 0) {
                    $aa = 1;
                    $s = $numc_arr[$k].$unic_arr[$c1].$s;
                }elseif($k == 0) {
                    if($aa == 1) $s = "0".$s;
                }
                $j = intval($j / 10); //intval回傳整數
                $c1 += 1;
            }
            if ($c0 == 1 && $jN < 1000){
                $str[$c0-1]= "0".$str[$c0-1];
            }elseif ($c0 == 2 && $jM < 1000){
                $str[$c0-1]= "0".$str[$c0-1];
            }elseif ($c0 == 3 && $jO < 1000){
                $str[$c0-1]= "0".$str[$c0-1];
            }elseif ($c0 == 4 && $jP < 1000){
                $str[$c0-1]= "0".$str[$c0-1];
            }
            $str[$c0] = ($s == '') ? '' : $s.$unic1_arr[$c0];
            $count_len = strlen($i) - 4;
            $i = ($count_len > 0) ? substr($i, 0, $count_len) : ''; //只取未處理的數值
            $c0 += 1; //進位用(萬、億、兆、京)
        }while($i != "");
        $string = "";
        foreach($str as $value) $string .= array_pop($str); //刪除最尾端的空值
        $string = preg_replace('/0+/', '零', $string);
        return $string;
    }
    ?>
    <?php
    // $a = 123456789;
    // $b = 123456;
    // $c = 1500;
    // echo $a." = ".num2cht($a)."\n";
    // echo $b." = ".num2cht($b)."\n";
    // echo $c." = ".num2cht($c)."\n";
    ?>
    <?php
    if(isset($_POST['MM_form']) and $_POST['MM_form']=='form1'){
        echo "<p>轉換值:".$_POST['number01']."</p>";
        if (mb_substr(num2cht($_POST['number01']),-1,1,"utf-8") == "零"){
            echo "<p>轉換結果:".mb_substr(num2cht($_POST['number01']),0,-1,"utf-8")."元整</p>";
        }else{
            echo "<p>轉換結果:".num2cht($_POST['number01'])."元整</p>";
        }
    }
    ?>
</body>
</html>