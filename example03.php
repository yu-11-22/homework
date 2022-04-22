<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>尋找質數PHP質數</title>
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
    <form action="example03.php" method="post" name="form1" id="form1">
        <p class="title">尋找質數程式</p>
        <p><label>請輸入要找尋多少個質數: <br> <input type="text" name="number01" value="<?php echo $default_val; ?>" id="number01" ></label></p>
        <input type="hidden" name="MM_form" id="MM_form" value="form1">
        <p><input type="submit" name="button" id="button" value="開始找尋"> </p>
    </form>
    <?php
    ini_set("error_reporting","E_ALL & ~E_NOTICE");
    if(isset($_POST['MM_form']) and $_POST['MM_form']=='form1'){
        $start=microtime();
        $number01=$_POST['number01'];
        $gen=3;
        $i=2;
        echo "<p>尋找到第1個質數:2</p>";
        while($i<=$number01){
            if(chk_prime($gen)){
                echo "<p>尋找到第".$i."個質數:".$gen."</p>";
                $i++;
                $gen+=2;
            }else{
                $gen+=2;
            }
        }
        $end=microtime();
        echo"<p>所需時間:".(($end-$start)*1000)."ms</p>";
    }
    function chk_prime($intnumber){
        if (!isNum($intnumber)){
            return false;
            }
            if (!isInteger($intnumber)){
            return false;
            }
        $chkRange=$intnumber;
        for($i=2; $i<sqrt($chkRange) ;$i=$i+1){
            if($intnumber % $i ==0){
                return false;
            }
        }
        return true;
    }
    function isInteger($intnumber){
        return $intnumber == ~~$intnumber ? true : false;
        }
        function isNum($intnumber){
        return $intnumber ==  $intnumber ? true : false;
        } 
    ?>
</body>
</html>