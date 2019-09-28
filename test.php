<!DOCTYPE html>
<?php

$url = "https://web.njit.edu/~jtl25/CS490/examBank.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'exam='.$_GET['testname']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

$res = json_decode($response, true);

curl_close($ch);

?>
<html>
    <head><link rel="stylesheet" type="text/css" href="testcss.css"></head>
    <body>
        <a href="testselection.php">Back to Test Selection</a>
        <h1 style="font-size: 20px;"><?php echo $res['name']; ?></h1>
        <form method="post" action="<?php $_PHP_SELF ?>">
            <?php for ($i = 0; $i < sizeof($res['questions']); $i++) : ?>
                <div id="inside-wrapper">
                    <textarea id="ans" name="ans[]"></textarea>
                    <div id="instruct-content">
                        <h5>Question <?php echo ($i+1)." "; ?><?php echo $res['questions'][$i]['name']; ?></h5>
                        <?php echo $res['questions'][$i]['question']; ?>
                    </div>
                </div>
            <?php endfor; ?>
        <input type="submit" name="submit" id="submit">
        </form>

    </body>
</html>
<?php

$answers = $_POST['ans'];

$postdata = "testname=" . $res['name'];

foreach ($answers as $answer => $ansRes){
     $postdata = $postdata."&"."answers[" .($answer). "]=".$ansRes;
}

/*
$url = "http://";
$send = curl_init();
curl_setopt($send, CURLOPT_URL, $url);
curl_setopt($send, CURLOPT_POST, true);
curl_setopt($send, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($send, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($send);

$res = json_decode($response, true);

curl_close($ch); */

?>