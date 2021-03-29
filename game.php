<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game</title>
</head>
<body>
<form action="" method="get">
    <legend>Guess Number</legend>
    số chính xác: <br>
    <input type="text" name="num-in" placeholder="Số chính xác">
    <button type="submit">lấy số</button>
</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $in = $_GET['num-in'];

    function check($arr, $numCheck)
    {
        $first = 0;
        $last = count($arr) - 1;
        while ($first <= $last) {
            $mid = (int)(($first + $last) / 2);
            if ($arr[$mid] > $numCheck) {
                $last = $mid - 1;
                echo 'nhập số nhỏ hơn: ' . $arr[$mid] . '<br>';
            } elseif ($arr[$mid] < $numCheck) {
                $first = $mid + 1;
                echo 'nhập số lớn hơn: ' . $arr[$mid] . '<br>';
            } else {
                echo $arr[$mid] . '<br>';
                return true;
            }
        }
        return false;
    }

    $arrIn = array();
    for ($i = 1; $i < 501; $i++) {
        $arrIn[$i] = $i;
    }

    if (check($arrIn, $numCheck)) {
        echo 'correct, end game';
    } else {
        echo 'ko thấy sai rồi ';
    }
}
?>