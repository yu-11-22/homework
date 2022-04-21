<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>陣列排序程式</title>
</head>

<body>
    <form action="example01.php" method="post" id="form1" name="form1">
        <p>陣列排序程式</p>
        <p>亂數產生5000陣列:</p>
        <p>設定排序方式
            <label><input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" checked="checked">由小到大排序</label>
            <label><input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">由大到小排序</label>
        </p>
        <p>
            <input type="hidden" name="MM_form" id="MM_form" value="form1">
        </p>
        <p><input type="submit" name="button" id="button" value="開始排序"></p>
    </form>
    <?php
    ini_set("error_reporting", "E_ALL & ~E_NOTICE");
    if (isset($_POST['MM_form']) and $_POST['MM_form'] == 'form1') {
        if ($_POST['RadioGroup1'] == '1') {
            $start = microtime();
            echo sortArr1();
            $end = microtime();
            $showData = ($end - $start) * 1000;
            echo "<br><p>所需時間:" . $showData . "ms</p>";
        } elseif ($_POST['RadioGroup1'] == '2') {
            $start = microtime();
            echo sortArr2();
            $end = microtime();
            $showData = ($end - $start) * 1000;
            echo "<br><p>所需時間:" . $showData . "ms</p>";
        }
    }
    function sortArr1()
    {
        $newData = array();
        for ($i = 0; $i < 5000; $i++) {
            $data[$i] = rand(1, 100000);
        }
        $size = count($data);
        echo "排列前的順序為:<br>";
        print_r($data);
        echo "<br>";
        for ($i = 0; $i < $size; $i++) {
            $minD = min($data);
            $key = array_search($minD, $data);
            array_push($newData, $minD);
            unset($data[$key]);
        }
        echo "<hr>由小到大排列後的順序為:<br>";
        print_r($newData);
    }
    function sortArr2()
    {
        $newData = array();
        for ($i = 0; $i < 5000; $i++) {
            $data[$i] = rand(1, 100000);
        }
        $size = count($data);
        echo "排列前的順序為:<br>";
        print_r($data);
        echo "<br>";
        for ($i = 0; $i < $size; $i++) {
            $maxD = max($data);
            $key = array_search($maxD, $data);
            array_push($newData, $maxD);
            unset($data[$key]);
        }
        echo "<hr>由大到小排列後的順序為:<br>";
        print_r($newData);
    }
    ?>
</body>

</html>