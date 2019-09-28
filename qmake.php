<!DOCTYPE html>
<html>
    <head><link rel="stylesheet" type="text/css" href="qmakecss.css"></head>
    <body>
        <form method="post" action="<?php $_PHP_SELF ?>">
            <a href="prof-index.php" style="float:right;">Back to index</a>
            Question Name <input type="text" name="qName" id="qName" maxlength="32" required><br>
            <textarea id="qBox" name="question" maxlength="512" placeholder="Write you question here. (MAX AMOUNT OF CHARACTERS IS 512)" required></textarea><br>
            <div id="radButtons">
                <b>Difficulty of question</b> <br>
                Easy<input type="radio" value="1" name="tier" required>
                Medium<input type="radio" value="2" name="tier" required>
                Hard<input type="radio" value="3" name="tier" required>
            </div>
            <textarea id="argu" name="argu" placeholder="Write your arguments here." required></textarea><br>
            <textarea id="arguName" name="arguName" placeholder="Put your argument's name." required></textarea><br>
            <textarea id="methName" name="methName" placeholder="Add the method name." required></textarea><br>
            <input type="submit" name="submit" id="submitbutton">
        </form>
    </body>
</html>
<?php

$questName = $_POST["qName"];
$quest = $_POST["question"];
$instruct = $_POST["instruction"];
$difficulty = $_POST["tier"];
$argu = $_POST["argu"];
$argnames = $_POST['arguName'];
$method = $_POST['methName'];
$out = $_POST["out"];

$post = "questName=" . $questName . "&questText=" . $quest . "&difficulty=" . $difficulty . "&args=" . $argu . "&argnames=" . $argnames . "&output=" .$out ;

$url = "https://web.njit.edu/~jtl25/CS490/questStore.php"; //Middle-end

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

echo $response;

curl_close($ch);



?>