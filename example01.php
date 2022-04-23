<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>亂數陣列排序</title>
    <link rel="stylesheet" href="example.css">
=======
    <title>陣列排序程式</title>
     <!-- bootstrap css -->
    <link rel="stylesheet" href="bootstrap-4.6.1-dist/css/bootstrap.css">
>>>>>>> 393459bac96e5a9828d105b5be9cb5d97a5763fd
</head>

<body>
    <form action="example01.php" method="post" id="form1" name="form1">
<<<<<<< HEAD
        <p class="title">亂數陣列排序</p>
        <p>亂數產生5000陣列:</p>
        <p>設定排序方式
            <label><input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" checked="checked">由小到大排序</label>
            <label><input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">由大到小排序</label>
        </p>
=======
    <div class="card-header bg-transparent border-info"></div>
  <div class="card border-info md-3">
    <div class="card-body text-info">題目一:陣列排序程式
    <h5 class="card-title">亂數產生5000陣列:</h5>
    <div class="card-body text-info">設定排序方式
    <label><input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" checked="checked">由小到大排序</label>
        <label><input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">由大到小排序</label>
      
    </div>
  </div>
           
        
>>>>>>> 393459bac96e5a9828d105b5be9cb5d97a5763fd
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

<!-- bootstrap JS -->
<script type="text/javascript" src="bootstrap-4.6.1-dist/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap-4.6.1-dist/js/bootstrap.bundle.js"></script>
</html>