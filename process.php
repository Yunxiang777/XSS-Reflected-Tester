<?php
$userInput = isset($_GET['userInput']) ? $_GET['userInput'] : '';
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <title>XSS 測試結果</title>
</head>

<body>
    <h1>結果</h1>
    <p>你輸入的內容是：</p>
    <div id="result"><?php echo $userInput; ?></div>
    <a href="index.php">返回</a>
</body>

</html>